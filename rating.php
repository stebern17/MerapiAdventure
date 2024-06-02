<?php
require 'koneksi/koneksi.php';
session_start();

// Proses pengiriman ulasan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ulasan = $_POST['ulasan'];

    $stmt = $koneksi->prepare("INSERT INTO ulasan (isi) VALUES (?)");
    $stmt->execute([$ulasan]);

    $message = "Ulasan Anda telah berhasil dikirim!";
}

include 'header.php';
?>

<div class="container mt-5">
    <h2>Kirim Ulasan Anda</h2>
    <?php if (isset($message)) { ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <form action="rating.php" method="post">
        <div class="form-group">
            <label for="ulasan">Ulasan:</label>
            <textarea class="form-control" id="ulasan" name="ulasan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

<?php
// Ambil ulasan dari database
$stmt = $koneksi->query("SELECT * FROM ulasan ORDER BY created_at DESC");
$ulasans = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h2>Ulasan Pengguna</h2>
    <?php foreach ($ulasans as $ulasan) { ?>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text"><?php echo htmlspecialchars($ulasan['isi']); ?></p>
                <small class="text-muted">Dikirim pada: <?php echo $ulasan['created_at']; ?></small>
            </div>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>
