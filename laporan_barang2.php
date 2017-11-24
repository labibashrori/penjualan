<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Data Barang</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	
<div class="col-sm-20">
    	<h1 style="text-align: center;">Data Barang</h1>
        <br>
        <br>
        
   
      
          
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
			$sql = mysql_query("SELECT * FROM Barang where Jumlah <100 ORDER BY KodeBarang ")
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
                         
                          
                       </div>
                     </div>
</body>
</html>