@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
    <div class="h-100 row align-items-center justify-content-lg-start justify-content-center">
        <div class="col-lg-5 col-md-7">
            <form class="bg-white p-3">
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <div class="double-link d-flex align-items-center me-3">
                            <img class="img-fluid" src="{{asset('image/double-link.png')}}" alt="">
                        </div>
                        Enter your long URL here
                    </label>
                    <textarea class="form-control" rows="4" placeholder="Your long url"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <div class="single-link d-flex align-items-center me-3">
                            <img class="img-fluid" src="{{asset('image/single-link.png')}}" alt="">
                        </div>
                        Customize your link</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">shtit.pramarda.my.id/</span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" placeholder="alias" disabled>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label" for="flexCheckDefault">
                        Make random alias
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('my.url')}}" class="my-url fs-5">My URL</a>
                    {{-- <a href="{{route('login')}}" class="my-url fs-5">Login</a> --}}
                    <button type="submit" class="py-1 px-4">Sht IT</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 d-none d-lg-block ps-5 text-end">
                <img src="{{asset('image/short-link-illustration.svg')}}" class="img-fluid" alt="">
        </div>
    </div>
@endsection
@push('css')
    <style>
        .double-link {
            width: 40px;
            height: 40px;
        }
        .single-link {
            width: 40px;
            height: 28px;
        }
        .form-check label {
            font-weight: 400;
            font-size: .9rem;
        }
        .my-url {
            font-weight: 400;
            font-size: 1.2rem;
            color: rgb(158, 158, 158);
        }
        .my-url:hover {
            color: rgb(129, 129, 129);
        }
        button {
            background-color: var(--primary);
            border: none;
            color: white;
            border-radius: .4rem;
            font-weight: 500;
            font-size: 1.5rem
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
