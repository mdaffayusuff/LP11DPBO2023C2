<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");
include_once("view/FormPasienView.php");
include_once("presenter/FormPasien.php");
include_once("presenter/ProsesPasien.php");


$tp = new TampilPasien();
$pp = new ProsesPasien();
$fm = new FormPasienView();
$fmprc = new FormPasien();


if (isset($_GET['adding'])) {
    //lengkapi
    $fm->add();
} else if (isset($_GET['editing'])) {
    //lengkapi
    $id = $_GET['editing'];

    $fm->edit($id);
} else if (isset($_POST['submit'])) {
    //lengkapi
    $fmprc->add($_POST);
    header('location:index.php');
} else if (isset($_POST['update'])) {
    //lengkapi
    $id = $_POST['id'];
    $fmprc->edit($id, $_POST);
    header('location:index.php');
} else if (!empty($_GET['id_hapus'])) {
    //lengkapi
    $id = $_GET['id_hapus'];
    $pp->delete($id);
    header('location:index.php');
} else {
    $tp->tampil();
}
