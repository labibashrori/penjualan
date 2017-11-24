<!doctype html>
<html>
<head>
<title>Data Barang</title>
</head>

<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
<div class="col-sm-20">
    	<h1 style="text-align: center;">Data Barang</h1>
        <br>
        <br>
        <form class="form-horizontal" name="frmCari" method="post">
        <div class="form-group">
        	<div class="col-sm-4">
        	<a href="?page=tambah_barang" class="btn btn-primary btn-sm">Tambah</a>
         </div>
         <div class="col-sm-4">
         </div>
         <div class="col-sm-3">
         	<input type="text" class="form-control" name="txtCari" placeholder="Nama Barang"/>
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
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
			$sql = mysql_query("SELECT * FROM Barang WHERE NamaBarang LIKE '%".$_POST['txtCari']."%'
			ORDER BY KodeBarang LIMIT $posisi, $batas") or die (mysql_error());
		} 
		else{
			$sql = mysql_query("SELECT * FROM Barang ORDER BY KodeBarang LIMIT $posisi, $batas")
			or die (mysql_error());
		}
							$no=1;
							while ($data = mysql_fetch_array($sql)) {
						
						?>
                        <tr>
                        	<td><?php echo $no; ?></td>
                            <td><?php echo $data['KodeBarang']; ?></td>
                            <td><?php echo $data['NamaBarang']; ?></td>
                            <td><?php echo $data['JenisBarang']; ?></td>
                            <td><?php echo $data['Harga']; ?></td>
                           	<td><?php echo $data['Jumlah']; ?></td>
    					    <td>
                            <a href="?page=ubah_barang&id=<?php echo $data['KodeBarang']; ?>" class="btn btn-info btn-sm">Ubah</a>
                            <a href="?page=hapus_barang&id=<?php echo $data['KodeBarang']; ?>" onClick="return confirm('Yakin menghapus data ini ?');" class="btn btn-warning btn-sm">Hapus</a>
                            </td>
                          </tr>
                          	<?php
								$no++;
								$sql2 = mysql_query("SELECT * FROM Barang") or die (mysql_error());
				$jumlahdata = mysql_num_rows($sql2);
							}
							?>
                          </tbody>
                         </table>
                         
                          <center> Jumlah Data : <?php echo $jumlahdata ?></center>
        <?php
			$jmlhal = ceil($jumlahdata/$batas);
			$url = "?page=barang"; //url dari halaman ini
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
                         <center><a href="laporan_barang.php" class="btn btn-danger btn-sm"
                         target="_blank">Cetak Laporan</a></center>
<br>
                         <center><a href="laporan_barang2.php" class="btn btn-danger btn-sm"
                         target="_blank">Cetak</a></center>
                       </div>
                     </div>
 
        
</body>
</html>