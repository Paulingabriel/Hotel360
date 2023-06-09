@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Profil Utilisateur
        </h4>
    </div>

    <div class="form-section mb-3">
        
        <form action="/auth/profil/{{$auth->id}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{$auth->id}}">
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-success">
                                    <div class="card-title text-center">
                                        Avatar
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="align-self-center halfway-fab text-center">
                                        @if(Auth::user()->image)
                                        <a class="profile-image">
                                            <img src="{{ asset('uploads/images/' . Auth::user()->image) }}" class="rounded-circle img-border gradient-summer width-100 height-100" alt="">
                                        </a>
                                        @else
                                        <i class="icon-user" style="font-size: 64px!important;"></i>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium-2 text-uppercase">{{ Auth::user()->name }}</span>
                                        <p class="grey font-small-2">{{ Auth::user()->roles->first()->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-12">
                        <div class="card" style="padding: 0 24px 24px 24px">
                            <div class="row">
                                <div class="section-title">
                                    <h4 class="border-bottom border-2"><i class="icon-user fs-1"></i>
                                        Profil
                                    </h4>
                                    {{-- @dump($errors) --}}
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="date" class="label col-md-12 mb-2">Nom</label>
                                    <input type="text" class="border border-2 form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name" value="{{$auth->name}}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="date" class="label col-md-12 mb-2">Email</label>
                                    <input type="email" class="border border-2 form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" value="{{$auth->email}}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="label col-md-12 mb-2">Photo</label>
                                    <input type="file" style="border-radius: 0!important; border: none!important;" class="border border-2 form-control ps-0 form-control-line" name="image" value="{{$auth->image}}">
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="offset-md-3 col-md-9 px-0 float-right mt-5">
                                    <div class="btn-actions">
                                        <button type="submit" class="btn-submit mb-2">Enregistrer</button>
                                        <a href="{{route("auth/edit")}}">
                                            <button type="button" class="btn-cancel">Reinitialiser</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
