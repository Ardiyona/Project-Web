<?php
session_start();

if (empty($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
include_once('model/koneksi.php');
include_once('model/t_responden_mahasiswa_model.php');
include_once('model/t_responden_dosen_model.php');
include_once('model/t_responden_tendik_model.php');
include_once('model/t_responden_ortu_model.php');
include_once('model/t_responden_alumni_model.php');
include_once('model/t_responden_industri_model.php');
$menu = 'dashboard'
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once("layouts/admin/header.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once("layouts/admin/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Title for the section -->
          <div class="row">
            <div class="col-12">
              <h5 class="my-0">Responden</h5>
              <br>
            </div>
          </div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <?php
            $mahasiswa = new t_responden_mahasiswa();
            $row_mahasiswa = $mahasiswa->getRespondenTotal();

            $dosen = new t_responden_dosen();
            $row_dosen = $dosen->getRespondenTotal();

            $tendik = new t_responden_tendik();
            $row_tendik = $tendik->getRespondenTotal();

            $ortu = new t_responden_ortu();
            $row_ortu = $ortu->getRespondenTotal();

            $alumni = new t_responden_alumni();
            $row_alumni = $alumni->getRespondenTotal();

            $industri = new t_responden_industri();
            $row_industri = $industri->getRespondenTotal();
            ?>
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $row_mahasiswa ?></h2>
                    <p>Data Mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="t_responden_mahasiswa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><b><?= $row_dosen ?></b></h3>
                  <p>Data Dosen</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="t_responden_dosen.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $row_tendik ?></h3>
                  <p>Data Tendik</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="t_responden_tendik.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?= $row_ortu ?></h3>
                  <p>Data Orang Tua</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="t_responden_ortu.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $row_alumni ?></h3>
                  <p>Data Alumni</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="t_responden_alumni.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-4">
              <!-- small box -->
              <div class="small-box bg-indigo">
                <div class="inner">
                  <h3><?= $row_industri ?></h3>
                  <p>Data Industri</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="t_responden_industri.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
      </section>

      <!-- Section for the pie chart -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pie Chart Responden</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once("layouts/admin/footer.php") ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Chart.js Script -->
  <script>
    $(function() {
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Mahasiswa',
          'Dosen',
          'Tendik',
          'Orang Tua',
          'Alumni',
          'Industri'
        ],
        datasets: [{
          data: [
            <?= $row_mahasiswa ?>,
            <?= $row_dosen ?>,
            <?= $row_tendik ?>,
            <?= $row_ortu ?>,
            <?= $row_alumni ?>,
            <?= $row_industri ?>
          ],
          backgroundColor: ['#dc3545', '#ffc107', '#28a745', '#007bff', '#17a2b8', '#6610f2'],
        }]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })
    })
  </script>
</body>

</html>