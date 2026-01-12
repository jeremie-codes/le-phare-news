@extends('layouts.app')

@section('title', 'CONTACT')

@section('content')
    <!-- Contact Start -->
    <div class="pt-3 mt-5 container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-0 section-title">
                        <h4 class="m-0 text-uppercase font-weight-bold">N'hésitez pas à nous contacter pour toute vos questions.</h4>
                    </div>
                    <div class="p-4 mb-3 bg-white border border-top-0">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Informations de contact</h6>
							<div class="mb-3">
                                <div class="mb-2 d-flex align-items-center">
                                    <i class="mr-2 fa fa-map-marker-alt text-primary"></i>
                                    <h6 class="mb-0 font-weight-bold">Notre bureau</h6>
                                </div>
                                <p class="m-0">{{ $configs[0]->address ?? '-- Pas d\'adresse physique definie --' }}</p>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2 d-flex align-items-center">
                                    <i class="mr-2 fa fa-envelope-open text-primary"></i>
                                    <h6 class="mb-0 font-weight-bold">Écrivez-nous</h6>
                                </div>
                                <p class="m-0">{{ $configs[0]->email ?? '-- Pas d\'adresse mail definie --' }}</p>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2 d-flex align-items-center">
                                    <i class="mr-2 fa fa-phone-alt text-primary"></i>
                                    <h6 class="mb-0 font-weight-bold">Appelez-nous</h6>
                                </div>
                                <p class="m-0">{{ $configs[0]->phone ?? '-- Pas de numéro de téléphone definie --' }}</p>
                            </div>
                        </div>
                        <h6 class="mb-3 text-uppercase font-weight-bold">Contactez-nous</h6>
                        <form action="{{ route('messages.store') }}" method="POST">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="guest_name" class="p-4 form-control" placeholder="Votre Nom" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="guest_email" class="p-4 form-control" placeholder="Votre Email" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="p-4 form-control" placeholder="Sujet" required="required"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="4" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="px-4 btn btn-primary font-weight-semi-bold" style="height: 50px;"
                                    type="submit">Envoyer Le Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="mb-0 section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Suivez-nous sur</h4>
                        </div>
                        <div class="p-3 bg-white border border-top-0">
                            <a href="{{ $configs[0]->facebook ?? '#!' }}" class="mb-3 text-white d-block w-100 text-decoration-none" style="background: #39569E;">
                                <i class="py-4 mr-3 text-center fab fa-facebook-f" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Facebook</span>
                            </a>
                            <a href="{{ $configs[0]->twitter ?? '#!' }}" class="mb-3 text-white d-block w-100 text-decoration-none" style="background: #52AAF4;">
                                <i class="py-4 mr-3 text-center fab fa-twitter" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Twitter (X)</span>
                            </a>
                            <a href="{{ $configs[0]->linkedin ?? '#!' }}" class="mb-3 text-white d-block w-100 text-decoration-none" style="background: #0185AE;">
                                <i class="py-4 mr-3 text-center fab fa-linkedin-in" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Linkedin</span>
                            </a>
                            <a href="{{ $configs[0]->instagram ?? '#!' }}" class="mb-3 text-white d-block w-100 text-decoration-none" style="background: #C8359D;">
                                <i class="py-4 mr-3 text-center fab fa-instagram" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Instagram</span>
                            </a>
                            <a href="{{ $configs[0]->youtube ?? '#!' }}" class="mb-3 text-white d-block w-100 text-decoration-none" style="background: #DC472E;">
                                <i class="py-4 mr-3 text-center fab fa-youtube" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">Youtube</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="mb-0 section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <form action="{{ route('newsletter.subscribe') }}" class="p-3 text-center bg-white border border-top-0">
                            <p>Inscrivez-vous à notre newsletter, et recevez les dernières nouvelles </p>
                            <div class="mb-2 input-group" style="width: 100%;">
                                <input type="text" name="email" class="form-control form-control-lg" placeholder="Votre Email">
                                <div class="input-group-append">
                                    <button class="px-3 btn btn-primary font-weight-bold">S'inscrire</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </form>
                    </div>
                    <!-- Newsletter End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
