@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Modifier la Salle
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post">
            @csrf
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{$salles->id}}">
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro de salle</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('num') is-invalid @enderror" name="num" value="{{$salles->num}}">
                        <span class="text-danger">{{ $errors->first('num') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Nom de la salle</label>
                        <input type="text" class="border border-2 form-control ps-0 form-control-line @error('nom') is-invalid @enderror" name="nom" value="{{$salles->nom}}">
                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Type de salle</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="types_salle_id" value="{{ old('types_salle_id') }}">
                            <option value="{{$typessalles->where('id','=',$salles->types_salle->id)->first()->id}}" selected>{{$typessalles->where('id','=',$salles->types_salle->id)->first()->titre}}</option>
                            @foreach ($typessalles as $typessalle)

                            <option value="{{$typessalle->id}}">{{$typessalle->titre}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Etage</label>
                        <select class="border border-2 form-control form-select shadow-none form-control-line" name="etage_id" value="{{ old('etage_id') }}">
                            <option value="{{$etages->where('id','=',$salles->etage->id)->first()->id}}">Niveau-{{$etages->where('id','=',$salles->etage->id)->first()->num}}</option>
                            @foreach ($etages as $etage)

                            <option value="{{$etage->id}}">Niveau-{{$etage->num}}</option>

                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label" style="transform: translateY(-5px)">Disponible</label>
                    <label class="ms-2 switch label">
                        <input type="checkbox" name="active" {{$salles->active == 0 ?'checked':''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="row w-100">
                    <div class="offset-xl-7 col-xl-5 mt-5">
                        <div class="btn-actions">
                            <button type="submit" class="btn-submit mb-2">Enregistrer</button>
                            <a href="{{route("salles/edit", ['id' => $salles->id])}}">
                                <button type="button" class="btn-cancel">Reinitialiser</button>
                            </a>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
