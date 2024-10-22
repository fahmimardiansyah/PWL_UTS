@extends('eaqly.template')

@section('content')
<div class="banner">
    <div class="text">
        <h1>Our Client</h1>
        <p>Around The World</p>
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
    <div class="button-container">
        <a href="#" class="btn">See More</a>
    </div>
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
    <div class="button-container">
        <a href="#" class="btn">See More</a>
    </div>
</div>

<hr>

<div class="container about-me">
    <h2>About Me</h2>
    <div class="about-me-content">
        <div class="about-me-image">
            <img src="{{ asset('img/ian.jpg') }}" alt="Your Photo">
        </div>
        <div class="about-me-text">
            <p>
                Hi, I'm Fahmi Mardiansyah, and I am passionate about creating unique and high-quality design. 
                With years of experience in my business eaqly.gallery, I am dedicated to bringing fresh and innovative ideas 
                to the market. When I'm not studying, I enjoy my passion at designing. I believe in constant 
                learning and improving, and I am excited to continue growing in this journey.
            </p>
        </div>
    </div>
</div>
</div>
@endsection
