@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
    <div class="h-100 row align-items-center justify-content-lg-start justify-content-center">
        <div class="col-lg-5 col-md-7">
            @if ($user)
            <h3>Welcome back</h3>
                <div class="my-3 d-flex justify-content-between align-items-center">
                    <h5 class="text-muted">{{$user->name}}</h5>
                    <form action="{{route('logout')}}" method="POST" class="logout">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            @endif
            <form class="bg-white p-3 url-shortener" action="{{route('short.url')}}" method="POST">
                @csrf
                @error('url')
                    <p class="text-center text-danger m-0 p-0 pb-3 py-2">{{ $message }}</p>
                @enderror
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <div class="double-link d-flex align-items-center me-3">
                            <img class="img-fluid" src="{{asset('image/double-link.png')}}" alt="">
                        </div>
                        Enter your long URL here
                    </label>
                    <textarea class="form-control @error('original_url') is-invalid @enderror" rows="4" placeholder="Your long url" name="original_url">{{old('original_url')}}</textarea>
                    @error('original_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label d-flex align-items-center">
                        <div class="single-link d-flex align-items-center me-3">
                            <img class="img-fluid" src="{{asset('image/single-link.png')}}" alt="">
                        </div>
                        Customize your link
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">{{env('APP_DOMAIN')}}/</span>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="alias" name="slug" value="{{old('slug')}}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label" for="random_alias">
                        Make random alias
                    </label>
                    <input class="form-check-input" type="checkbox" value="true" name="random_alias" id="random_alias">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    @if ($user)
                        <a href="{{route('my-url.index')}}" class="my-url fs-5">My URL</a>
                    @else
                        <a href="{{route('login')}}" class="my-url fs-5">Login</a>
                    @endif
                    <button type="submit" class="py-1 px-4">Sht IT</button>
                </div>
            </form>
            @if ($result)
                <div class="result-url py-2 px-3 mt-3">
                    <p class="p-0 m-0">{{env('APP_DOMAIN')}}/{{$result}}</p>
                    <div class="copy-text"
                        data-bs-toggle="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" style="width: 1.4rem; height: 1.4rem;" viewBox="0 0 24 24"><path fill="currentColor" d="M4 2h11v2H6v13H4V2zm4 4h12v16H8V6zm2 2v12h8V8h-8z"/></svg>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-7 d-none d-lg-block ps-5 text-end">
                <img src="{{asset('image/short-link-illustration.svg')}}" class="img-fluid" alt="">
        </div>
    </div>
@endsection
@push('css')
    <style>
        .copy-text:hover {
            color: rgb(230, 230, 230);
            cursor: pointer;
        }
        .result-url {
            background-color: var(--primary);
            border-radius: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        h3 {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.8rem;
        }
        .btn-danger {
            background-color: rgb(229, 13, 13);
        }
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
        form.url-shortener {
            box-shadow: 0 4px 4px rgba(0, 0, 0, .25);
            border-radius: .5rem;
        }
    </style>
@endpush

@push('js')
    {{-- Handle if random alias checkbox clicked --}}
    <script>
        const randomAliasCheckbox = document.getElementById('random_alias');
        const slugInput = document.querySelector('input[name="slug"]');

        randomAliasCheckbox.addEventListener('change', function() {
            slugInput.disabled = this.checked;
            if (this.checked) {
                slugInput.value = '';
            }
        });
    </script>

    <script>
        // Initialize tooltip bootstrap
        const copyTextButton = document.getElementsByClassName('copy-text')[0];
        const tooltip = new bootstrap.Tooltip(copyTextButton, {
            trigger: 'click',
            title: 'Copied!',
            placement: 'bottom'
        });

        // Handle if copy button clicked
        copyTextButton.addEventListener('click', function () {
            const textToCopy = document.querySelector('.result-url p'); // get text want to copy
            const textArea = document.createElement('textarea'); // create textarea element
            textArea.value = textToCopy.textContent; // insert value to textarea
            document.body.appendChild(textArea); // append child textarea element
            textArea.select(); // select textarea element
            document.execCommand('copy'); // copy to clipboard user of text on selected element
            document.body.removeChild(textArea); // remove textarea element
        })
    </script>
@endpush
