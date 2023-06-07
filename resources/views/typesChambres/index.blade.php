
@extends('layouts.main')

@section('content')

@include('layouts.styleData')


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;">Types de Chambres</h4>
                        <div class="col-md-12">
                            <a href="{{route("typesChambres/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Titre</th>
                                <th>code</th>
                                <th>Image</th>
                                <th>Occupation minimale</th>
                                <th>Occupation maximale</th>
                                <th>Occupation adultes</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                                <th>Prix personne supplémentaire</th>
                                <th>Prix lit supplémentaire</th>
                                <th>Occupation enfants</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($typeschambres as $typeschambre)
                            <tr>
                                <td class="d-none">{{$typeschambre->first()->id}}</td>
                                <td>{{$typeschambre->titre}}</td>
                                <td>{{$typeschambre->code}}</td>
                                <td><img src="{{ asset('uploads/images/' . $typeschambre->image) }}"
                                    alt="{{ $typeschambre->image }}" width="40"></td>
                                <td class="text-center">{{$typeschambre->min}}</td>
                                <td class="text-center">{{$typeschambre->max}}</td>
                                <td class="text-center">{{$typeschambre->adultes}}</td>
                                <td>{{$typeschambre->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("typesChambres/edit", ['id' => $typeschambre->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("typesChambres/delete", ['id' => $typeschambre->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{$typeschambre->prixpersup}}</td>
                                <td>{{$typeschambre->prixlitsup}}</td>
                              <td>{{$typeschambre->enfants}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>







@endsection




