@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')

                        <style>





                        
                        </style>

                        <!----------END STYLE----------->

<div class="container-lg bg-sucessborder-5">

    <div class="section-title">
        <h4 class="border-bottom border-2">
            Ajouter un nouvel étage
        </h4>
    </div>

    <div class="form-section mb-3">
        <form action="" method="post">
                @csrf
                <div class="row w-100">
                    <div class="col-md-2 mb-4">
                        <label for="date" class="label col-md-12 mb-2">Numéro d'étage</label>
                        <input type="number" class="border border-2 form-control ps-0 form-control-line @error('num') is-invalid @enderror" name="num" value="{{ old('num') }}">
                        <span class="text-danger">{{ $errors->first('num') }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label" style="transform: translateY(-5px)">Active</label>
                    <label class="ms-2 switch label">
                        <input type="checkbox" name="active">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="date" class="label col-md-12 mb-2">Description</label>
                        <textarea class="" name="description" id="" cols="80" rows="10"></textarea>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="offset-xl-7 col-xl-5 mt-5">
                        <div class="btn-actions">
                            <button type="submit" class="btn-submit mb-2">Enregistrer</button>
                            <a href="{{route("etages/ajouter")}}">
                                <button type="button" class="btn-cancel">Reinitialiser</button>
                            </a>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>


@endsection
