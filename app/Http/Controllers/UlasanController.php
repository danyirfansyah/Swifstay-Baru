<?php

namespace App\Http\Controllers;

use App\Models\Ulasan; // Assuming you have a model named Ulasan for the ulasan table
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function storeOrUpdate(Request $request, $id)
    {
        // Retrieve the logged-in user
        $idUser = Auth::id();

        // Validate the incoming request data
        $request->validate([
            'nilai' => 'required|integer|min:1|max:5', // assuming nilai is an integer rating from 1 to 5
            'ulasan' => 'required|string|max:1000', // assuming ulasan is a string with a max length of 1000
        ]);

        // Check if the user has already submitted a review for the given kos
        $ulasan = Ulasan::where('id_user', $idUser)
                        ->where('id_kos', $id)
                        ->first();

        // If a review exists, update it; otherwise, create a new review
        if ($ulasan) {
            $ulasan->update([
                'Nilai' => $request->input('nilai'),
                'Ulasan' => $request->input('ulasan')
            ]);
        } else {
            Ulasan::create([
                'id_user' => $idUser,
                'id_kos' => $id,
                'username' => Auth::user()->username,
                'Nilai' => $request->input('nilai'),
                'ulasan_user' => $request->input('ulasan')
            ]);
        }
        
        // Redirect back to the homepage or the desired page
        return redirect()->route('homepage');
    }
}
