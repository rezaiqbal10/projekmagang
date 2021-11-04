<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontruksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {   cek_login();
        $data['title'] = "Pelaksanaan Kontruksi";
        $data['kontruksi'] = $this->admin->get('kontruksi');
        $this->template->load('templates/dashboard', 'kontruksi/data', $data);
    }   

    private function _validasi()
    {
        


        $this->form_validation->set_rules('paket_pekerjaan', 'paket pekerjaan', 'required|trim');
        $this->form_validation->set_rules('penyedia_jasa', 'penyedia jasa', 'required|trim');
        $this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Pelaksanaan Kontruksi";
            $this->template->load('templates/dashboard', 'kontruksi/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('kontruksi', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('kontruksi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kontruksi/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Pelaksanaan Kontruksi";
            $data['satuan'] = $this->admin->get('kontruksi', ['id' => $id]);
            $this->template->load('templates/dashboard', 'kontruksi/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('kontruksi', 'id', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('kontruksi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kontruksi/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('kontruksi', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kontruksi');
    }


public function list_kontruksi(){ 
    // error_reporting(0);
    $tahun=$this->input->post('tahun');
    if ($tahun=='') {
        $where=" 1=1 ";
    }else{
        $where=" tahun_anggaran='$tahun' ";
    }
    // storing  request (ie, get/post) global array to a variable  
        $requestData= $_REQUEST;

        $columns = array( 
        // datatable column index  => database column name
           0 => 'id',
            1 => 'paket_pekerjaan',
            2 => 'lokasi', 
            3 => 'output' ,
            4 => 'outcome',
            5 => 'penyedia_jasa',
            6 => 'tahun_anggaran',
            7 => 'biaya'          
        );

    $sql="SELECT * FROM kontruksi where $where and  1=1 ";
                    // die($sql);
        $totalData=count($this->db->query($sql)->result_array());// or die("ajax-grid-data.php: get Tiket");
        // $totalData = mysqli_num_rows($query);
        $totalFiltered = $totalData; 


if( !empty($requestData['search']['value']) ) {

    // if there is a search parameter
     $sql="SELECT * FROM kontruksi ";

    $sql.=" WHERE $where AND ( ";    // $requestData['search']['value'] contains search parameter
    $sql.=" UPPER(paket_pekerjaan) LIKE '%".trim(strtoupper($requestData['search']['value']))."%' ";
    $sql.=" OR UPPER(penyedia_jasa) LIKE '%".trim(strtoupper($requestData['search']['value']))."%' ";
    $sql.=" )";
   
        $totalData=count($this->db->query($sql)->result_array());// or die("ajax-grid-data.php: get Tiket");
        // $totalData = mysqli_num_rows($query);
        $totalFiltered = $totalData; 
   $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." , ".$requestData['length']."   ";
} else {    

      $sql="SELECT * FROM kontruksi  where $where and 1=1 ";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." , ".$requestData['length']."   ";

    
}

    $row=$this->db->query($sql)->result_array();

        $data = array();
        $no=$requestData['start']+1;
        foreach ($row as $row) {
            # code...
         // preparing an array
            $nestedData=array(); 
           
            $nestedData[] = $no; $no++;
            $nestedData[] = $row["paket_pekerjaan"];
            $nestedData[] = $row["lokasi"];
            $nestedData[] = $row["output"];
            $nestedData[] = $row["outcome"];
            $nestedData[] = $row["penyedia_jasa"];
            $nestedData[] = $row["tahun_anggaran"];
            $nestedData[] = $row["biaya"];
            // $nestedData[] = $delete;                          
           
            
            $data[] = $nestedData;
            
        }
        $json_data = array(
                    "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                    "recordsTotal"    => intval( $totalData ),  // total number of records
                    "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
                    "data"            => $data   // total data array
                    );
        // print_r($json_data);
        echo json_encode($json_data);
	}

			





}
