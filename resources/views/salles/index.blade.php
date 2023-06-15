@extends('layouts.main')

@section('content')

@include('layouts.styleData')



                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-door-open fs-1 me-2" style="color: #2e612e;"></i>Salles</h4>
                        <div class="col-md-12">
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                            <a href="{{route("salles/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                            @else
                            <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            @endif
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">

                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Numero de Salles</th>
                                <th>Salles</th>
                                <th>Types de Salles</th>
                                <th>Etage</th>
                                <th>Etat</th>
                                <th>Ajoutée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($salles as $salle)

                            <tr>
                                <td class="d-none">{{$salle->first()->id}}</td>
                                <td>{{$salle->num}}</td>
                                <td>{{$salle->nom}}</td>
                                <td>{{$salle->types_salle->titre}}</td>
                                <td>
                                    @if($salle->etage->num == 0)
                                    Rée de chaussé
                                    @else
                                    Niveau-{{$salle->etage->num}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($ressalle->where('salle_id', '=' , $salle->num)->last()->statut))


                                    @if(($salle->active == 1 && $ressalle->where('salle_id', '=' , $salle->num)->last()->statut == 'Terminée'))

                                    <label class="actif">
                                        Disponible
                                    </label>

                                    @elseif(($salle->active == 1 && $ressalle->where('salle_id', '=' , $salle->num)->last()->statut == 'En cours...'))

                                    <label class="inactif">
                                        Occupée
                                    </label>

                                    @elseif(($salle->active == 0 && $ressalle->where('salle_id', '=' , $salle->num)->last()->statut == 'Terminée'))

                                    <label class="actif">
                                        Disponible
                                    </label>

                                    @elseif(($salle->active == 0 && $ressalle->where('salle_id', '=' , $salle->num)->last()->statut == 'En cours...'))

                                    <label class="inactif">
                                        Occupée
                                    </label>

                                    @endif

                                @else

                                    @if($salle->active == 1)

                                    <label class="actif">
                                    Disponible
                                    </label>
                                    @elseif($salle->active == 0)

                                    <label class="inactif">
                                    Occupée
                                    </label>

                                    @endif

                                @endif

                                </td>
                                <td>{{$salle->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        @if((Auth::user()->hasDirectPermission("modifier")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("salles/edit", ['id' => $salle->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        @else
                                        <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        @endif
                                        @if((Auth::user()->hasDirectPermission("supprimer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("salles/delete", ['id' => $salle->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                        @else
                                        <i class="ft-trash-2 danger"></i>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

@endsection
