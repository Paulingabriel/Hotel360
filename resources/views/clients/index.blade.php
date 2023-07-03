@extends('layouts.main')

@section('content')

@include('layouts.styleData')


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="icon-user fs-1 me-2" style="color: #2e612e;"></i>Clients</h4>
                        <div class="col-md-12">
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                            <a href="{{route("clients/ajouter")}}">
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
                                <th>Nom</th>
                                <th>Sexe</th>
                                <th>Adresse</th>
                                <th>Email</th>
                                <th>Tel1</th>
                                <th>Tel2</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($clients as $client)
                            <tr>
                                <td class="d-none">{{$client->first()->id}}</td>
                                <td>{{$client->nom}}</td>
                                <td>{{$client->sexe}}</td>
                                <td>{{$client->adresse}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->tel1}}</td>
                                <td>{{$client->tel2}}</td>
                                <td>{{$client->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        @if((Auth::user()->hasDirectPermission("modifier")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("clients/edit", ['id' => $client->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        @else
                                        <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        @endif
                                        @if((Auth::user()->hasDirectPermission("supprimer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("clients/delete", ['id' => $client->id])}}" onclick="confirmation(event)">
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




