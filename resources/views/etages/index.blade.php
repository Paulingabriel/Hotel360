@extends('layouts.main')

@section('content')

@include('layouts.styleData')

    <style>
        .actif{
            padding: 0 16px;
            font-size: 12px;
            color: white;
            border-radius: 5px;
            background-color: rgba(50, 162, 50, 0.8);
            box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
        }
        .inactif{
            padding: 0 10px;
            font-size: 12px;
            color: white;
            border-radius: 5px;
            background-color: rgb(255, 0, 0, 0.8);
            box-shadow: 0px 0px 4px rgba(255, 0, 0, 0.8)!important;
        }
    </style>


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="icon-layers fs-1 me-2" style="color: #2e612e;"></i>Etages</h4>
                        <div class="col-md-12">
                            <a href="{{route("etages/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Numero d'étage</th>
                                <th>Etat</th>
                                <th>description</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($etages as $etage)
                            <tr>
                                <td class="d-none">{{$etage->first()->id}}</td>
                                <td>
                                    @if($etage->num == 0)
                                    Rée de chaussé
                                    @else
                                    Niveau-{{$etage->num}}
                                    @endif
                                </td>
                                <td>
                                    @if($etage->active == 1)

                                    <label class="actif mb-0">
                                      Actif
                                    </label>
                                    @else

                                    <label class="inactif">
                                        inActif
                                    </label>
                                    @endif
                                </td>
                                <td>
                                    @if($etage->description == '')
                                    Aucune description.
                                    @else
                                    {{$etage->description}}
                                    @endif
                                </td>
                                <td>{{$etage->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("etages/edit", ['id' => $etage->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("etages/delete", ['id' => $etage->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


@endsection
