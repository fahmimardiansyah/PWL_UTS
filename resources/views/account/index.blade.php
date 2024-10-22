@extends('eaqly.template')

@section('content')
<div class="top">
</div>
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('img/ian.jpg') }}" alt="Profile Picture" class="profile-img">
        <h1 class="profile-name">{{ $user->name }}</h1>
    </div>
    <div class="profile-details">
        
        <div class="contact-info">
            <h3>Contact Information</h3>
            <ul>
                <li><strong>Name:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Phone:</strong> {{ $user->phone }}</li>
                <li><strong>Address:</strong> {{ $user->address }}</li>
            </ul>
        </div>
        <div class="profile-actions">
            <a href="#" class="btn">Edit Profile</a>
            <a href="/logout" class="btn btn-secondary">Log Out</a>
        </div>
    </div>
</div>
@endsection
