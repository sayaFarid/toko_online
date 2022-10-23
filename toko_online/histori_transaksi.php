<?php 
    include "header.php";
?>
<h2>Histori Transaksi</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Beli</th><th>Nama Produk</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php"; 
        $qry_histori=mysqli_query($conn,"select * from beli order by id_beli desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan produk yang dibeli
            $produk_dibeli="<ol>";
            $qry_produk=mysqli_query($conn,"select * from  detail_produk join beli on beli.id_beli=detail_beli.id_beli where id_beli = '".$dt_histori['id_beli']."'");
            while($dt_produk=mysqli_fetch_array($qry_produk)){
                $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
            } 
            $produk_dibeli.="</ol>";
             
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
    include "footer.php";
?>
 