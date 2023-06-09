@extends('layouts.main')

@section('content')

@include('layouts.styleData')

                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="fa fa-usd fs-1 me-2" style="color: #2e612e;"></i>Prix spécial</h4>
                        <div class="col-md-12">
                            <a href="{{route("sallesPs/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus me-2 me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Titre</th>
                                <th>Types de Salles</th>
                                <th>Salles</th>
                                <th>Période</th>
                                <th>Prix journalier de location</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sallesps as $sallesps)

                            <tr>
                                <td class="d-none">{{$sallesps->first()->id}}</td>
                                <td>{{$sallesps->titre}}</td>
                                <td>{{$sallesps->types_salle->titre}}</td>
                                <td>{{$sallesps->salle->nom}}</td>
                                <td>{{"Du ". $sallesps->date1." au ".$sallesps->date2}}</td>
                                <td class="text-center">{{number_format($sallesps->prix,0,'.','.')." ".Auth::user()->hotel->devise}}</td>
                                <td>{{$sallesps->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("sallesPs/edit", ['id' => $sallesps->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("sallesPs/delete", ['id' => $sallesps->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

@endsection





