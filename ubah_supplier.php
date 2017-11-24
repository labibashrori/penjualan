<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
<?php
	error_reporting(0);
	require_once "koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM Supplier WHERE KodeSupplier='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
	
	if (isset($_POST['btnUbah'])) {
		
		$sql_update = "UPDATE Supplier SET
					NamaSupplier='".$_POST['txtNamaSupplier']."',
					TanggalLahir='".$_POST['txtTanggalLahir']."',
          AlamatKantor='".$_POST['txtAlamatKantor']."',
          TeleponKantor='".$_POST['txtTeleponKantor']."',
					JenisKelamin='".$_POST['rbJenisKelamin']."',
					Email='".$_POST['txtEmail']."'
					WHERE KodeSupplier= '".$data['KodeSupplier']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=supplier' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='1; url=?page=supplier'>";
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
<title>Ubah Data Supplier</title>
</head>

<body>
	<div class="col-sm-12">
    	<div class="panel panel-success">
        	<div class="panel-heading">
            	<h3 class="panel-title"><span class=""></span> Ubah Data Supplier</h3>
            </div>
            <div class="panel-body">
            	<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
                
                	
                    
                   <div class="form-group">
                        <label for="KodeSupplier" class="control-label col-sm-2">Kode Supplier</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtKodeSupplier" placeholder="Kode Supplier"
                            value="<?php echo $data['KodeSupplier']; ?>"/>
                        </div>
                 </div>
                 

                 <div class="form-group">
                        <label for="NamaSupplier" class="control-label col-sm-2">Nama Supplier</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtNamaSupplier" placeholder="Nama Supplier"
                            value="<?php echo $data['NamaSupplier']; ?>"/>
                        </div>
                 </div>
                 

                 <div class="form-group">
                        <label for="TanggalLahir" class="control-label col-sm-2">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtTanggalLahir" id="datepicker" placeholder="Tanggal Lahir"
                            value="<?php echo $data['TanggalLahir']; ?>"/> 
                        </div>
                 </div>

                  <div class="form-group">
                          <label for="AlamatKantor" class="control-label col-sm-2">Alamat Kantor</label>
                            <div class="col-sm-4">
                              <textarea class="form-control" name="txtAlamatKantor" rows="3" placeholder="Alamat Kantor"><?php echo $data['AlamatKantor']; ?></textarea>
                       </div>
                    </div>
                 

                <div class="form-group">
                        <label for="TeleponKantor" class="control-label col-sm-2">Telepon kantor</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtTeleponKantor" placeholder="Telepon Kantor"
                             value="<?php echo $data['TeleponKantor']; ?>"/>
                         </div>
                        </div>
                        

                  <div class="form-group">
                    <label for="JenisKelamin" class="control-label col-sm-2">Jenis Kelamin</label>
                    <div class="col-sm-4">
                    	<div class="radio">
                        <label>
                        	<input type="radio" name="rbJenisKelamin" value="Pria"
                            <?php if($data['JenisKelamin']=="Pria"){ echo "checked"; }; ?> />
                            	Pria
                         </label>
                         <label>
                        	<input type="radio" name="rbJenisKelamin" value="Wanita"
                            <?php if($data['JenisKelamin']=="Wanita"){ echo "checked"; }; ?> />
                            	Wanita
                          </label>
                     </div>
                    </div>
                   </div>
                          

                        <div class="form-group">
                         	<label for="Email" class="control-label col-sm-2">Email</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control" name="txtEmail" placeholder="Email"
                                value="<?php echo $data['Email']; ?>"/>
                             </div>
                         </div>
                       
                      
                    
                 
                 <div class="form-group">
                 	<div class="col-sm-offset-2 col-sm-3">
                    	<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
                        <button type="reset" class="btn btn-info" name="btnBatal"
                        onClick="window.location.href='?page=supplier'">Batal</button>
                        </div>
                       </div>
                      </form>
                     </div>
                    </div>
                    </div>


                    <script src="js/jquery-1.12.2.min.js"></script>
                          <script src="js/bootstrap-datepicker.js"></script>
                          
                          <script>
                          $('#datepicker').datepicker({
                              format: 'yyyy-mm-dd',
                              autoclose: true,
                              todayHighlight: true
                          })
                          
                          </script>
                          
                          <script>
                          $('#datepicker1').datepicker({
                              format: 'yyyy-mm-dd',
                              autoclose: true,
                              todayHighlight: true
                          })
                          
                          </script>

</body>
</html>