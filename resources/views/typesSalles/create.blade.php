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
            Ajouter un nouveau type de salle
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Titre</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}">
                        <span class="text-danger">{{ $errors->first('titre') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Code</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}">
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation minimale</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('min') is-invalid @enderror" name="min" value="{{ old('min') }}">
                        <span class="text-danger">{{ $errors->first('min ') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occupation maximale</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('max') is-invalid @enderror" name="max" value="{{ old('max') }}">
                        <span class="text-danger">{{ $errors->first('max') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Image</label>
                        <input type="file" style="border-radius: 0!important; border: none!important;" class="border border-2 form-control ps-0 form-control-line" name="" value="{{ old('') }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="date" class="label col-md-12 mb-2">Description</label>
                        <textarea class="border border-2" name="description" id="" cols="80" rows="10"></textarea>
                        <span class="text-danger">{{ $errors->first('') }}</span>
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
