@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')

<style>

textarea:focus{
    border: 1px solid  rgba(50, 162, 50, 0.8)!important;
    box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;

}

</style>


                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Modifier le type de chambre
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{$typeschambres->id}}">
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Titre</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('titre') is-invalid @enderror" name="titre" value="{{ $typeschambres->titre }}">
                        <span class="text-danger">{{ $errors->first('titre') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Code</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('code') is-invalid @enderror" name="code" value="{{ $typeschambres->code }}">
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation minimale</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('min') is-invalid @enderror" name="min" value="{{ $typeschambres->min }}">
                        <span class="text-danger">{{ $errors->first('min') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation maximale</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('max') is-invalid @enderror" name="max" value="{{ $typeschambres->max }}">
                        <span class="text-danger">{{ $errors->first('max') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation enfants</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('enfants') is-invalid @enderror" name="enfants" value="{{ $typeschambres->enfants }}">
                        <span class="text-danger">{{ $errors->first('enfants') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation adultes</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('adultes') is-invalid @enderror" name="adultes" value="{{ $typeschambres->adultes }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix personne supplémentaire</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixpersup') is-invalid @enderror" name="prixpersup" value="{{ $typeschambres->prixpersup }}">
                        <span class="text-danger">{{ $errors->first('prixpersup') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix lit supplémentaire</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixlitsup') is-invalid @enderror" name="prixlitsup" value="{{ $typeschambres->prixlitsup }}">
                        <span class="text-danger">{{ $errors->first('prixlitsup') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Image</label>
                        <input type="file" class="border border-0 rounded-0 form-control ps-0 form-control-line" name="image" value="{{ $typeschambres->image }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="date" class="label col-md-12 mb-2">Description</label>
                        <textarea class="border border-2" name="description" id="" cols="80" rows="10"></textarea>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="offset-xl-7 col-xl-5 mt-5">
                        <div class="btn-actions">
                            <button type="submit" class="btn-submit">Enregistrer</button>
                            <button type="button" class="btn-cancel">Reinitialiser</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
