<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {

        // Data untuk katalog produk (bisa diambil dari database)
        $catalogs = [
            [
                'name' => 'Rugby Jersey Y2K',
                'price' => 50,
                'image' => 'img/jersey.jpg', // Path untuk gambar produk
            ],
            [
                'name' => 'Eagle Double LS',
                'price' => 50,
                'image' => 'img/FRONT BLUE.png',
            ],
            [
                'name' => '888 Hoodie Zipper',
                'price' => 50,
                'image' => 'img/888.jpg',
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

        // Passing data ke view dashboard
        return view('catalog.index', [
            'catalogs' => $catalogs,
        ]);
    }
}
