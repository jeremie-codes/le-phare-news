@extends('layouts.app')

@section('title', 'DETAILS')

@section('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $news->title }}">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 150) }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:card" content="summary_large_image">
    <meta property="og:image" content="{{ asset('storage/' . $news->cover_image) }}">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="800">
    <meta property="og:image:type" content="image/*">
@endsection


@section('content')

 <!-- Breaking News Start -->
    <div class="pt-3 mt-5 mb-3 container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="mb-0 section-title border-right-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Détails</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- News Detail Start -->
                    <div class="mb-3 position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $news->cover_image) }}" alt="" style="object-fit: cover;">
                        <div class="p-4 bg-white border border-top-0">
                            <div class="mb-3">
                                <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                    href="#">{{ $news->category->name }}</a>
                                <a class="text-body" href="#"><small>{{ $news->created_at->format('d M, Y') }}</small></a>
                            </div>

                            <h3 class="mb-3 text-secondary text-uppercase font-weight-bold">{{$news->title }}</h3>
                            <p class="text-justify">
                                {!! $news->content !!}
                            </p>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
