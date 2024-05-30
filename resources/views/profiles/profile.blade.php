@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">PROFIL</div>
                <div class="card-body text-center">
                    @if(Auth::user()->profile && Auth::user()->profile->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile->profile_image) }}" alt="Profile Image" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif

                    <h4><i class="fas fa-user"></i> {{ Auth::user()->name }}</h4>
                    <p><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</p>

                    @if(Auth::user()->profile)
                        <p><i class="fas fa-map-marker-alt"></i> {{ Auth::user()->profile->address ?? 'Not available' }}</p>
                        <p><i class="fas fa-birthday-cake"></i> {{ Auth::user()->profile->date_of_birth ?? 'Not available' }}</p>
                        <p><i class="fas fa-info-circle"></i> {{ Auth::user()->profile->bio ?? 'Not available' }}</p>
                        <p><i class="fas fa-phone"></i> {{ Auth::user()->profile->phone ?? 'Not available' }}</p>
                        <a href="{{ route('profiles.edit', Auth::user()->profile->id) }}" class="btn btn-primary mt-3">Edit Profile</a>
                    @else
                        <p>No profile available.</p>
                        <a href="{{ route('profiles.edit') }}" class="btn btn-primary">Create Profile</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
