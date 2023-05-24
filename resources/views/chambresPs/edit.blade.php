@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Prix Spécial
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post">
            @csrf
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="{{$chambresps->id}}">
            </div>
            <div class="row w-100">
                    
                <div class="col-md-6 col-xl-5 mb-4">
                    <label for="date" class="label col-md-12 mb-2">Titre</label>
                    <input type="text" class="border border-2 form-control ps-0 form-control-line @error('titre') is-invalid @enderror" name="titre" value="{{ $chambresps->titre }}">
                    <span class="text-danger">{{ $errors->first('titre') }}</span>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-6 col-xl-5  mb-4">
                    <label for="date" class="label col-md-12 mb-2">Type de chambre</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="types_chambre_id">
                            @foreach ($typeschambres as $typeschambre)

                                <option value="{{$typeschambre->id}}">{{$typeschambre->titre}}</option>

                            @endforeach
                        </select>
                    <span class="text-danger">{{ $errors->first('') }}</span>
                </div>
            </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Du</label>
                        <input type="date" class="border border-2 form-control ps-0 form-control-line @error('date1') is-invalid @enderror" name="date1" value="{{ $chambresps->date1 }}">
                        <span class="text-danger">{{ $errors->first('date1') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Au</label>
                        <input type="date" class="border border-2 form-control ps-0 form-control-line @error('date2') is-invalid @enderror" name="date2" value="{{ $chambresps->date2 }}">
                        <span class="text-danger">{{ $errors->first('date2') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Sieste</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixsieste') is-invalid @enderror" name="prixsieste" value="{{ $chambresps->sieste }}">
                        <span class="text-danger">{{ $errors->first('prixsieste') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5  offset-xl-2  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Nuitée</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixnuitee') is-invalid @enderror" name="prixnuitee" value="{{ $chambresps->nuitee }}">
                        <span class="text-danger">{{ $errors->first('prixnuitee') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Heure</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixheure') is-invalid @enderror" name="prixheure" value="{{ $chambresps->heure }}">
                        <span class="text-danger">{{ $errors->first('prixheure') }}</span>
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