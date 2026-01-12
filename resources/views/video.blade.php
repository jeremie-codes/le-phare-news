@extends('layouts.app')

@section('title', 'VIDEOS')

@section('content')
   <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Vidéos</h4>
                            </div>
                        </div>

                        @forelse($news as $new)
                        <div class="col-lg-4">
                            <div class="mb-3 position-relative">
                                <img class="img-fluid w-100" src="{{ asset($new->image ?: 'assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                                <div class="p-4 bg-white border border-top-0">
                                    <div class="mb-2">
                                        <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                            href="#">{{ $new->category->name }}</a>
                                        <a class="text-body" href="#"><small>{{ $new->created_at->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="mb-3 d-block text-secondary text-uppercase font-weight-bold" href="#">{{ $new->title }}</a>
                                    {!! count($new->content) > 200 ? substr($new->content, 0, 200)."..." : $new->content !!}
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class=" position-relative">
                                <p>Aucune vidéo disponible</p>
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
