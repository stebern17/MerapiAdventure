<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Kritik dan Saran
                </div>
                <div class="card-body">
                    <textarea type="text" name="kritik" id="kritik" class="form-control"
                        placeholder="Isi Kritik dan Saran"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>
<?php include 'footer.php'; ?>