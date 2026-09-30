<?php
// Data produk 6 produk
$products = [
    ["name" => "Monitor 24 Inch", "category" => "Monitor", "price" => 1800000, "stock" => 4],
    ["name" => "Laptop Productivity", "category" => "Laptop", "price" => 8500000, "stock" => 3],
    ["name" => "Keyboard Mechanical", "category" => "Aksesoris", "price" => 450000, "stock" => 0],
    ["name" => "Mouse Wireless", "category" => "Aksesoris", "price" => 350000, "stock" => 10],
    ["name" => "Headset Bluetooth", "category" => "Audio", "price" => 1200000, "stock" => 5],
    ["name" => "Webcam HD", "category" => "Aksesoris", "price" => 750000, "stock" => 0]
];

$total_products = count($products); // Menghitung total produk otomatis
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cia Store</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f9f9f9; color: #333; }
        header { background: #fff; padding: 15px 30px; display: flex; justify-content: space-between; border-bottom: 1px solid #ddd; }
        .container { max-width: 1000px; margin: 20px auto; padding: 0 15px; }
        .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; }
        .card { background: #fff; padding: 15px; border-radius: 6px; border: 1px solid #ddd; }
        .price-normal { text-decoration: line-through; color: #888; font-size: 13px; }
        .price-discount { color: #d9534f; font-weight: bold; }
        .badge-disc { background: #ffebee; color: #c62828; font-size: 10px; padding: 2px 6px; border-radius: 4px; font-weight: bold; }
        .btn { display: block; text-align: center; padding: 8px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px; margin-top: 10px; }
        .btn.disabled { background: #ccc; pointer-events: none; }
        @media (max-width: 768px) { .product-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 480px) { .product-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <header>
        <h2>Cia Store</h2>
        <div><b>Total Produk:</b> <?php echo $total_products; ?></div>
    </header>

    <div class="container">
        <h2>Katalog Produk</h2>
        <div class="product-grid">
            <?php foreach ($products as $p): ?>
                <div class="card">
                    <small style="color: gray; text-transform: uppercase;"><?php echo $p['category']; ?></small>
                    <h3><?php echo $p['name']; ?></h3>
                    
                    <?php 
                    // Logika Challenge Diskon 10% jika harga >= 1.000.000[cite: 1]
                    if ($p['price'] >= 1000000) {
                        $discount = $p['price'] * 0.10;
                        $final_price = $p['price'] - $discount;
                        echo '<span class="badge-disc">DISKON 10%</span><br>';
                        echo '<span class="price-normal">Rp ' . number_format($p['price'], 0, ',', '.') . '</span><br>';
                        echo '<span class="price-discount">Rp ' . number_format($final_price, 0, ',', '.') . '</span>';
                    } else {
                        echo '<p><b>Rp ' . number_format($p['price'], 0, ',', '.') . '</b></p>';
                    }
                    ?>
                    
                    <div style="margin-top: 10px;">
                        <?php if ($p['stock'] > 0): ?>
                            <p style="color: green; font-size: 13px;">Tersedia (Stok: <?php echo $p['stock']; ?>)</p>
                            <a href="#" class="btn">Beli Sekarang</a>
                        <?php else: ?>
                            <p style="color: red; font-size: 13px;">Stok Habis</p>
                            <a href="#" class="btn disabled">Habis</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>