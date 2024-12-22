<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kos;
use App\Models\Ulasan;

class KosController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'facility' => 'required|string',
            'price' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:1044',
            'deskripsi' => 'nullable|string',
            'kelas' => 'nullable|string',
            'ukuran' => 'nullable|string',
            'akses' => 'nullable|string',
            'no_telp' => 'nullable|string|max:15',
        ]);

        // Handle the file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fileimg', $filename);
        }

        // Save the kos information in the database
        $kos = new Kos();
        $kos->id_user = Auth::id();
        $kos->Nama = $request->name;
        $kos->Lokasi = $request->location;
        $kos->Fasilitas = $request->facility;
        $kos->Deskripsi = $request->deskripsi;
        $kos->Kelas = $request->kelas;
        $kos->Ukuran = $request->ukuran;
        $kos->Akses_Kendaraan = $request->akses;
        $kos->Harga = $request->price;
        $kos->No_telp = $request->no_telp;
        $kos->Gambar = $filename;
        
        if ($kos->save()) {
            return redirect()->route('homepage')->with('success', 'File berhasil diupload');
        } else {
            return redirect()->route('insertKos')->with('error', 'Gagal mengupload gambar');
        }
    }

    public function detail($id)
    {
        $datarole = Auth::user();
        $data = Kos::find($id);
        // $datarole = $user->role ?? 'Guest';
        $jumlahKos = ulasan::where('id_kos', $id)->count();
        if($jumlahKos != 0){
            $jumlahNilai = ulasan::where('id_kos', $id)->sum('Nilai');
            $hasil = $jumlahNilai / $jumlahKos;
        }else{
            $hasil = 0;
        }
        // !dd($hasil);
        return view('detail', compact('data','datarole','hasil'));
        
    }
}
