<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
       
        mysqli_query($conn,"insert into beli_produk (id_user,tanggal_beli) value('".$_SESSION['id_user']."','".date('Y-m-d')."')");
         $id=mysqli_insert_id($conn); 
 
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into detail_beli_produk (id_beli_produk,id_produk,qty) value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."')");
        }
 
 
        unset($_SESSION['cart']);
        echo '<script>alert("Anda telah berhasil membeli produk tersebut");location.href="histori_transaksi.php"</script>';
    }
?>
  