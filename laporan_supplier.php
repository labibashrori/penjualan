<!doctype html>
<html>
<head>
<title>Laporan Data Supplier</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>


<body>

<div class="col-sm-20">
    	<h1 style="text-align: center;">Data Supplier</h1>
        <br>
        <br>
        
   
      
          
         <div class="table-responsive">
         	<table class="table table-striped" >
            	<thead>
               
                	<tr>
                    
                    	<th>No.</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat Kantor</th>
                        <th>Telepon Kantor</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        
                        
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
			$sql = mysql_query("SELECT * FROM Supplier WHERE NamaSupplier LIKE '%".$_POST['txtCari']."%'
			ORDER BY KodeSupplier LIMIT $posisi, $batas") or die (mysql_error());
		} 
		else{
			$sql = mysql_query("SELECT * FROM Supplier ORDER BY KodeSupplier LIMIT $posisi, $batas")
			or die (mysql_error());
		}
							$no=1;
							while ($data = mysql_fetch_array($sql)) {
						
						?>
                        <tr>
                        	<td><?php echo $no; ?></td>
                            <td><?php echo $data['KodeSupplier']; ?></td>
                            <td><?php echo $data['NamaSupplier']; ?></td>
                            <td><?php echo $data['TanggalLahir']; ?></td>
                            <td><?php echo $data['AlamatKantor']; ?></td>
                            <td><?php echo $data['TeleponKantor']; ?></td>
                            <td><?php echo $data['JenisKelamin']; ?></td>
                            <td><?php echo $data['Email']; ?></td>
    					    <td>
                            
                            </td>
                          </tr>
                          	<?php
								$no++;
								$sql2 = mysql_query("SELECT * FROM Supplier") or die (mysql_error());
				$jumlahdata = mysql_num_rows($sql2);
							}
							?>
                          </tbody>
                         </table>
                         
                          
                       </div>
                     </div>
</body>
</html>