@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
    <div class="p-3 row gap-4 flex-column align-items-center justify-content-center h-100">
        <h3 class="text-center">Login</h3>
        <form class="col-lg-4 col-md-6 bg-white p-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control"  placeholder="Password">
            </div>
            <button type="submit" class="py-1 px-5 mx-auto d-block">Login</button>
        </form>
        <p class="text-muted text-center">Don't have an account? <a href="{{route('register')}}">register</a></p>
    </div>
@endsection

@push('css')
    <style>
        h3 {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.8rem
        }
        button {
            background-color: var(--primary);
            border: none;
            color: white;
            border-radius: .4rem;
            font-weight: 500;
            font-size: 1.2rem
        }
        button:hover {
            opacity: .8;
        }
        label {
            font-size: 1rem;
            font-weight: 500;
        }
        form {
            box-shadow: 0 4px 4px rgba(0, 0, 0, .25);
            border-radius: .5rem;
        }
    </style>
@endpush
