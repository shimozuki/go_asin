
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papi Kost - Payment</title>
</head>
<body>
    <p>Halo, {{$nama_user}}</p>
    <p>
        Terima kasih sudah menggunakan layanan {{$jenis}} pada aplikasi Papi Kost.
        Berikut ini adalah invoive pembayaran yang harus dibayarkan : <br>
    </p>
    <p>
        <h4 style="font-weight:bold;">Detail {{$jenis}} Kamar :</h4>
        Nama Kamar : {{$nama_kamar}} <br>
        Nama Bank : {{$nama_bank}} <br>
        No Rek : {{$no_rek}} <br>
        Jumlah : @currency($harga_kamar) <br>
    </p> <br> <br>
    <p>
        Regrads, Andri Desmana
    </p>
</body>
</html>