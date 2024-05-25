@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Our App') }}</div>

                <div class="card-body">
                    <p>{{ __('Thank you for visiting our application!') }}</p>
                    <p>{{ __('Here, you can explore our features, products, or services.') }}</p>
                    <p>{{ __('Feel free to browse around and discover what we have to offer.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
