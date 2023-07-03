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
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                            <a href="{{route("chambres/ajouter")}}">
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


                                    @if(isset($reschambre->where('chambre_id', '=' , $chambre->id)->first()->datefin))


                                        @if(($reschambre->where('chambre_id', '=' , $chambre->id)->first()->datefin < $todayDate))
                                        <label class="actif">
                                            Disponible
                                        </label>

                                        @else
                                        <label class="inactif">
                                            Occupée
                                        </label>

                                        @endif


                                    @elseif(isset($reschambre->where('chambre_id', '=' , $chambre->id)->first()->occ))

                                        @if((((((new DateTime($todayDate))->diff(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres)))->days)*24) + (((new DateTime($todayDate))->diff(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres)))->format('%h')) > $reschambre->where('chambre_id', '=' , $chambre->id)->first()->occ))

                                        {{-- {{(new DateTime($todayDate))->format('D-m-Y h:i:s')}}
                                        {{(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres))->format('D-m-Y h:i:s')}} --}}

                                        <label class="actif">
                                            {{-- {{(new DateTime($todayDate))->diff(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres))->format('%h')}}
                                            {{ $reschambre->where('chambre_id', '=' , $chambre->id)->last()->occ }} --}}
                                            Disponible
                                        </label>

                                        @else
                                        {{-- {{(new DateTime($todayDate))->format('D-m-Y h:i:s')}}
                                        {{(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres))->format('D-m-Y h:i:s')}} --}}

                                        {{-- {{((((new DateTime($todayDate))->diff(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres)))->days)*24) + (((new DateTime($todayDate))->diff(new DateTime($reschambre->where('chambre_id', '=' , $chambre->id)->last()->dateres)))->format('%h'))}} --}}
                                        {{-- {{ $reschambre->where('chambre_id', '=' , $chambre->id)->last()->occ }} --}}
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
                                        @if((Auth::user()->hasDirectPermission("modifier")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("chambres/edit", ['id' => $chambre->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        @else
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        @endif
                                        @if((Auth::user()->hasDirectPermission("supprimer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("chambres/delete", ['id' => $chambre->id])}}"  onclick="confirmation(event)">
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
