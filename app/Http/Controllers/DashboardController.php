<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data untuk banner
        $banner = [
            'title' => 'Our Client',
            'subtitle' => 'Around The World',
            'image' => 'img/army.jpg',  // Ubah dengan path gambar banner
        ];

        // Data untuk katalog produk (bisa diambil dari database)
        $catalogs = [
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg', 
            ],
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg',
            ],
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg',
            ],
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg',
            ],
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg',
            ],
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg',
            ],
        ];

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
        return view('dashboard.index', [
            'banner' => $banner,
            'catalogs' => $catalogs,
            'assets' => $assets,
        ]);
    }
}
