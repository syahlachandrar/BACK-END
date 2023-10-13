<!-- view_product.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?= base_url('insert-product') ?>">
        <label for="nama_product">nama produk</label>
        <input  type="text" name="nama_product" id="nama_product">
        <label for="deskripsi">deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi">
        <button type="submit">tambah</button>
    </form>
</body>
</html>
