@extends('layouts.app')

@section('title', 'VIDEOS')

@section('content')
   <div class="mt-3 container-fluid">
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
                                <div class="mb-4 bg-white border position-relative">

                                    <div class="overflow-hidden position-relative">
                                        <img class="img-fluid w-100"
                                             src="{{ asset($new->cover_image ? 'storage/' . $new->cover_image : 'assets/img/bannerNews-2.jpg') }}"
                                             style="object-fit: cover; height: 200px;">

                                        <a href="{{ $new->youtube_url ?? asset('storage/' . $new->file_path) }}"
                                           class="position-absolute btn-play d-flex align-items-center justify-content-center"
                                           style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,0,0,0.8); border-radius: 50%; color: white;"
                                           data-toggle="modal"
                                           data-target="#videoModal{{ $new->id }}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>

                                    <div class="p-4">
                                        <div class="mb-2">
                                            <a class="p-2 mr-2 badge badge-primary text-uppercase font-weight-semi-bold"
                                                href="#">{{ $new->category->name ?? 'Vidéo' }}</a>
                                            <a class="text-body" href="#"><small>{{ $new->created_at->format('d M Y') }}</small></a>
                                        </div>

                                        <a class="mb-3 d-block text-secondary text-uppercase font-weight-bold"
                                           href="#" data-toggle="modal" data-target="#videoModal{{ $new->id }}">
                                            {{ $new->title }}
                                        </a>

                                        <div class="text-body small">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($new->content), 100, '...') !!}
                                        </div>
                                    </div>

                                    <div class="p-3 border-top d-flex justify-content-between">
                                        <small><i class="mr-2 far fa-eye"></i>{{ $new->views_count }}</small>
                                        <small class="text-primary font-weight-bold text-uppercase">
                                            {{ $new->youtube_url ? 'YouTube' : 'Fichier' }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                           {{-- Ajout de data-backdrop="static" et data-keyboard="false" --}}
                            <div class="modal fade" id="videoModal{{ $new->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="border-0 modal-content bg-dark">
                                        <div class="border-0 modal-header">
                                            <h5 class="text-white modal-title">{{ $new->title }}</h5>
                                            {{-- La croix reste le seul moyen de fermer --}}
                                            <button type="button" class="text-white close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-0 modal-body">
                                            @if($new->youtube_url)
                                                {{-- Conversion lien YouTube en Embed --}}
                                                @php
                                                    $videoId = explode('?v=', $new->youtube_url)[1] ?? explode('be/', $new->youtube_url)[1] ?? null;
                                                @endphp
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                                                </div>
                                            @elseif($new->file_path)
                                                <video width="100%" controls>
                                                    <source src="{{ asset('storage/' . $new->file_path) }}" type="video/mp4">
                                                    Votre navigateur ne supporte pas la lecture de vidéo.
                                                </video>
                                            @else
                                                <p class="p-4 text-white">Source vidéo indisponible.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="text-center col-12">
                                <p>Aucune vidéo disponible</p>
                            </div>
                        @endforelse

                        <div class="py-4 col-12">
                            {{ $news->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // On sélectionne tous les modals dont l'ID commence par "videoModal"
        const videoModals = document.querySelectorAll('[id^="videoModal"]');

        videoModals.forEach(modal => {
            // Événement Bootstrap déclenché quand le modal a fini de se fermer
            modal.addEventListener('hidden.bs.modal', function() {

                // 1. Gestion des iFrames (YouTube)
                const iframe = modal.querySelector('iframe');
                if (iframe) {
                    const iframeSrc = iframe.src;
                    iframe.src = ''; // On vide la source
                    iframe.src = iframeSrc; // On la remet pour qu'elle soit prête au prochain clic
                }

                // 2. Gestion des vidéos locales (<video>)
                const video = modal.querySelector('video');
                if (video) {
                    video.pause();
                    video.currentTime = 0; // Remet la vidéo au début
                }
            });
        });
    });
    </script>
@endsection
