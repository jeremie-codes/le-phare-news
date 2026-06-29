@extends('layouts.app')

@section('title', 'ACTUALITÉS')

@section('meta')
    <meta property="og:title" content="LePhare Media En Ligne">
    <meta property="og:description" content="{{ @yield('description', 'Le Phare votre média en ligne, page d\'accueil') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="og:card" content="summary_large_image">
    <meta property="og:image" content="{{ url('assets/img/logo.jpeg') }}">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:image:type" content="image/jpeg">
@endsection

@section('content')
   <!-- News With Sidebar Start -->
    <div class="mt-3 container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Actualités</h4>
                            </div>
                        </div>

                       @forelse($news as $new)
                            <div class="col-lg-4">
                                <div class="mb-3 position-relative">
                                    {{-- Correction Image --}}
                                    <img class="img-fluid w-100"
                                        src="{{ asset($new->cover_image ? 'storage/' . $new->cover_image : 'assets/img/bannerNews-2.jpg') }}"
                                        style="object-fit: cover; height: 250px;"> {{-- Ajout d'une hauteur fixe pour l'alignement --}}

                                    <div class="p-4 bg-white border border-top-0">
                                        <div class="mb-2">
                                            <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                                href="#">{{ $new->category->name ?? 'Général' }}</a>
                                            <a class="text-body" href="#"><small>{{ $new->created_at->format('d M, Y') }}</small></a>
                                        </div>

                                        {{-- Correction Double HREF --}}
                                        <a href="{{ route('news.show', $new->id) }}"
                                            class="mb-3 d-block text-secondary text-uppercase font-weight-bold">
                                            {{ $new->title }}
                                        </a>

                                        {{-- Correction Troncature --}}
                                        <p class="m-0">
                                            {!! Str::limit(strip_tags($new->content), 150) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class=" position-relative">
                                <p>Aucune actualité disponible</p>
                            </div>
                        @endforelse


                        <div class="mb-3 col-lg-12">
                            <a href="#"><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>

                    @if ($news->hasPages())
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">

                                    {{-- Previous Page --}}
                                    <li class="page-item {{ $news->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                        href="{{ $news->previousPageUrl() ?? '#' }}"
                                        aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    {{-- Pagination Elements --}}
                                    @foreach ($news->links()->elements[0] ?? [] as $page => $url)
                                        <li class="page-item {{ $news->currentPage() === $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page --}}
                                    <li class="page-item {{ $news->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link"
                                        href="{{ $news->nextPageUrl() ?? '#' }}"
                                        aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
