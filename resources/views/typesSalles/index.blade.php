
@extends('layouts.main')

@section('content')

@include('layouts.styleData')


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;">Types de Salles</h4>
                        <div class="col-md-12">
                            <a href="{{route("typesSalles/ajouter")}}">
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
                                <th>Ajouté</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($typessalles as $typessalle)
                            <tr>
                                <td class="d-none">{{$typessalle->first()->id}}</td>
                                <td>{{$typessalle->titre}}</td>
                                <td>{{$typessalle->code}}</td>
                                <td><img src="{{ asset('/uploads/images/' . $typessalle->image) }}"
                                    alt="{{ $typessalle->image }}" width="40"></td>
                                <td class="text-center">{{$typessalle->min}}</td>
                                <td class="text-center">{{$typessalle->max}}</td>
                                <td>{{$typessalle->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("typesSalles/edit", ['id' => $typessalle->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("typesSalles/delete", ['id' => $typessalle->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



@endsection
