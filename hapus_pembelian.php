<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php
	include "koneksi.php";
	
	$sql_hapus = "DELETE FROM Pembelian WHERE NomorNota='".$_GET['id']."'";
	$query_hapus = mysql_query($sql_hapus) or die (mysql_error());
	
	if ($query_hapus) {
		echo "<div class'alert alert-success'>
		<a href='?pembelian' class='close' data-dismiss='alert'> &times;
		</a>Hapus berhasil
		</div>";
		
		echo "<meta http-equiv='refresh' content='1; url=?page=pembelian'>";
	}else{
		echo"<script>alert('Hapus gagal !')</script>";
	}
?>