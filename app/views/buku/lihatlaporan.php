<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Doc 1</title>
 <link rel="stylesheet" href="<?= base_url ?>/dist/js/normalize.min.css">
 <link rel="stylesheet" href="<?= base_url ?>/dist/css/paper.css">
 <style type="text/css" media="print">
 @page 
 {
 size: auto; margin: 0mm; 
 }
</style>
 <style>
 .center {
 margin-right: auto;
 margin-left: auto;
 text-align: center;
 }
 h1 {
 font-size: 16px;
 }
 * {
 font-family: Calibri;
 font-size: 14px;
 -webkit-print-color-adjust:exact;
 }
 .table {
 border: solid 1px #DDEEEE;
 border-collapse: collapse;
 border-spacing: 0;
 font: normal 13px Arial, sans-serif;
 width: 100%;
}
.table thead th {
 background-color: #DDEFEF;
 border: solid 1px #DDEEEE;
 color: #336B6B;
 padding: 10px;
 text-align: left;
 text-shadow: 1px 1px 1px #fff;
}
.table tbody td {
 border: solid 1px #DDEEEE;
 color: #333;
 padding: 10px;
 text-shadow: 1px 1px 1px #fff;
}
</style>
</head>
<body class="A4 potrait">
 <section class="sheet padding-15mm">
 <h1 class="center" style="text-decoration: underline;margin-top: 20px;"><?= $data['title'] ?></h1>
 <table class="table">
 <thead> 
 <tr>
 <th style="width: 10px">#</th>
 <th>Judul</th>
 <th>Penerbit</th>
 <th>Pengarang</th>
 <th>Tahun</th>
 <th>Kategori</th>
 <th>Harga</th>
 </tr>
 </thead>
 <tbody>
 <?php $no=1; ?> 
 <?php foreach ($data['buku'] as $row) :?>
 <tr>
 <td><?= $no; ?></td>
 <td><?= $row['judul'];?></td>
 <td><?= $row['penerbit'];?></td>
 <td><?= $row['pengarang'];?></td>
 <td><?= $row['tahun'];?></td>
 <td><div class="badge badge-warning"><?= $row['nama_kategori'];?></div></td>
 <td><?= $row['harga'];?></td>
 </tr>
 <?php $no++; endforeach; ?>
 </tbody>
 </table>
 </section>
<script type="text/javascript">
</script>
</body>
</html>
