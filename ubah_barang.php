<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
<?php
	error_reporting(0);
	require_once "koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM Barang WHERE KodeBarang='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
	
	if (isset($_POST['btnUbah'])) {
		
		$sql_update = "UPDATE Barang SET
					NamaBarang='".$_POST['txtNamaBarang']."',
					JenisBarang='".$_POST['txtJenisBarang']."',
					Harga='".$_POST['txtHarga']."',
					Jumlah='".$_POST['txtJumlah']."'
					WHERE KodeBarang= '".$data['KodeBarang']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=barang' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='1; url=?page=barang'>";
		}else{
			echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>
				Ubah gagal !
				</div>";
				
		}
	}
?>

<!doctype html>
<html lang="id">
<head>
<title>Ubah Data Barang</title>
</head>

<body>
	<div class="col-sm-12">
    	<div class="panel panel-success">
        	<div class="panel-heading">
            	<h3 class="panel-title"><span class=""></span> Ubah Data Barang</h3>
            </div>
            <div class="panel-body">
            	<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
                
                	
                    
                   <div class="form-group">
                        <label for="KodeBarang" class="control-label col-sm-2">Kode Barang</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtKodeBarang" placeholder="Kode Barang"
                            value="<?php echo $data['KodeBarang']; ?>"/>
                        </div>
                 </div>
                 
                 <div class="form-group">
                        <label for="NamaBarang" class="control-label col-sm-2">Nama Barang</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtNamaBarang" placeholder="Nama Barang"
                            value="<?php echo $data['NamaBarang']; ?>"/>
                        </div>
                 </div>
                 
                 <div class="form-group">
						<label for="JenisBarang" class="control-label col-sm-2">Jenis Barang</label>
                            <div class="col-sm-4">
							<input type="text" class="form-control" name="txtJenisBarang" placeholder="Jenis Barang"
                            value="<?php echo $data['JenisBarang']; ?>"/>
                        </div>
                 </div>
                       
                       
                       <div class="form-group">
                       	<label for="Harga" class="control-label col-sm-2">Harga</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtHarga" placeholder="Harga"
                            value="<?php echo $data['Harga']; ?>"/>
                         </div>
                        </div>
                        
                        <div class="form-group">
                       	<label for="Jumlah" class="control-label col-sm-2">Jumlah</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtJumlah" placeholder="Jumlah"
                            value="<?php echo $data['Jumlah']; ?>"/>
                         </div>
                        </div>
                    
                 
                 <div class="form-group">
                 	<div class="col-sm-offset-2 col-sm-3">
                    	<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
                        <button type="reset" class="btn btn-info" name="btnBatal"
                        onClick="window.location.href='?page=barang'">Batal</button>
                        </div>
                       </div>
                      </form>
                     </div>
                    </div>
                    </div>
</body>
</html>