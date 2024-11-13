@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                hello, welcome
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('success_age'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endif

                @if (auth()->user()->level === 'admin')
                    <a href="{{ URL('/admin') }}" class="d-block"><button class="btn btn-primary">Go to Admin</button></a>
                    <a href="{{ URL('/users') }}" class="d-block"><button class="btn btn-secondary mt-1">Go to Users</button></a>
                @elseif(auth()->user()->level === 'user')
                    <p>nothing to do here</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection