@extends('layouts.template')

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
    <footer>
        <a href="#" class="btn">See More</a>
    </footer>
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
    <footer>
        <a href="#" class="btn">See More</a>
    </footer>
</div>
@endsection
