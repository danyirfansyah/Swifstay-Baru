<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
    $profDat = Profile::where('id_user', $user->id)->first();
    // Ambil data profil berdasarkan user id
    // dd($profDat);
    // Ambil gambar profil, jika ada
    // $dataSql = $profDat ? $profDat->img_prof : null;
    // $profDat = 
    // !dd($dataSql);
    return view('profile', compact('profDat', 'user'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:1044', // Gambar opsional
        'jeniskelamin' => 'required',
        'tanggallahir' => 'required|date',
        'nomortelp' => 'required|numeric',
    ]);
    
    // Cari data berdasarkan ID
    // $profile = Profile::find($id);
    // dd($id);

    
    // dd($request->all());
    // if (!$profile) {
    //     // Profile::create([
    //     //     'id_user' => Auth::id(),
    //     //     'nama' => $request->nama,
    //     //     'Jenis_Kelamin' => $request->jeniskelamin,
    //     //     'Tanggal_lahir' => $request->tanggallahir,
    //     //     'Nomor_Telepon' => $request->nomortelp,
    //     // ]);
    //     return redirect()->back()->withErrors(['error' => 'Profil tidak ditemukan']);
    //     // return redirect()->route('profile', ['id' => $id])->with('error', 'Profil tidak ditemukan');
    //     // $id = Auth::id();
    //     // return view('profile', compact('id'));
    // }


    $profile = Profile::where( "id_user", $id) -> first();
    // $profile = Profile::find($id_user->id);
    // dd($profile);
    $profile->update([
            'id_user' => Auth::id(),
            'nama' => $request->nama,
            'Jenis_Kelamin' => $request->jeniskelamin,
            'Tanggal_lahir' => $request->tanggallahir,
            'Nomor_Telepon' => $request->nomortelp,
        ]);

    // Update data
    // $profile->id_user = Auth::id();
    // $profile->nama = $request->nama;
    // $profile->Jenis_Kelamin = $request->jeniskelamin;
    // $profile->Tanggal_lahir = $request->tanggallahir;
    // $profile->Nomor_Telepon = $request->nomortelp;

    // Cek apakah file gambar diupload
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($profile->img_prof && File::exists(public_path('profil/' . $profile->img_prof))) {
            File::delete(public_path(path: 'profil/' . $profile->img_prof));
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('profil'), $fileName);
        $profile->img_prof = $fileName;
    }

    // $profile->save(); // Simpan perubahan

    return redirect()->route('profile', ['id' => $id])->with('success', 'Profil berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
