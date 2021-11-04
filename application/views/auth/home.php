  <style type="text/css">
    body {
      background: #00589d;
    }

    .contentx {
      width: 80em;
      height: auto;
      margin: 0 auto;
      padding: 30px;
    }

    .nav-pills {
      width: 80em;
    }

    .nav-item {
      width: 50%;
    }

    .nav-pills .nav-link {
      font-weight: bold;
      padding-top: 13px;
      text-align: center;
      background: #6fb61c;
      color: #fff;
      border-radius: 10px;
      height: 100px;
    }

    .nav-pills .nav-link.active {
      background: #fff;
      color: #000;
    }

    .tab-content {
      position: absolute;
      width: 80em;
      height: auto;
      margin-top: -50px;
      background: #fff;
      color: #000;
      border-radius: 10px;
      z-index: 1000;
      box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.4);
      padding: 30px;
      margin-bottom: 50px;
    }

    .tab-content button {
      border-radius: 15px;
      /*width: 100px;*/
      margin: 0 auto;
      float: right;
    }

    .grn {
      background-color: #6fb61c;
      border-color: #6fb61c;
    }

    .grn:hover {
      background-color: #6fb61c;
      border-color: #6fb61c;
    }
  </style>


  <!-- Outer Row -->

  <div class="row justify-content-center mt-5 pt-lg-5">

    <div class="col-xl-3 col-lg-12 col-md-9">

      <span type="text" class="btn btn-success btn-user btn-block grn">
        <b>BBWS PEMALI JUANA</b></span>

    </div>

    <div class="col-xl-12 col-lg-12 col-md-9">

      <div class="contentx">
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#login">Perencanaan SDA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#regis">Pelaksanaan Kontruksi</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="login" class="container tab-pane active">


            <div class="row" style="float: right;">
              <div class=" col-md-12">
                <!-- <label for="InputName">Tahun</label> -->
                <select class="form-control" id="tahun_sda" name="tahun_sda" placeholder="Tahun">
                  <option value="">Semua Tahun</option>
                  <?php
                  for ($i = date('Y'); $i >= 2015; $i--) {
                    echo "<option value=" . $i . ">" . $i . "</option>";
                  }
                  ?>
                </select>
                </form>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" style="float: right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-download"></i> DOWNLOAD
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a target="_blank" href="<?php echo base_url('Baru/pdf') ?>"> <i class="fa fa-file"></i>PDF</a></li>
                <li><a href="<?php echo base_url('Baru/ExportExcel') ?>"><i class="fa fa-file"></i>EXCEL</a></li>
                <li role="separator" class="divider"></li>
              </ul>

            </div>


            <!-- 2 -->
            <table class="table table-striped" id="dataTable_sda">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>Paket Pekerjaan</th>
                  <th>Penyedia Jasa</th>
                  <th>Tahun Anggaran</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <!-- 2 -->
            </form>
          </div>
          <div id="regis" class="container tab-pane fade">

            <div class="row" style="float: right;">
              <div class=" col-md-12">
                <!-- <label for="InputName">Tahun</label> -->
                <select class="form-control" id="tahun_kontruksi" name="tahun_kontruksi" placeholder="Tahun">
                  <option value="">Semua Tahun</option>
                  <?php
                  for ($i = date('Y'); $i >= 2015; $i--) {
                    echo "<option value=" . $i . ">" . $i . "</option>";
                  }
                  ?>
                </select>

              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" style="float: right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-download"></i> DOWNLOAD
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a target="_blank" href="<?php echo base_url('Baru/pdf2') ?>"><i class="fa fa-file"></i>PDF</a></li>
                <li><a href="<?php echo base_url('Baru/ExportExcel2') ?>"><i class="fa fa-file"></i>EXCEL</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </div>

            <form>
              <!-- 2 -->

              <table class="table table-striped" id="dataTable_kontruksi">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Paket Pekerjaan</th>
                    <th>Lokasi</th>
                    <th>Output</th>
                    <th>Outcome</th>
                    <th>Penyedia Jasa</th>
                    <th>Tahun Anggaran</th>
                    <th>Biaya</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <!-- 2 -->
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>