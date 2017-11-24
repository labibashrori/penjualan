<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php

	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		
		$sql_insert = "INSERT INTO Barang (KodeBarang,NamaBarang,JenisBarang,Harga,Jumlah) VALUES (
				'".$_POST['txtKodeBarang']."',
				'".$_POST['txtNamaBarang']."',
				'".$_POST['txtJenisBarang']."',
				'".$_POST['txtHarga']."',
				'".$_POST['txtHJumlah']."')";
				
				
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if ($query_insert) {
			
			echo "<div class='alert alert-success'>
				<a href='?page=barang' class='close' data-dismiss='alert'>&times;</a>
				Simpan berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='1; url=?page=barang'>";
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
    	<title>Tambah Data Barang</title>
     </head>
     
     <body>
     	
     	<div class="col-sm-12">
        	<div class="panel panel-success">
            	<div class="panel-heading">
                	<h3 class="panel-title"><span class=""></span> Tambah Data Barang</h3>
                </div>
                <div class="panel-body">
                	<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
                    
                    	<div class="form-group">
                        <label for="KodeBarang" class="control-label col-sm-2">Kode Barang</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtKodeBarang" placeholder="Kode Barang"/>
                        </div>
                 </div>
                 
                 <div class="form-group">
                        <label for="judul" class="control-label col-sm-2">Nama Barang</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtNamaBarang" placeholder="Nama Barang"/>
                        </div>
                 </div>
                 
                 <div class="form-group">
						<label for="genre" class="control-label col-sm-2">Jenis Barang</label>
                        <div class="col-sm-4">
						      <input type="text" class="form-control" name="txtJenisBarang" placeholder="Jenis Barang"/>
                        </div>
                 </div>
                       
                       
                       <div class="form-group">
                       	<label for="tahun_rilis" class="control-label col-sm-2">Harga</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtHarga" placeholder="Harga"/>
                         </div>
                        </div>
                        
                        <div class="form-group">
                       	<label for="harga" class="control-label col-sm-2">Jumlah</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtHJumlah" placeholder="Jumlah"/>
                         </div>
                        </div>
                        
                         
                         <div class="form-group">
                         	<div class="col-sm-offset-2 col-sm-3">
                            	<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
                                <button type="reset" class="btn btn-info" name="btnData1" onClick="window.location.href='?page=barang'">Batal</button>
                               </div>
                              </div>
                             </form>
                            </div>
                            
                           </div>
                          </div>
                          
                         </body>
                  </html>