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
            Créer un Hotel
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Nom</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}">
                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Email</label>
                        <input type="email" class="border border-2 form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Logo</label>
                        <input type="file" class="border border-0 rounded-0 form-control ps-0 form-control-line" name="image">
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Adresse</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}">
                        <span class="text-danger">{{ $errors->first('adresse') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Téléphone 1</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('tel1') is-invalid @enderror" name="tel1" value="{{ old('tel1') }}">
                        <span class="text-danger">{{ $errors->first('tel1') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Téléphone 2</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('tel2') is-invalid @enderror" name="tel2" value="{{ old('tel2') }}">
                        <span class="text-danger">{{ $errors->first('tel2') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Pays</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line stateSelect2" name="pays">
                            @foreach ($pays as $pays)

                            <option value="{{$pays->nom_fr_fr}}">{{$pays->nom_fr_fr}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Ville</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}">
                        <span class="text-danger">{{ $errors->first('ville') }}</span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 col-xl-5">
                        <label for="date" class="label col-md-12 mb-2">Monnaie</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="devise">
                            <option value="F CFA">F CFA</option>
                            <option value="$ USD">$ USD (US Dollar)</option>
                            <option value="€">€ EUR (EURO)</option>
                            <option value="$ CAD">$ CAD (Dollar Canadien)</option>
                            <option value="£">£ GBP (Livre Sterling)</option>
                        </select>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="offset-xl-7 col-xl-5 mt-5">
                        <div class="btn-actions">
                            <button type="submit" class="btn-submit mb-2">Enregistrer</button>
                            <button type="button" class="btn-cancel">Reinitialiser</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
