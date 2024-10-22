<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {

        $clients = [
            [
                'name' => 'end days',
                'bio' => 'site is open. everything is premade ready to ship',
                'image' => 'img/end.jpg',
                'social' => 'https://www.instagram.com/end_days_/p/C_ldnsWvGnf/?img_index=1', 
            ],
            [
                'name' => 'WorldWideWork',
                'bio' => 'CONVERTIBLE REFLECTIVE TRACKSUITS + SURPRISE ITEMS TOMORROW @ 4PM EST.',
                'image' => 'img/worldwide.jpg', 
                'social' => 'https://www.instagram.com/worldwideworstwork/p/C9lHlVIvrLf/?img_index=1', 
            ],
            [
                'name' => 'Pash Playground',
                'bio' => 'SITE LIVE, NOSTALGIA
                COLLECTION OUT NOW!',
                'image' => 'img/pash.jpg',
                'social' => 'https://www.instagram.com/pashyplayground/p/DAMNd_pxuVx/?img_index=1', 
            ],
            [
                'name' => 'Trikko',
                'bio' => 'OUTLINE TRACKSUIT
SUNDAY 7PM UK TIME
SIGN UP FOR PASSWORD
ONLY AT TRIKKO.ES',
                'image' => 'img/trikko.jpg',
                'social' => 'https://www.instagram.com/trikko/p/DBJU26rK3xu/?img_index=1', 
            ],
            [
                'name' => 'Ikonik',
                'bio' => '“Dazed by the stars”⭐️ Collection by IKONIK Dropping Nov 10 In Brown Pink Grey Purple Blue and Black',
                'image' => 'img/ikonik.jpg',
                'social' => 'https://www.instagram.com/ikonik.clo/p/CzAKoC4rYu6/?img_index=1',  
            ],
        ];

        // Passing data ke view dashboard
        return view('client.index', [
            'clients' => $clients,
        ]);
    }
}
