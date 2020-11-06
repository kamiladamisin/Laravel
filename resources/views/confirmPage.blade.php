@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your account is confirm.') }}</div>

                    <div class="card-body">
                        <div>
                            <a href='home'>Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
