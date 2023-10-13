<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?=base_url('update-product/'.$product->id)?>">
        <label for="nama_product">nama produk</label>
        <input value="<?=$product->nama_product?>" type="text" name="nama_product" id="">
        <label for="deskripsi">deskripsi</label>
        <input value="<?=$product->deskripsi?>" type="text" name="deskripsi" id="">
        <button type="submit">Edit</button>
    </form>
</body>
</html>