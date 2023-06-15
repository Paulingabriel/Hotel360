@extends('layouts.main')

@section('content')

@include('layouts.styleData')


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="fa fa-usd fs-1 me-2" style="color: #2e612e;"></i>Prix regulier</h4>
                        <div class="col-md-12">
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                            <a href="{{route("chambresPr/ajouter")}}">
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
                                <th>Types de chambres</th>
                                <th>Prix/sieste</th>
                                <th>Prix/heure</th>
                                <th>Prix/nuitee</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($chambrespr as $chambrespr)

                            <tr>
                                <td class="d-none">{{$chambrespr->first()->id}}</td>
                                <td>{{$chambrespr->types_chambre->titre}}</td>
                                <td>{{number_format($chambrespr->prixsieste,0,'.','.')." ".Auth::user()->hotel->devise}}</td>
                                <td>{{number_format($chambrespr->prixheure,0,'.','.')." ".Auth::user()->hotel->devise}}</td>
                                <td>{{number_format($chambrespr->prixnuitee,0,'.','.')." ".Auth::user()->hotel->devise}}</td>
                                <td>{{$chambrespr->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        @if((Auth::user()->hasDirectPermission("modifier")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("chambresPr/edit", ['id' => $chambrespr->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        @else
                                        <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        @endif
                                        @if((Auth::user()->hasDirectPermission("supprimer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                        <a href="{{route("chambresPr/delete", ['id' => $chambrespr->id])}}" onclick="confirmation(event)">
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
