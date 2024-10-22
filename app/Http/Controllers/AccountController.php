<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {

        // Data untuk katalog produk (bisa diambil dari database)
        $user = (object)[
            'name' => 'Ian',
            'email' => 'ian@gmail.com',
            'phone' => '012345678',
            'address' => 'Malang',
        ];

        // Passing data ke view dashboard
        return view('account.index', [
            'user' => $user,
        ]);
    }
}
