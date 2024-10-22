<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index()
    {

        // Data untuk assets (bisa berupa gambar atau info lain)
        $assets = [
            [
                'name' => 'Y2K Font Pack',
                'image' => 'img/y2k asset dump.png', // Path gambar asset
            ],
            [
                'name' => 'People Pack Vol.1',
                'image' => 'img/pixel font dump.png',
            ],
            [
                'name' => 'People Pack Vol.1',
                'image' => 'img/People img asset.png',
            ],
            [
                'name' => 'People Pack Vol.1',
                'image' => 'img/Super Pack Asset.png',
            ],
            // Tambah asset lain di sini
        ];

        // Passing data ke view dashboard
        return view('assets.index', [
            'assets' => $assets,
        ]);
    }
}
