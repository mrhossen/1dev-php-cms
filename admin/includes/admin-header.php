<?php ob_start(); ?>
<?php session_start(); ?>

<?php include "admin-functions.php"; ?>
<?php include "../includes/config.php"; ?>


<?php

if(!isset($_SESSION['userrole'])) {

    header("Location: ../index.php");

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CDOS PHP CMS Backend</title>
  <!-- Bootstrap core CSS-->
  <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="asset/vendor/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="asset/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="asset/css/sb-admin.css" rel="stylesheet">
  <link href="asset/css/cms-style.css" rel="stylesheet">





</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
