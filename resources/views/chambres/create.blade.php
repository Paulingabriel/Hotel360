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
        <form action="" method="post">
                @csrf
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro de chambre</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('num') is-invalid @enderror" name="num" value="{{ old('num') }}">
                        <span class="text-danger">{{ $errors->first('num') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Type de chambre</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="types_chambre_id" value="{{ old('types_chambre_id') }}">
                            @foreach ($typeschambres as $typeschambre)

                                <option value="{{$typeschambre->id}}">{{$typeschambre->titre}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Etage</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="etage_id" value="{{ old('etage_id') }}">
                            @foreach ($etages as $etage)

                            <option value="{{$etage->id}}">Niveau-{{$etage->num}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label" style="transform: translateY(-5px)">Disponible</label>
                    <label class="ms-2 switch label">
                        <input type="checkbox" name="active">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="row w-100">
                    <div class="offset-xl-7 col-xl-5 mt-5">
                        <div class="btn-actions">
                            <button type="submit" class="btn-submit mb-2">Enregistrer</button>
                            <a href="{{route("chambres/ajouter")}}">
                                <button type="button" class="btn-cancel">Reinitialiser</button>
                            </a>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
