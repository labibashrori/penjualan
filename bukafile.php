<?php
if(isset($_GET['page'])) { //jika page tidak kosong
/*membuat kondisi ketika ada pemanggilan file menggunakan kata kunci page*/
	
	switch ($_GET['page']) {
		case 'barang' : //jika page=beranda maka...
			require_once "barang.php";
			break;
		
		case 'supplier' :
			require_once "supplier.php";
			break;
		
		case 'pembelian' :
			require_once "pembelian.php";
			break;
			
			
		case 'tambah_barang' :
			require_once "tambah_barang.php";
			break;
		
		case 'tambah_supplier' :
			require_once "tambah_supplier.php";
			break;	
		
		case 'tambah_pembelian' :
			require_once "tambah_pembelian.php";
			break;	
		
		
		case 'ubah_barang' :
			require_once "ubah_barang.php";
			break;
		
		case 'ubah_supplier' :
			require_once "ubah_supplier.php";
			break;	
			
		case 'ubah_pembelian' :
			require_once "ubah_pembelian.php";
			break;
			
		
		case 'hapus_barang' :
			require_once "hapus_barang.php";
			break;		
		
		case 'hapus_supplier' :
			require_once "hapus_supplier.php";
			break;
			
		case 'hapus_pembelian' :
			require_once "hapus_pembelian.php";
			break;
		
		
		case 'laporan_barang' :
			require_once "laporan_barang.php";
			break;
			
		case 'laporan_supplier' :
			require_once "laporan_supplier.php";
			break;
			
		case 'laporan_sewa' :
			require_once "laporan_pembelian.php";
			break;		
	}
}else{ //jika page kosong
    require_once "index.php";
}
?>