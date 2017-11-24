<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php

	require_once "koneksi.php";
	if (isset($_POST['btnSimpan'])) {
		
		$sql_insert = "INSERT INTO Pembelian (NomorNota,KodeBarang,KodeSupplier,TanggalBeli,JumlahBeli,HargaBeli,Total) VALUES (
				'".$_POST['txtNomorNota']."',
				'".$_POST['txtKodeBarang']."',
				'".$_POST['txtKodeSupplier']."',
				'".$_POST['txtTanggalBeli']."',
				'".$_POST['txtJumlahBeli']."',
				'".$_POST['txtHargaBeli']."',
				'".$_POST['txtTotal']."')";
				
				
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if ($query_insert) {
			
			echo "<div class='alert alert-success'>
				<a href='?page=pembelian' class='close' data-dismiss='alert'>&times;</a>
				Simpan berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='1; url=?page=pembelian'>";
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
    	<title>Tambah Data Pembelian</title>
     </head>
     
     <body>
     	
     	<div class="col-sm-12">
        	<div class="panel panel-success">
            	<div class="panel-heading">
                	<h3 class="panel-title"><span class=""></span> Tambah Data Pembelian</h3>
                </div>
                <div class="panel-body">
                	<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
                    
                    	<div class="form-group">
                        <label for="NomorNota" class="control-label col-sm-2">Nomor Nota</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtNomorNota" placeholder="Nomor Nota"/>
                        </div>
                 </div>
                 
                                  
                
                       
                       <div class="form-group">
									<label for="KodeBarang" class="control-label col-sm-2">Kode Barang</label>
                                    <div class="col-sm-4">
									<select class="form-control" name="txtKodeBarang" onChange="changes(this.value)" >
                                    <?php
									$result = mysql_query("select * from barang");
									$jsbarang = "var barang = new Array();\n";
									
									while ($row = mysql_fetch_array($result)) {
										echo '<option value="' . $row['KodeBarang'] . '">' . $row['KodeBarang'] . '</option>';
										$jsbarang .= "barang['" . $row['KodeBarang'] . "'] = {nama:'" . addslashes($row['Nama']) ."'};\n";
									}
									echo '</select>';
									?>
										
									</select>
                                    </div>
								</div>
                        
                        <div class="form-group">
									<label for="KodeSupplier" class="control-label col-sm-2">Kode Supplier</label>
                                    <div class="col-sm-4">
									<select class="form-control" name="txtKodeSupplier" onChange="changes(this.value)" >
                                    <?php
									$result = mysql_query("select * from Supplier");
									$jskasir = "var Supplier = new Array();\n";
									
									while ($row = mysql_fetch_array($result)) {
										echo '<option value="' . $row['KodeSupplier'] . '">' . $row['KodeSupplier'] . '</option>';
										$jsbarang .= "Supplier['" . $row['KodeSupplier'] . "'] = {nama:'" . addslashes($row['KodeSupplier']) ."'};\n";
									}
									echo '</select>';
									?>
										
									</select>
                                    </div>
								</div>
                        
<div class="form-group">
                        <label for="TanggalBeli" class="control-label col-sm-2">Tanggal Beli</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control" name="txtTanggalBeli" 
                             id="datepicker" placeholder="Tanggal Beli"/>
                        </div>
                 </div>


                        <div class="form-group">
                        <label for="JumlahBeli" class="control-label col-sm-2">Jumlah Beli</label>
                        <div class="col-sm-4">                         
                           <input name="txtJumlahBeli" type="text"  class="form-control" placeholder="Jumlah Beli" id="txtJumlahBeli"  onkeyup="perkalian();" />
                           
        
                            
                        </div>
                 </div>
                        
<div class="form-group">
                        <label for="HargaBeli" class="control-label col-sm-2">Harga Beli</label>
                        <div class="col-sm-4">
                        	<input name="txtHargaBeli" type="text"  class="form-control" placeholder="Harga Beli" id="txtHargaBeli"  onkeyup="perkalian();" />
                        </div>
                 </div>

                        <div class="form-group">
                        <label for="Total" class="control-label col-sm-2">Total</label>
                        <div class="col-sm-4">
                        	<input name="txtTotal" type="text" class="form-control" placeholder="Total" id="txtTotal">
                        </div>
                 </div>
                        
                         
                         <div class="form-group">
                         	<div class="col-sm-offset-2 col-sm-3">
                            	<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
                                <button type="reset" class="btn btn-info" name="btnData1" onClick="window.location.href='?page=pembelian'">Batal</button>
                               </div>
                              </div>
                             </form>
                            </div>
                            
                           </div>
                          </div>
                          
                          <script type="text/javascript">
						  <?php echo $jsbarang; ?>
						  function changes(id) {
							  document.getElementById('id').value = kasir[id].id_barang;
							  document.getElementById('id').value = kasir[id].nama;
						  };
						  </script>
                          
                          <script type="text/javascript">
						  <?php echo $jssupplier; ?>
						  function changes(id) {
							  document.getElementById('id').value = pelanggan[id].id_pelanggan;
							  document.getElementById('id').value = pelanggan[id].nama;
						  };
						  </script>
                          
                          <script type="text/javascript">
						  <?php echo $jsdvd; ?>
						  function changes(id) {
							  document.getElementById('harga').value = dvd[id].harga;
						  };
						  </script>
                          
                          
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
                          
<script>
function perkalian() {
      var txtFirstNumberValue = document.getElementById('txtJumlahBeli').value;
      var txtSecondNumberValue = document.getElementById('txtHargaBeli').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txtTotal').value = result;
      }
}
</script>
						  
						  
                         </body>
                  </html>  