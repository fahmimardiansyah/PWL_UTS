@extends('eaqly.template')

@section('content')
<div class="slider-container">
    <div class="catalog-title">
        <h1>Welcome to Our Collection</h1>
    </div>
    <div class="slider">
        <div class="slide"><img src="{{ asset('img/slide1.jpg') }}" alt="slide 1"></div>
        <div class="slide"><img src="{{ asset('img/slide1.png') }}" alt="slide 2"></div>
        <div class="slide"><img src="{{ asset('img/slide2.png') }}" alt="slide 3"></div>
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
    <h2>Catalog</h2>
    <div class="catalog">
        @foreach ($catalogs as $catalog)
            <div class="card">  
                <img src="{{ $catalog['image'] }}" alt="{{ $catalog['name'] }}">
                <h3>{{ $catalog['name'] }}</h3>
                <p class="price">${{ $catalog['price'] }}</p>
                <a href="#" class="btn">Buy Now</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
