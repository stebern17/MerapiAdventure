<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Membuat tinggi minimum setara dengan tinggi viewport */
        }

        .content {
            flex: 1; /* Membuat konten memenuhi ruang yang tersisa */
            padding: 20px; /* Contoh padding untuk memberi jarak antara konten dan footer */
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            
        }
    </style>
</head>
<body>

    <div class="content">
        <!-- Konten halaman Anda di sini -->
    </div>

    <div class="footer">
        <div class="container">
            Copyright <?= date('Y');?> <?= $infoweb->corp_name;?> All Rights Reserved
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
