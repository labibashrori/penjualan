<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php

	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		
		$sql_insert = "INSERT INTO Supplier (KodeSupplier,NamaSupplier,TanggalLahir,AlamatKantor,TeleponKantor,JenisKelamin,Email) VALUES (
				'".$_POST['txtKodeSupplier']."',
				'".$_POST['txtNamaSupplier']."',
                '".$_POST['txtTanggalLahir']."',
				'".$_POST['txtAlamatKantor']."',
                '".$_POST['txtTeleponKantor']."',
				'".$_POST['rbJenisKelamin']."',
				'".$_POST['txtEmail']."')";
				
				
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if ($query_insert) {
			
			echo "<div class='alert alert-success'>
				<a href='?page=supplier' class='close' data-dismiss='alert'>&times;</a>
				Simpan berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='1; url=?page=supplier'>";
		}else{
			echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>
				Simpan gagal !
				</div>";
		}
	}
	
	
?>

<!DOCTYPE html>
<html lang="id">
	<head>
    	<title>Tambah Data Supplier</title>
     </head>
     
     <body>
     	
     	<div class="col-sm-12">
        	<div class="panel panel-success">
            	<div class="panel-heading">
                	<h3 class="panel-title"><span class=""></span> Tambah Data Supplier</h3>
                </div>
                <div class="panel-body">
                	<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
                    
                    	<div class="form-group">
                        <label for="KodeSupplier" class="control-label col-sm-2">Kode Supplier</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtKodeSupplier" placeholder="Kode Supplier"/>
                        </div>
                 </div>
                 
                 <div class="form-group">
                        <label for="NamaSupplier" class="control-label col-sm-2">Nama Supplier</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtNamaSupplier" placeholder="Nama Supplier"/>
                        </div>
                 </div>
                 
                <div class="form-group">
                        <label for="TanggalLahir" class="control-label col-sm-2">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtTanggalLahir" 
                             id="datepicker" placeholder="Tanggal Lahir"/>
                        </div>
                 </div>

                 <div class="form-group">
                        	<label for="AlamatKantor" class="control-label col-sm-2">Alamat Kantor</label>
                            <div class="col-sm-4">
                            	<textarea class="form-control" name="txtAlamatKantor" rows="3" placeholder="Alamat Kantor"></textarea>
                             </div>
                        </div>
                       
                <div class="form-group">
                        <label for="TeleponKantor" class="control-label col-sm-2">Telepon Kantor</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtTeleponKantor" placeholder="Telepon Kantor"/>
                         </div>
                        </div> 

                        <div class="form-group">
                 	<label for="JenisKelamin" class="control-label col-sm-2">Jenis Kelamin</label>
                    <div class="col-sm-4">
                    	<div class="radio">
                        	<label>
                            <input type="radio" name="rbJenisKelamin" value="Pria" checked=""/>
                            	Pria
                            </label>
                            <label>
                             <input type="radio" name="rbJenisKelamin" value="Wanita" />
                             	Wanita
                             </label>
                           </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                         	<label for="Email" class="control-label col-sm-2">Email</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control" name="txtEmail" placeholder="Email"/>
                             </div>
                         </div>
                        
                         
                         <div class="form-group">
                         	<div class="col-sm-offset-2 col-sm-3">
                            	<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
                                <button type="reset" class="btn btn-info" name="btnData1" onClick="window.location.href='?page=supplier'">Batal</button>
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