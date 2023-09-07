{{-- Import the carbon namespace to calculate the time difference between the time it was created and the current time --}}
@php
    use Carbon\Carbon;
@endphp
@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
    <div class="h-100 d-flex flex-column">
        <h3 class="text-center">Your recent {{config('app.name')}}-URLs</h3>
        <div class="text-end">
            <a href="{{route('home')}}" class="btn btn-secondary">Go Home</a>
        </div>
        <div class="flex-fill my-5">
            @foreach ($urls as $url)
                <div class="shorten-url-info row p-3 pt-0">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-1  d-none d-md-block">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%" viewBox="0 0 24 24"><path fill="currentColor" d="M16.36 14c.08-.66.14-1.32.14-2c0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2m-5.15 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 0 1-4.33 3.56M14.34 14H9.66c-.1-.66-.16-1.32-.16-2c0-.68.06-1.35.16-2h4.68c.09.65.16 1.32.16 2c0 .68-.07 1.34-.16 2M12 19.96c-.83-1.2-1.5-2.53-1.91-3.96h3.82c-.41 1.43-1.08 2.76-1.91 3.96M8 8H5.08A7.923 7.923 0 0 1 9.4 4.44C8.8 5.55 8.35 6.75 8 8m-2.92 8H8c.35 1.25.8 2.45 1.4 3.56A8.008 8.008 0 0 1 5.08 16m-.82-2C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2c0 .68.06 1.34.14 2M12 4.03c.83 1.2 1.5 2.54 1.91 3.97h-3.82c.41-1.43 1.08-2.77 1.91-3.97M18.92 8h-2.95a15.65 15.65 0 0 0-1.38-3.56c1.84.63 3.37 1.9 4.33 3.56M12 2C6.47 2 2 6.5 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2Z"/></svg>
                            </div>
                            <div class="col px-md-5 px-0">
                                <h6 class="title-url m-0 mb-1 d-flex align-items-center gap-3">
                                    {{$url->title}}
                                    @if ($url->created_at->diffInMinutes(now()) < 30)
                                        <span class="badge bg-primary-tag">New</span>
                                    @endif
                                </h6>
                                <div>
                                    <a href="{{$url->original_url}}" target="_blank" class="original-url m-0 mb-1">
                                        {{$url->original_url}}
                                    </a>
                                </div>
                                <div>
                                    <a href="https://{{env('APP_DOMAIN')}}/{{$url->slug}}" target="_blank" class="shorten-url m-0 mb-1">
                                        {{env('APP_DOMAIN')}}/{{$url->slug}}
                                    </a>
                                </div>
                                <p class="created-url m-0 mb-1">
                                    {{$url->created}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-md-end justify-content-start gap-4 p-0">
                        <a href="{{route('my-url.show', $url->slug)}}" class="button-short-url">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" viewBox="0 0 16 16"><path fill="currentColor" d="M2 14h14v2H0V0h2zm2.5-1a1.5 1.5 0 1 1 .131-2.994l1.612-2.687a1.5 1.5 0 1 1 2.514 0l1.612 2.687a1.42 1.42 0 0 1 .23-.002l2.662-4.658a1.5 1.5 0 1 1 1.14.651l-2.662 4.658a1.5 1.5 0 1 1-2.496.026L7.631 7.994a1.42 1.42 0 0 1-.262 0l-1.612 2.687A1.5 1.5 0 0 1 4.5 13z"/></svg>
                            Stats
                        </a>
                        <button class="button-short-url copy-text" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" viewBox="0 0 24 24"><path fill="currentColor" d="M4 2h11v2H6v13H4V2zm4 4h12v16H8V6zm2 2v12h8V8h-8z"/></svg>
                            Copy
                        </button>
                    </div>
                    <hr class="my-2">
                </div>
            @endforeach
            @if (count($urls) < 1)
                <h6 class="text-center">You don't have a shortened URL here :(</h6>
            @endif
        </div>
    </div>
@endsection

@push('css')
    <style>
        .button-short-url {
            padding: .6rem 1.5rem;
            background-color: var(--secondary);
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: .4rem;
            color: white;
        }
        .button-short-url svg.icon {
            width: 1.3rem;
            height: 1.3rem;
        }
        .title-url {
            font-weight: 600;
        }
        .original-url {
            font-weight: 400;
            color: #A2A2A2;
        }
        .shorten-url {
            font-weight: 400;
            color: var(--primary)
        }
        .created-url {
            font-weight: 400;
            color: #B1B1B1;
            font-size: .8rem;
        }
        h3 {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.8rem;
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
        a {
            text-decoration: none;
        }
        .bg-primary-tag {
            background-color: var(--primary)
        }

        @media only screen and (max-width: 768px) {
            .button-short-url {
                padding: .3rem 1.3rem;
                font-size: .8rem;
            }
            .button-short-url svg.icon {
                width: 1.1rem;
                height: 1.1rem;
            }
        }
    </style>
@endpush
@push('js')
    <script>
        // Initialize tooltip bootstrap
        const copyTextButtons = document.getElementsByClassName('copy-text');

        Array.from(copyTextButtons).forEach(element => {
            const tooltip = new bootstrap.Tooltip(element, {
                trigger: 'click',
                title: 'Copied!',
                placement: 'bottom'
            });

            const shortenUrl = element.closest('.shorten-url-info').querySelector('.shorten-url');

            element.addEventListener('click', function () {
                const textArea = document.createElement('textarea'); // create textarea element
                textArea.value = shortenUrl.textContent.replace(/\s+/g, ""); // insert value to textarea
                document.body.appendChild(textArea); // append child textarea element
                textArea.select(); // select textarea element
                document.execCommand('copy'); // copy to clipboard user of text on selected element
                document.body.removeChild(textArea); // remove textarea element
            })
        });
    </script>
@endpush
