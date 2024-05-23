@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('LOGIN') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>
                    <p>{{ __('Name: ') . Auth::user()->name }}</p>
                    <p>{{ __('Email: ') . Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
