
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papi Kost - Payment</title>
</head>
<body>
    <p>Halo, {{$nama_pemilik}}</p>
    <p>
        Ada satu pembayaran yang harus dikonfirmasi nih, silahkan login pada aplikasi.
    </p>
    <p>
        <h4 style="font-weight:bold;">Detail Calon Penghuni :</h4>
        Penghuni : {{$nama_user}} <br>
        Nama  : {{$nama}} <br>
        Nama Bank : {{$nama_bank}} <br>
        No Rek : {{$no_rek_pengirim}} <br>
        Harga sewa : @currency($harga_sewa) <br>
        Jumlah dibayar : @currency($jml_payment) <br>
    </p> <br> <br>
    <p>
        Regrads, Ahmad Robbiul Iman
    </p>
</body>
</html>