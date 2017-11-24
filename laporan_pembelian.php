<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Pembelian</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>

<body>
		
	<div class="col-sm-20">
    	<h1 style="text-align: center;">Data Pembelian</h1>
        <br>
        <br>
        
      
          
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
                         
                          </div>
                          </div>
</body>
</html>