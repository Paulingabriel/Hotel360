@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Nouveau Prix
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post">
            @csrf
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{$sallespr->id}}">
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Type de salle</label>
                            <select class="border border-2 form-control form-select shadow-none form-control-line" name="types_salle_id">
                                @foreach ($typessalles as $typessalle)

                                <option value="{{$typessalle->id}}">{{$typessalle->titre}}</option>

                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Nom de la Salle</label>
                            <select class="border border-2 form-control form-select shadow-none form-control-line" name="salle_id">
                                @foreach ($salles as $salle)

                                <option value="{{$salle->id}}">{{$salle->nom}}</option>

                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix journalier de location</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prix') is-invalid @enderror" name="prix" value="{{$sallespr->prix}}">
                        <span class="text-danger">{{ $errors->first('prix') }}</span>
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






@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')



                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Prix
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post">
            @csrf
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{$sallespr->id}}">
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Type de chambre</label>
                            <select class="border border-2 form-control form-select shadow-none form-control-line" name="types_salle_id">
                                @foreach ($typessalles as $typessalle)

                                <option value="{{$typessalle->id}}">{{$typessalle->titre}}</option>

                                @endforeach
                            </select>
                        <span class="text-danger">{{ $errors->first('') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Sieste</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixsieste') is-invalid @enderror" name="prixsieste"  value="{{$sallespr->prixsieste}}">
                        <span class="text-danger">{{ $errors->first('prixsieste') }}</span>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-2  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Nuitée</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixnuitee') is-invalid @enderror" name="prixnuitee" value="{{$sallespr->prixnuitee}}">
                        <span class="text-danger">{{ $errors->first('prixnuitee') }}</span>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6 col-xl-5  mb-4">
                        <label for="date" class="label col-md-12 mb-2">Prix/Heure</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('prixheure') is-invalid @enderror" name="prixheure" value="{{$sallespr->prixheure}}">
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
