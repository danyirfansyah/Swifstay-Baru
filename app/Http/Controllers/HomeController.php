<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorit;
use App\Models\Ulasan;

class HomeController extends Controller
{
    // Halaman Login
    public function tampilan() {
        return view('signin');
    }

    // Beranda Utama
    public function index(Request $request)
    {
        // Dapatkan pengguna yang sedang login
        $getUser = Auth::user();
        if (!$getUser) {
            return redirect('signin')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $profile = Profile::where('id_user', $getUser->id)->first();
        if (!$profile) {
            // $id = Auth::id();
            // dd($getUser->id);
            // $user = Auth::user();
            // $profDat = Profile::where('id_user', $user->id)->first();
            // return view('profile', compact('user', 'profDat'));
            return redirect()->back()->with('error', 'Profil tidak ditemukan.');
        }
        $user = $profile->nama;
        $role = $getUser->role ?? 'Guest';

        // Fetch daftar kos, termasuk filter pencarian
        $query = Kos::query();
        if ($request->filled('keyword')) {
            $query->where('Nama', 'like', '%' . $request->keyword . '%')
                  ->orWhere('Lokasi', 'like', '%' . $request->keyword . '%')
                  ->orWhere('Harga', 'like', '%' . $request->keyword . '%');
        }
        $kosts = $query->get();

        return view('homepage', compact('user', 'role', 'kosts'));
    }

    // Halaman Favorit
    public function favorit()
    {
        $datarole = Auth::user();
        if (!$datarole) {
            return redirect('signin')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $profile = Profile::where('id', $datarole->id)->first();
        if (!$profile) {
            return redirect()->back()->with('error', 'Profil tidak ditemukan.');
        }
        $user = $profile->nama;

        $data = Favorit::where('id_user', $datarole->id)->with('kost', 'user')->get();
        // dd($data->kost->gambar);
        return view("favorit", compact(['datarole', 'user', 'data']));
    }

    public function tambahFavorit($id)
    {
        $favorit = Favorit::where('id_user', Auth::id())->where('id_kos', $id)->count();
        // dd($favorit);
        if ($favorit < 1) {
            Favorit::create([
                'id_user' => Auth::id(),
                'id_kos' => $id
            ]);
        }
        return redirect()->back();
    }

    public function unlist($id) {
        Favorit::where('id_user', Auth::id())->where('id_kos', $id)->delete();
        return redirect()->back();
    }

    // Simpan Ulasan
    public function store(Request $request, $id)
    {
        // Validasi input ulasan
        $request->validate([
            'nilai' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:500',
        ]);

        // Simpan ulasan ke database
        Ulasan::create([
            'kost_id' => $request->kost_id,
            'user_id' => Auth::id(),
            'ulasan'  => $request->ulasan,
            'nilai'   => $request->nilai,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
