<!DOCTYPE html>
<html>
<head>
    <title>Test Upload</title>
</head>
<body>
    <h2>Test Upload Form</h2>
    <form action="<?php echo base_url('admin/add_product'); ?>" method="POST" enctype="multipart/form-data">
        <p>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" value="Test Product" required>
        </p>
        <p>
            <label>Kategori:</label><br>
            <select name="category" required>
                <option value="daging">DAGING</option>
            </select>
        </p>
        <p>
            <label>Harga:</label><br>
            <input type="number" name="price" value="50000" required>
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="10" required>
        </p>
        <p>
            <label>Unit:</label><br>
            <select name="unit">
                <option value="kg">Kilogram (kg)</option>
            </select>
        </p>
        <p>
            <label>Deskripsi:</label><br>
            <textarea name="description">Test description</textarea>
        </p>
        <p>
            <label>Gambar:</label><br>
            <input type="file" name="product_image" accept="image/jpeg,image/jpg,image/png,image/gif">
        </p>
        <p>
            <label>Status:</label><br>
            <input type="radio" name="status" value="active" checked> Aktif
        </p>
        <p>
            <button type="submit">Test Upload</button>
        </p>
    </form>
</body>
</html>
