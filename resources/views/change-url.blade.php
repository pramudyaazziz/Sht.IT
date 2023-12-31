@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
<div class="p-3 row gap-4 flex-column align-items-center justify-content-center h-100">
    <h3 class="text-center">Update your {{config('app.name')}}-URL</h3>
    <div class="col-lg-5 col-md-7">
        <form class="bg-white p-3" action="{{route('my-url.update', $url->slug)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" name="id" value="{{$url->id}}">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$url->title}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    <div class="double-link d-flex align-items-center me-3">
                        <img class="img-fluid" src="{{asset('image/double-link.png')}}" alt="">
                    </div>
                    Enter your long URL here
                </label>
                <textarea class="form-control @error('original_url') is-invalid @enderror" rows="4" placeholder="Your long url" name="original_url">{{$url->original_url}}</textarea>
                @error('original_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    <div class="single-link d-flex align-items-center me-3">
                        <img class="img-fluid" src="{{asset('image/single-link.png')}}" alt="">
                    </div>
                    Customize your link</label>
                <div class="input-group">
                    <span class="input-group-text" >{{env('APP_DOMAIN')}}/</span>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" aria-describedby="basic-addon3 basic-addon4" placeholder="alias" name="slug" value="{{$url->slug}}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('my-url.show', $url->slug)}}" class="my-url fs-5">Cancel</a>
                <button type="submit" class="py-1 px-4">Change</button>
            </div>
        </form>
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
        h3 {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.8rem;
        }
    </style>
@endpush
