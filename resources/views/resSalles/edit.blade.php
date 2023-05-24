@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Ajouter une réservation de salle
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="">
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro de réservatiopn</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-3 col-xl-3 offset-xl-4 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numero de salle</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Date de réservation</label>
                        <input type="date" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Du</label>
                        <input type="date" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Au</label>
                        <input type="date" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Occurence</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix regulier journalier</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix spécial journalier</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Montant Global</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('') is-invalid @enderror" name="" value="{{ old('quantite') }}">
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Mode de payement</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="" value="{{ old('devise') }}">
                            <option value="">-------------------</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="date" class="label col-md-12 mb-2" style="margin-left: -15px">Statut de payement</label>
                    <div class="d-flex mt-2">
                        <div class="form-check form-check-inline" style="margin-left: 20px;">
                            <label class="form-check-label" for="inlineRadio1">Succès!</label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        </div>
                        <div class="form-check form-check-inline" style="margin-left: 100px;">
                            <label class="form-check-label" for="inlineRadio2">En attente...</label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        </div>
                    </div>
                    <span class="text-danger">{{ $errors->first('') }}</span>
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
