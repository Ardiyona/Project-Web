<?php
$menu = 'survey';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Mahasiswa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('layouts/responden/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once('layouts/responden/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Biodata</a></li>
                                <li class="breadcrumb-item active">Form Survey</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Survey</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <form action="t_jawaban_mahasiswa_action.php?act=simpan" method="post" id="form-tambah">
                            <?php
                            include_once('model/koneksi.php');
                            $query = "SELECT * FROM m_survey_soal";
                            $stmt = $db->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $soal_id = $row['soal_id'];
                                echo '<div class="form-group">';
                                echo '<label>' . $row['soal_nama'] . '</label><br>';
                                echo '<div>';
                                echo '<input type="radio" id="tidak_puas_' . $soal_id . '" name="jawaban[' . $soal_id . ']" value="Tidak Puas" required>';
                                echo '<label for="tidak_puas_' . $soal_id . '">1 (Tidak Puas)</label>';
                                echo '</div>';
                                echo '<div>';
                                echo '<input type="radio" id="kurang_puas_' . $soal_id . '" name="jawaban[' . $soal_id . ']" value="Kurang Puas" required>';
                                echo '<label for="kurang_puas_' . $soal_id . '">2 (Kurang Puas)</label>';
                                echo '</div>';
                                echo '<div>';
                                echo '<input type="radio" id="puas_' . $soal_id . '" name="jawaban[' . $soal_id . ']" value="Puas" required>';
                                echo '<label for="puas_' . $soal_id . '">3 (Puas)</label>';
                                echo '</div>';
                                echo '<div>';
                                echo '<input type="radio" id="sangat_puas_' . $soal_id . '" name="jawaban[' . $soal_id . ']" value="Sangat Puas" required>';
                                echo '<label for="sangat_puas_' . $soal_id . '">4 (Sangat Puas)</label>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $stmt->close();
                            ?>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="t_responden_mahasiswa_action.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once('layouts/responden/footer.php'); ?>

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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</body>

</html>
