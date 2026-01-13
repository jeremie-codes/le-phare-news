@extends('layouts.app')

@section('title', 'ACCUEIL')

@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="px-0 col-lg-7">
                <div class="owl-carousel main-carousel position-relative">
                    @if(count($banners) > 0)
                        @foreach($banners as $banner)
                        <div class="overflow-hidden position-relative" style="height: 500px;">
                            <img class="img-fluid h-100" src="{{ asset( $banner->cover_image ? 'storage/' . $banner->cover_image: 'assets/img/bannerNews-1.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <a href="{{ route('news.show', $banner->id) }}" class="m-0 text-white h2 text-uppercase font-weight-bold" href="#">{{ $banner->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    @else

                    <div class="overflow-hidden position-relative" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset('assets/img/bannerNews-1.jpg') }}" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="m-0 text-white h2 text-uppercase font-weight-bold" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                        </div>
                    </div>
                    <div class="overflow-hidden position-relative" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="m-0 text-white h2 text-uppercase font-weight-bold" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                        </div>
                    </div>
                    <div class="overflow-hidden position-relative" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset('assets/img/bannerNews.jpg') }}" style="object-fit: cover;">
                        <div class="overlay">
                            <a class="m-0 text-white h2 text-uppercase font-weight-bold" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
            <div class="px-0 col-lg-5">
                <div class="mx-0 row">
                    <div class="px-0 col-md-6">
                        <div class="overflow-hidden position-relative" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                        href="#">Actualité</a>
                                    <a class="text-white" href="#"><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="m-0 text-white h6 text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>
                    </div>
                    <div class="px-0 col-md-6">
                        <div class="overflow-hidden position-relative" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                        href="#">Politique</a>
                                    <a class="text-white" href="#"><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="m-0 text-white h6 text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>
                    </div>
                    <div class="px-0 col-md-6">
                        <div class="overflow-hidden position-relative" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                        href="#">Sport</a>
                                    <a class="text-white" href="#"><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="m-0 text-white h6 text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>
                    </div>
                    <div class="px-0 col-md-6">
                        <div class="overflow-hidden position-relative" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                        href="#">Musique</a>
                                    <a class="text-white" href="#"><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="m-0 text-white h6 text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Start -->
    <div class="py-3 mb-3 container-fluid bg-dark">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="py-2 text-center bg-primary text-dark font-weight-medium" style="width: 170px;">Breaking News</div>
                        <div class="ml-3 owl-carousel tranding-carousel position-relative d-inline-flex align-items-center"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @if (count($breakingNews) > 0)
                                @foreach ($breakingNews as $breakingNew)
                                    <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="#">{{ $breakingNew->title }}</a></div>
                                @endforeach
                            @else
                                <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                                <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="#">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Featured News Slider Start -->
    <div class="pt-5 mb-3 container-fluid">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Actualités en vedette</h4>
                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('news.index') }}">Voir tout</a>
            </div>
            <div class="owl-carousel news-carousel carousel-item-{{ count($lastvedettes) > 0 ? 4 : 1 }} position-relative">
                @forelse($lastvedettes as $lastvedette)
                    <div class="overflow-hidden position-relative" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{ asset('assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                    href="#">{{ $lastvedette->category->name }}</a>
                                <a class="text-white" href="#"><small>{{ $lastvedette->created_at->format('d M Y') }}</small></a>
                            </div>
                            <a class="m-0 text-white h6 text-uppercase font-weight-semi-bold" href="#">{{ substr($lastvedette->title, 0, 40) }}</a>
                        </div>
                    </div>
                @empty
                    <div class=" position-relative">
                        <p>Aucune video disponible</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Actualités</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('videos.index') }}">Voir tout</a>
                            </div>
                        </div>

                        @forelse($lastnews as $lastnew)
                        <div class="col-lg-6">
                            <div class="mb-3 position-relative">
                                <img class="img-fluid w-100" src="{{ asset($lastnew->image ?: 'assets/img/bannerNews-2.jpg') }}" style="object-fit: cover;">
                                <div class="p-4 bg-white border border-top-0">
                                    <div class="mb-2">
                                        <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                            href="#">{{ $lastnew->category->name }}</a>
                                        <a class="text-body" href="#"><small>{{ $lastnew->created_at->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="mb-3 d-block text-secondary text-uppercase font-weight-bold" href="#">{{ $lastnew->title }}</a>
                                    {!! strlen($lastnew->content) > 200 ? substr($lastnew->content, 0, 200)."..." : $lastnew->content !!}
                                </div>
                                <div class="p-4 bg-white border d-flex justify-content-between border-top-0">
                                    <div class="d-flex align-items-center">
                                        <img class="mr-2 rounded-circle" src="{{ asset('assets/img/logo.jpeg') }}" width="25" height="25" alt="">
                                        <small>Le Phare News</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="mr-2 far fa-eye"></i></small>
                                        {{-- <small class="ml-3"><i class="mr-2 far fa-comment"></i>123</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class=" position-relative">
                                <p>Aucune actualité disponible</p>
                            </div>
                        @endforelse

                        <div class="mb-3 col-lg-12">
                            <a href="#"><img class="img-fluid w-100" src="{{ asset('assets/img/ads-72890.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="mb-0 section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Publicité</h4>
                        </div>
                        <div class="owl-carousel main-carousel position-relative">
                            @forelse ($ads as $ad)
                            <div class="overflow-hidden position-relative" style="height: 500px;">
                                <img class="img-fluid h-100" src="{{ asset($ad->image) }}" style="object-fit: cover;">
                                <div class="overlay">
                                    <a class="m-0 text-white text-uppercase font-weight-semi-bold" href="#">{{ $ad->contenu }}</a>
                                </div>
                            </div>
                            @empty
                            <div class="p-3 bg-white border border-top-0">
                                <p>Aucune Publicité disponible</p>
                                <p>Pour toute publicité, contactez-nous</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="mb-0 section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Catégories de nos contenus</h4>
                        </div>

                        @forelse($categories as $category)
                        <div class="p-3 bg-white border border-top-0">
                            <div class="mb-3 bg-white d-flex align-items-center" style="max-height: 110px;">
                                <img class="img-fluid" src="{{ asset($category->image) }}" alt="">
                                <div class="px-3 border w-100 h-100 d-flex flex-column justify-content-center border-left-0">
                                    <a class="m-0 h6 text-secondary text-uppercase font-weight-bold" href="#">{{ $category->name }}</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 bg-white border border-top-0">
                            <p>Aucune catégorie disponible</p>
                        </div>
                        @endforelse

                        @if ($categories->hasPages())
                        <div class="p-1 bg-white border row border-top-0">
                            <div class="col-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">

                                        {{-- Previous Page --}}
                                        <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link"
                                            href="{{ $categories->previousPageUrl() ?? '#' }}"
                                            aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        {{-- Pagination Elements --}}
                                        @foreach ($categories->links()->elements[0] ?? [] as $page => $url)
                                            <li class="page-item {{ $categories->currentPage() === $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        {{-- Next Page --}}
                                        <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link"
                                            href="{{ $categories->nextPageUrl() ?? '#' }}"
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
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="mb-0 section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <form action="{{ route('newsletter.subscribe') }}" class="p-3 text-center bg-white border border-top-0">
                            <p>Inscrivez-vous à notre newsletter, et recevez les dernières nouvelles </p>
                            <div class="mb-2 input-group" style="width: 100%;">
                                <input type="text" class="py-4 form-control form-control-lg" placeholder="Votre Email" style="font-size: 14px;">
                                <div class="input-group-append">
                                    <button class="px-3 btn btn-primary font-weight-bold">S'inscrire</button>
                                </div>
                            </div>
                            {{-- <small>Lorem ipsum dolor sit amet elit</small> --}}
                        </form>
                    </div>
                    <!-- Newsletter End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection

