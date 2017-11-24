<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">       
<?php
    error_reporting(0);
    require_once "koneksi.php";
    
    if (!$_GET['id']=="") {
        $sql = mysql_query("SELECT * FROM Pembelian WHERE NomorNota='".$_GET['id']."'")
            or die (mysql_error());
        $data = mysql_fetch_array($sql);
    }
    
    if (isset($_POST['btnUbah'])) {
        
        $sql_update = "UPDATE Pembelian SET
        KodeBarang='".$_POST['txtKodeBarang']."',
        KodeSupplier='".$_POST['txtKodeSupplier']."',
        TanggalBeli='".$_POST['txtTanggalBeli']."',
        JumlahBeli='".$_POST['txtJumlahBeli']."',
        HargaBeli='".$_POST['txtHargaBeli']."',
        Total='".$_POST['txtTotal']."'
        WHERE NomorNota= '".$data['NomorNota']."'";
        $query_update = mysql_query($sql_update) or die (mysql_error());
        
        if ($query_update) {
            echo "<div class='alert alert-success'>
                <a href='?page=pembelian' class='close' data-dismiss='alert'>&times;</a>
                Ubah berhasil
                </div>";
            echo "<meta http-equiv='refresh' content='1; url=?page=pembelian'>";
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
<title>Ubah Data Pembelian</title>
</head>

<body>
    <div class="col-sm-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Data Pembelian</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
                
                    
                    
                   <div class="form-group">
                        <label for="NomorNota" class="control-label col-sm-2">Nomor Nota</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtNomorNota" placeholder="Kode Supplier"
                            value="<?php echo $data['NomorNota']; ?>"/>
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
										$a='';
										if ($data['KodeBarang']==$row['KodeBarang'])
										{
											$a='selected';
										}
										echo '<option '.$a.' value="' . $row['KodeBarang'] . '">' . $row['KodeBarang'] . '</option>';
										$jsbarang .= "barang['" . $row['KodeBarang'] . "'] = {nama:'" . addslashes($row['Nama']) ."'};\n";
									}
									echo '</select>';
									?>
										
									</select>
                          
                          
                        </div>
                 </div>
                 
                 <div class="form-group">
                        <label for="NamaSupplier" class="control-label col-sm-2">Kode Supplier</label>
                        <div class="col-sm-4">
           
                            
                            <select class="form-control" name="txtKodeBarang" onChange="changes(this.value)" >
                                    <?php
									$result = mysql_query("select * from supplier");
									$jsbarang = "var barang = new Array();\n";
									
									while ($row = mysql_fetch_array($result)) {
										$a='';
										if ($data['KodeSupplier']==$row['KodeSupplier'])
										{
											$a='selected';
										}
										echo '<option '.$a.' value="' . $row['KodeSupplier'] . '">' . $row['KodeSupplier'] . '</option>';
										$jsbarang .= "barang['" . $row['KodeSupplier'] . "'] = {nama:'" . addslashes($row['Nama']) ."'};\n";
									}
									echo '</select>';
									?>
										
									</select>
                        </div>
                 </div>
                 

                 <div class="form-group">
                        <label for="TanggalLahir" class="control-label col-sm-2">Tanggal Beli</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="txtTanggalBeli" id="datepicker" placeholder="TanggalLahir"
                            value="<?php echo $data['TanggalBeli']; ?>"/> 
                        </div>
                 </div>
                  
                  
                  <div class="form-group">
                            <label for="Email" class="control-label col-sm-2">Jumlah Beli</label>
                            <div class="col-sm-4">
                                                              
                                
                                <input type="text" class="form-control" name="txtJumlahBeli" id="txtJumlahBeli"  onkeyup="perkalian()" value="<?php echo $data['JumlahBeli']; ?>"/>
                             </div>
                         </div>

                  <div class="form-group">
                            <label for="Email" class="control-label col-sm-2">Harga Beli</label>
                            <div class="col-sm-4">
                                
                                <input type="text" class="form-control" name="txtHargaBeli" id="txtHargaBeli"  onkeyup="perkalian()" value="<?php echo $data['HargaBeli']; ?>"/>
                             </div>
                         </div>
                 
                                         

                        <div class="form-group">
                            <label for="Email" class="control-label col-sm-2">Total</label>
                            <div class="col-sm-4">
                                
                                <input type="text" class="form-control" name="txtTotal" id="txtTotal" value="<?php echo $data['Total']; ?>"/>
                             </div>
                         </div>
                       
                      
                    
                 
                 <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
                        <button type="reset" class="btn btn-info" name="btnBatal"
                        onClick="window.location.href='?page=pembelian'">Batal</button>
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