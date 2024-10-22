@extends('eaqly.template')

@section('content')
<div class="slider-container">
    <div class="catalog-title">
        <h1>Welcome to Our Collection</h1>
    </div>
    <div class="slider">
        <div class="slide"><img src="{{ asset('img/pixel font dump.jpg') }}" alt="slide 1"></div>
        <div class="slide"><img src="{{ asset('img/y2k asset dump.png') }}" alt="slide 2"></div>
        <div class="slide"><img src="{{ asset('img/Super Pack Asset.png') }}" alt="slide 3"></div>
    </div>

    <button class="arrow left" onclick="prevSlide()">&#10094;</button>
    <button class="arrow right" onclick="nextSlide()">&#10095;</button>

    <div class="dot-container">
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>
</div>

<div class="container">
    <h2>Assets</h2>
    <div class="assets">
        @foreach ($assets as $asset)
            <div class="asset-card">
                <img src="{{ $asset['image'] }}" alt="{{ $asset['name'] }}">
            </div>
        @endforeach
    </div>
</div>
@endsection
