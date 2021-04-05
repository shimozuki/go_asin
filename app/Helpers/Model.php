<?php
use App\Models\{provinsi,User,DataUser,payment};


// Ambil nama provinsi by kode
if (! function_exists('getNameProvinsi'))
{
    function getNameProvinsi($kode=0)
    {
        $model = new provinsi;
        $data  = $model::where('kode',$kode)->first();
        $name = !empty($data) ? $data->nama : 'Not Found';
        $name = !empty($name) ? $name : 'Not Found';
        return $name;
    }
}

// Format Rupiah
if (! function_exists('rupiah'))
{
    function rupiah($angka)
    {
      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
      return $hasil_rupiah;
    }
}

// Format date
if (! function_exists('forDate'))
{
    function forDate()
    {
      $showdate = date('d F Y');
      return $showdate;
    }
}

// Show bulan dan tahun
if (! function_exists('monthyear'))
{
    function monthyear()
    {
      $showdate = date('F Y');
      return $showdate;
    }
}

// Ambil nama user by id
if (! function_exists('getNameUser'))
{
    function getNameUser($id=0)
    {
        $model = new User;
        $data  = $model::where('id',$id)->first();
        $name = !empty($data) ? $data->name : 'Not Found';
        $name = !empty($name) ? $name : 'Not Found';
        return $name;
    }
}

// Ambil nomor user by id
if (! function_exists('getTlpUser'))
{
    function getTlpUser($user_id=0)
    {
        $model = new DataUser;
        $data  = $model::where('user_id',$user_id)->first();
        $tlp = !empty($data) ? $data->tlp : 'Not Found';
        $tlp = !empty($tlp) ? $tlp : 'Not Found';
        return $tlp;
    }
}

// Ambil nama bank by user id
if (! function_exists('getNamaBank'))
{
    function getNamaBank($user_id=0)
    {
      $model = new DataUser;
      $data  = $model::where('user_id',$user_id)->first();
      $namabank = !empty($data) ? $data->nama_bank : 'Not Found';
      $namabank = !empty($namabank) ? $namabank : 'Not Found';
      return $namabank;
    }
}

// Ambil nomor rek by user id
if (! function_exists('getNoRek'))
{
    function getNoRek($user_id=0)
    {
      $model = new DataUser;
      $data  = $model::where('user_id',$user_id)->first();
      $norek = !empty($data) ? $data->nomor_rekening : 'Not Found';
      $norek = !empty($norek) ? $norek : 'Not Found';
      return $norek;
    }
}

// Ambil nama pemilik bank by user id
if (! function_exists('getNamePemilikBank'))
{
    function getNamePemilikBank($user_id=0)
    {
      $model = new DataUser;
      $data  = $model::where('user_id',$user_id)->first();
      $namepemilikbank = !empty($data) ? $data->nama_pemilik : 'Not Found';
      $namepemilikbank = !empty($namepemilikbank) ? $namepemilikbank : 'Not Found';
      return $namepemilikbank;
    }
}