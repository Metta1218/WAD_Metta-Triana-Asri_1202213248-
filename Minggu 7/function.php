<?php
session_start();

// database conection
$conn = mysqli_connect("localhost", "root", "", "tabel_tokokue");

// insert stock
if (isset($_POST['insertkue'])) {
	$nama = $_POST['nama'];
	$rasa = $_POST['rasa'];
	$harga = $_POST['harga'];
	$stock = $_POST['stock'];
	$keterangan = $_POST['keterangan'];

	$tambahkb = mysqli_query($conn, "insert into kue (nama, rasa, harga, stock, keterangan) values ('$nama', '$rasa', '$harga', '$stock', '$keterangan')");
	if ($tambahkb) {
		header('location:index.php');
	} else {
		echo "gagal";
		header('location:index.php');
	}
}

//update stock
if (isset($_POST['updatehp'])) {
	$nama = $_POST['name'];
	$rasa = $_POST['rasa'];
	$harga = $_POST['harga'];
	$stock = $_POST['stock'];
	$keterangan = $_POST['keterangan'];
	$id_kue = $_POST['idkue'];

	$updatekue = mysqli_query($conn, "update ='$nama', rasa='$rasa', harga='$harga' , stock='$stock', keterangan='$keterangan' where kue.id_kue='$id_kue' ");
	if ($updatekue) {
		header('location:index.php');
	} else {
		echo "gagal";
		header('location:index.php');
	}
}

//delete stock
if (isset($_POST['deletekue'])) {
	$id_kue = $_POST['idkue'];

	$deletekue = mysqli_query($conn, "delete from kue where id_kue='$id_kue'");
	if ($deletekue) {
		header('location:Latihan_WAD.php');
	} else {
		echo "gagal";
		header('location:Latihan_WAD.php');
	}
}
