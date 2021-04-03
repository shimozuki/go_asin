<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\provinsi;

class provinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = new provinsi;
        $provinsi->kode = 11;
        $provinsi->nama = 'ACEH';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 12;
        $provinsi->nama = 'SUMATERA UTARA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 13;
        $provinsi->nama = 'SUMATERA BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 14;
        $provinsi->nama = 'RIAU';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 15;
        $provinsi->nama = 'JAMBI';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 16;
        $provinsi->nama = 'SUMATERA SELATAN';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 17;
        $provinsi->nama = 'BENGKULU';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 18;
        $provinsi->nama = 'LAMPUNG';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 19;
        $provinsi->nama = 'KEPULAUAN BANGKA BELITUNG';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 21;
        $provinsi->nama = 'KEPULAUAN RIAU';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 31;
        $provinsi->nama = 'DKI JAKARTA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 32;
        $provinsi->nama = 'JAWA BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 33;
        $provinsi->nama = 'JAWA TENGAH';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 34;
        $provinsi->nama = 'DI JOGYAKARTA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 35;
        $provinsi->nama = 'JAWA TIMUR';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 36;
        $provinsi->nama = 'BANTEN';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 51;
        $provinsi->nama = 'BALI';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 52;
        $provinsi->nama = 'NUSA TENGGARA BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 53;
        $provinsi->nama = 'NUSA TENGGARA TIMUR';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 61;
        $provinsi->nama = 'KALIMANTAN BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 62;
        $provinsi->nama = 'KALIMANTAN TENGAH';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 63;
        $provinsi->nama = 'KALIMANTAN SELATAN';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 64;
        $provinsi->nama = 'KALIMANTAN TIMUR';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 65;
        $provinsi->nama = 'KALIMANTAN UTARA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 72;
        $provinsi->nama = 'SULAWESI TENGAH';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 73;
        $provinsi->nama = 'SULAWESI SELATAN';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 74;
        $provinsi->nama = 'SULAWESI TENGGARA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 75;
        $provinsi->nama = 'GORONTALO';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 76;
        $provinsi->nama = 'SULAWESI BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 81;
        $provinsi->nama = 'MALUKU';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 82;
        $provinsi->nama = 'MALUKU UTARA';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 91;
        $provinsi->nama = 'PAPUA BARAT';
        $provinsi->save();

        $provinsi = new provinsi;
        $provinsi->kode = 94;
        $provinsi->nama = 'PAPUA';
        $provinsi->save();
    }
}
