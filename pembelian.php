<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Pembelian</title>
</head>

<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
   	<div class="col-sm-20">
       <h1 style="text-align: center;">Data Pembelian</h1>
       <br>
       <br>
       
       <form class="form-horizontal" name="frmCari" method="post">
       <div class="form-group">
       <div class="col-sm-4">
       <a href="?page=tambah_pembelian" class="btn btn-primary btn-sm">Tambah</a>
       </div>
        
       <div class="col-sm-4">
        	
       </div>
        	
       <div class="col-sm-3">
       		<input type="text" class="form-control" name="txtCari" placeholder="Nomor Nota"/>
       </div>
        
       <div class="col-sm-1">
       		<button type="submit" class="btn btn-success" name="btnCari">Cari</button>
       </div>
         </div>
         </form>
         
         <div class="table-responsive">
         	<table class="table table-striped" >
            	<thead>
                   
                   <tr>  
                       <th>No.</th>
                       <th>Nomor Nota</th>
                       <th>Kode Barang</th>
                       <th>Kode Supplier</th>
                       <th>Tanggal Beli</th>
                       <th>Jumlah Beli</th>
                       <th>Harga Beli</th>
                       <th>Total</th>
                       <th>Kelola</th>
                   </tr>
                 </thead>
                 <tbody>
                 
                 		<?php
							include "koneksi.php";
							$batas = 10;
			
			if (isset($_GET['hal'])) {
				$hal = ($_GET['hal']);
				$posisi = ($hal-1) *$batas;
			} else{
				$posisi = 0;
				$hal =  1;
			}

   		if (isset($_POST['btnCari'])) {
			$sql = mysql_query("SELECT * FROM Pembelian WHERE NomorNota LIKE '%".$_POST['txtCari']."%'
			ORDER BY NomorNota LIMIT $posisi, $batas") or die (mysql_error());
		} 
		else{
			$sql = mysql_query("SELECT * FROM Pembelian ORDER BY NomorNota LIMIT $posisi, $batas")
			or die (mysql_error());
		}
							$no=1;
							while ($data = mysql_fetch_array($sql)) {
						
						?>
                        <tr>
                        	<td><?php echo $no; ?></td>
                            <td><?php echo $data['NomorNota']; ?></td>
                            <td><?php echo $data['KodeBarang']; ?></td>
                            <td><?php echo $data['KodeSupplier']; ?></td>
                            <td><?php echo $data['TanggalBeli']; ?></td>
                            <td><?php echo $data['JumlahBeli']; ?></td>
                           	<td><?php echo $data['HargaBeli']; ?></td>
                            <td><?php echo $data['Total']; ?></td>
    					    <td>
                            <a href="?page=ubah_pembelian&id=<?php echo $data['NomorNota']; ?>" class="btn btn-info btn-sm">Ubah</a>
                            <a href="?page=hapus_pembelian&id=<?php echo $data['NomorNota']; ?>" onClick="return confirm('Yakin menghapus data ini ?');" class="btn btn-warning btn-sm">Hapus</a>
                            </td>
                          </tr>
                          	<?php
								$no++;
								$sql2 = mysql_query("SELECT * FROM Pembelian") or die (mysql_error());
				$jumlahdata = mysql_num_rows($sql2);
							}
							?>
                          </tbody>
                         </table>	
                         
                          <center> Jumlah Data : <?php echo $jumlahdata ?></center>
        <?php
			$jmlhal = ceil($jumlahdata/$batas);
			$url = "?page=chart"; //url dari halaman ini
			echo "<center>";
			if ($hal>1) {
				$previous=$hal-1;
				echo " << <a href=$url&hal=1>First</a> | <a href=$url&hal=$previous>Prev</a> | ";
			}
			else {
				echo "<< First | < Prev |";
			}
			
			if ($hal < $jmlhal) {
				$next = $hal+1;
				echo "| <a href=$url&hal=$next> Next</a> | <a href=$url&jmlhal=$jmlhal>Last</a> >> ";
			}
			else {
				echo " Next | Last >>";
			}
			echo "</center>";
		?>
                         <center><a href="laporan_pembelian.php" class="btn btn-danger btn-sm"
                         target="_blank">Cetak Laporan</a></center>
                       </div>
                     </div>
</body>
</html>