<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DataUser,kamar,fkamar,fkamar_mandi,fbersama,fparkir,area,fotokamar,provinsi};
use Auth;
use Session;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kamar = kamar::where('user_id',auth::user()->id)->get();
      return view('pemilik.kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $provinsi = provinsi::select('kode','nama')->get();
      // Cek data bank
      if ($this->databank()) {
        Session::flash('error','Data Akun Belum Lengkap !');
        return redirect('/home');
      }
      return view('pemilik.kamar.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $foto = $request->file('bg_foto');
      $nama_foto = time()."_".$foto->getClientOriginalName();
      // isi dengan nama folder tempat kemana file diupload
      $tujuan_upload = 'bg_foto';
      $foto->move($tujuan_upload,$nama_foto);

      $slug = \Str::slug($request->nama_kamar) . "-" . \Str::random(6);
      $kamar = new Kamar;
      $kamar->id = $request->id;
      $kamar->user_id = auth::id();
      $kamar->slug = $slug;
      $kamar->nama_kamar = $request->nama_kamar;
      $kamar->jenis_kamar = $request->jenis_kamar;
      $kamar->luas_kamar = $request->luas_kamar;
      $kamar->stok_kamar = $request->stok_kamar;
      $kamar->sisa_kamar = $kamar->stok_kamar;
      $kamar->harga_kamar = $request->harga_kamar;
      $kamar->ket_lain = $request->ket_lain;
      $kamar->ket_biaya = $request->ket_biaya;
      $kamar->desc = $request->desc;
      $kamar->kategori = $request->kategori;
      $kamar->book = $request->book;
      $kamar->bg_foto = $nama_foto;
      $kamar->provinsi_id = $request->provinsi_id;
      $kamar->save();

      if ($kamar) {
          foreach($request->addmore as $value){
            $fkamar = new fkamar;
            $fkamar->kamar_id = $kamar->id;
            $fkamar->name = $value['name'];
            $fkamar->save();
          }
      }

      if ($kamar && $fkamar) {
          foreach ($request->addkm as $value) {
            $fkamar_mandi = new fkamar_mandi;
            $fkamar_mandi->kamar_id = $kamar->id;
            $fkamar_mandi->name = $value['name'];
            $fkamar_mandi->save();
          }
      }

      if ($kamar && $fkamar && $fkamar_mandi) {
          foreach ($request->addbersama as $value) {
            $fbersama = new fbersama;
            $fbersama->kamar_id = $kamar->id;
            $fbersama->name = $value['name'];
            $fbersama->save();
          }
      }

      if ($kamar && $fkamar && $fkamar_mandi && $fbersama) {
          foreach ($request->addparkir as $value) {
            $fparkir = new fparkir;
            $fparkir->kamar_id = $kamar->id;
            $fparkir->name = $value['name'];
            $fparkir->save();
          }
      }

      if ($kamar && $fkamar && $fkamar_mandi && $fbersama && $fparkir) {
          foreach ($request->addarea as $value) {
            $area = new area;
            $area->kamar_id =  $kamar->id;
            $area->name = $value['name'];
            $area->save();
          }
      }

      if ($kamar&& $fkamar&& $fkamar_mandi&& $fbersama&& $fparkir&& $area) {
          foreach($request->addfoto as $value) {
            $foto_kamar = $value['foto_kamar'];
            $nama_foto = time()."_".$foto_kamar->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto_kamar';
            $foto_kamar->move($tujuan_upload,$nama_foto);

            $foto = new fotokamar;
            $foto->kamar_id = $kamar->id;
            $foto->foto_kamar = $nama_foto;
            $foto->save();
          }
      }

      Session::flash('success','Kamar berhasil ditambah');
      return redirect('pemilik/kamar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $show = kamar::where('slug', $slug)->where('user_id',auth::id())->first();
      return view('pemilik.kamar.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = kamar::where('id', $id)->first();
      // dd($edit);
      $provinsi = provinsi::select('kode','nama')->get();
      return view('pemilik.kamar.edit', compact('edit','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kamar = Kamar::findOrFail($id);
      $kamar->user_id = auth::id();
      $kamar->nama_kamar = $request->nama_kamar;
      $kamar->jenis_kamar = $request->jenis_kamar;
      $kamar->luas_kamar = $request->luas_kamar;
      $kamar->stok_kamar = $request->stok_kamar;
      $kamar->sisa_kamar = $kamar->stok_kamar;
      $kamar->harga_kamar = $request->harga_kamar;
      $kamar->ket_lain = $request->ket_lain;
      $kamar->ket_biaya = $request->ket_biaya;
      $kamar->desc = $request->desc;
      $kamar->kategori = $request->kategori;
      $kamar->book = $request->book;
      $kamar->provinsi_id = $request->provinsi_id;
      $kamar->save();

       if ($kamar) {
        if ($request->addmore) {
          foreach($request->addmore as $value){
            $fkamar = new fkamar;
            $fkamar->kamar_id = $id;
            $fkamar->name = $value['name'];
            $fkamar->save();
          }
        }
      }

      if ($kamar ) {
        if ($request->addkm) {
          foreach ($request->addkm as $value) {
            $fkamar_mandi = new fkamar_mandi;
            $fkamar_mandi->kamar_id = $id;
            $fkamar_mandi->name = $value['name'];
            $fkamar_mandi->save();
          }
        }
      }

      if ($kamar ) {
        if ($request->addbersama) {
          foreach ($request->addbersama as $value) {
            $fbersama = new fbersama;
            $fbersama->kamar_id = $id;
            $fbersama->name = $value['name'];
            $fbersama->save();
          }
        }
      }

      if ($kamar) {
        if ($request->addparkir) {
          foreach ($request->addparkir as $value) {
            $fparkir = new fparkir;
            $fparkir->kamar_id = $id;
            $fparkir->name = $value['name'];
            $fparkir->save();
          }
        }
      }

      if ($kamar) {
        if ($request->addarea) {
          foreach ($request->addarea as $value) {
            $area = new area;
            $area->kamar_id =  $id;
            $area->name = $value['name'];
            $area->save();
          }
        }
      }

      Session::flash('success','Kamar Berhasil Di Update !');
      return redirect('pemilik/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Cek data bank user
    protected function databank()
    {
      $databank = Auth::user()->datauser->nama_bank == NULL && Auth::user()->datauser->nama_pemilik == NULL && Auth::user()->datauser->nomor_rekening == NULL;

      return $databank;
    }
}
