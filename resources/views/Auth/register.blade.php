@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
<div class="p-3 row gap-4 flex-column align-items-center justify-content-center h-100">
    <h3 class="text-center">Register</h3>
    <form class="col-lg-4 col-md-6 bg-white p-3" action="{{ route('register.process') }}" method="POST">
        @csrf
        @error('register')
            <p class="text-center text-danger m-0 p-0 pb-3 py-2">{{ $message }}</p>
        @enderror
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password" value="{{old('password')}}">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  placeholder="Confirm password" name="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="py-1 px-5 mx-auto d-block">Register</button>
    </form>
    <p class="text-center text-muted">Already have account? <a href="{{route('login')}}">login</a></p>
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
