@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Créer une nouvelle chambre
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="">
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro de chambre</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Type de chambre</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro d'étage</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Etat de la chambre</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
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
