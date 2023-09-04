@extends('layouts.index')
@section('title') {{ $title }} @endsection
@section('content')
<div class="h-100 d-flex flex-column">
    <h3 class="text-center">Your stats {{config('app.name')}}-URL</h3>
    <div class="text-end">
        <a href="{{route('my.url')}}" class="btn btn-secondary">Go back</a>
    </div>
    <div class="flex-fill my-4">
        <div class="row p-3 py-0">
            <div class="col-md-6">
                <div class="info-link">
                    <h6 class="title-url m-0 mb-1 d-flex align-items-center gap-3">
                        Facebook
                        <span class="badge bg-primary-tag">New</span>
                    </h6>
                    <div>
                        <a href="https://m.facebook.com/pramudya.azziz" target="_blank" class="original-url m-0 mb-1">
                            https://m.facebook.com/pramudya.azziz
                        </a>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="https://shtit.pramarda.my.id/fb" target="_blank" class="shorten-url m-0 mb-1">
                            shtit.pramarda.my.id/fb
                        </a>
                        <a href="{{route('change.url')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" style="color: var(--secondary); width: 20px; height: 20px;" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0L5 16ZM15 6l3 3m-5 11h8"/></svg>
                        </a>
                    </div>
                    <p class="created-url m-0 mb-1">
                        3 hours ago
                    </p>
                </div>
                <div class="my-4">
                    <h3>Total Clicks: 194</h3>
                </div>
                <form class="action">
                    <button class="btn text-white" style="background-color: var(--primary);">Delete URL</button>
                </form>
            </div>
            <div class="col-md-6 p-2 pe-0 mt-3 mt-md-0">
                <div class="row m-0 p-0 justify-content-end h-100">
                    <div class="col-md-8 card-url-stats h-100 p-3">
                        <h4 class="text-center text-muted">Stats</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between py-2">
                                <p class="m-0 text-secondary fw-medium">Today</p>
                                <p class="m-0 fw-bold">75</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-2">
                                <p class="m-0 text-secondary fw-medium">28 Aug 2023</p>
                                <p class="m-0 fw-bold">103</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-2">
                                <p class="m-0 text-secondary fw-medium">27 Aug 2023</p>
                                <p class="m-0 fw-bold">75</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-2">
                                <p class="m-0 text-secondary fw-medium">26 Aug 2023</p>
                                <p class="m-0 fw-bold">75</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
        a {
            text-decoration: none;
        }
        .bg-primary-tag {
            background-color: var(--primary)
        }
        .card-url-stats {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 4px rgba(0, 0, 0, .25);
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
