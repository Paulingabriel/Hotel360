@extends('layouts.main')

@section('content')

@include('layouts.styleData')

    <style>

        .actif{
            padding: 0 8px;
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
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-bed fs-1 me-2" style="color: #2e612e;"></i>Chambres</h4>
                        <div class="col-md-12">
                            <a href="{{route("chambres/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">

                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Numero de chambre</th>
                                <th>Types de Chambres</th>
                                <th>Etage</th>
                                <th>Etat</th>
                                <th>Ajoutée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($chambres as $chambre)

                            <tr>
                                <td class="d-none">{{$chambre->first()->id}}</td>
                                <td>{{$chambre->num}}</td>
                                <td>{{$chambre->types_chambre->titre}}</td>
                                <td>
                                    @if($chambre->etage->num == 0)
                                    Rée de chaussé
                                    @else
                                    Niveau-{{$chambre->etage->num}}
                                    @endif
                                </td>
                                <td>

                                    
                                    {{-- ($reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut) --}}
                                    {{-- {{$reschambre->statut->where($reschambre->chambre_id,'=',$chambre->num)->get()}} --}}

                                    
                                    @if(isset($reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut))

                                    
                                        @if(($chambre->active == 1 && $reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut == 'Terminée'))

                                        <label class="actif">
                                            Disponible
                                        </label>

                                        @elseif(($chambre->active == 1 && $reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut == 'En cours...'))

                                        <label class="inactif">
                                            Occupée
                                        </label>

                                        @elseif(($chambre->active == 0 && $reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut == 'Terminée'))

                                        <label class="actif">
                                            Disponible
                                        </label>

                                        @elseif(($chambre->active == 0 && $reschambre->where('chambre_id', '=' , $chambre->num)->last()->statut == 'En cours...'))

                                        <label class="inactif">
                                            Occupée
                                        </label>

                                        @endif 

                                    @else

                                        @if($chambre->active == 1)

                                        <label class="actif">
                                        Disponible
                                        </label>
                                        @elseif($chambre->active == 0)

                                        <label class="inactif">
                                        Occupée 
                                        </label>

                                        @endif

                                    @endif

                                </td>
                                <td>{{$chambre->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("chambres/edit", ['id' => $chambre->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("chambres/delete", ['id' => $chambre->id])}}"  onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

@endsection
