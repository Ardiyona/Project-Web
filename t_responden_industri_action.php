<?php 
include_once('model/t_responden_industri_model.php');
include_once('model/koneksi.php');

   
   $act = $_GET['act'];

   if($act == 'simpan'){
      echo '<pre>';
      $data = [
         'responden_tanggal' => $_POST['responden_tanggal'],
         'responden_nama' => $_POST['responden_nama'],
         'responden_jabatan' => $_POST['responden_jabatan'],
         'responden_perusahaan' => $_POST['responden_perusahaan'],
         'responden_email' => $_POST['responden_email'],
         'responden_hp' => $_POST['responden_hp'],
         'responden_kota' => $_POST['responden_kota']
      ];

      $insert = new t_responden_industri($db);
      $insert->insertData($data);

      header('Location: form_soal.php?pages=industri');
   }

   if($act == 'hapus'){
      $id = $_GET['id'];

      $hapus = new t_responden_industri($db);
      $hapus->deleteData($id);

      header('location: t_responden_industri.php');
   }
   ?>
