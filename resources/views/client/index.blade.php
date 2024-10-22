@extends('eaqly.template')

@section('content')
<div class="banner">
    <div class="text">
        <h1>Our Client</h1>
        <p>Around The World</p>
    </div>
</div>
<div class="container">
    <h2>Our Client</h2>
    <div class="catalog">
        @foreach ($clients as $client)
            <div class="card">
                <a href="{{ $client['social'] }}" target="_blank" style="text-decoration: none; color: inherit;">
                <img src="{{ $client['image'] }}" alt="{{ $client['name'] }}">
                <h3>{{ $client['name'] }}</h3>
                <p class="price">{{ $client['bio'] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
