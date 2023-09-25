<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- css -->
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;-
}

th {
  background-color: #f2f2f2;
}
    </style>
</head>
<body>
    <h1>list product</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Product</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $p): ?>
                <tr>
                    <td><?=$p->id?></td>
                    <td><?=$p->nama_product?></td>
                    <td><?=$p->deskripsi?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>