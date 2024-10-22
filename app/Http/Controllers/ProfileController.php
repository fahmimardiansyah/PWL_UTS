<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfileController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Profile User',
            'list' => ['Home', 'Profile']
        ];
    
        $activeMenu = 'profile'; // Set menu as active
        $level = LevelModel::all(); // If you're using levels
    
        $page = (object) [
            'title' => 'Profile User'
        ];
    
        // Pass the authenticated user
        $user = auth()->user();
    
        return view('profile.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'user' => $user, 
            'activeMenu' => $activeMenu
        ]);
    }    

    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:4096',
        ]);

        $file = $request->file('foto');

        $fileContents = file_get_contents($file->getRealPath());

        $user = auth()->user(); 
        $user->photo = $fileContents;

        $user->save(); 

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function showProfileImage()
    {
        $user = auth()->user();

        if ($user && $user->photo) {
            return response($user->photo)->header('Content-Type', 'photo/jpg'); // Adjust MIME type accordingly
        } else {
            return response('No image', 404);
        }
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }
    
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        // Validasi input form
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            // Validasi lainnya jika diperlukan
        ]);
    
        // Update data user
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'level' => $request->level,
            // Field lainnya jika ada
        ]);
    
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

}