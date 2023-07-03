
@extends('layouts.main')

@section('content')

@include('layouts.styleData')


                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-hotel fs-1 me-1" style="color: #2e612e;"></i>Hotels</h4>
                        <div class="col-md-12">
                            <a href="{{route("hotels/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Logo</th>
                                <th>Email</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th>Ajouté</th>
                                <th>Actions</th>
                                <th>Téléphone 1</th>
                                <th>Téléphone 2</th>
                                <th>Monnaie</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($hotels as $hotel)
                            <tr>
                                <td class="d-none">{{$hotel->first()->id}}</td>
                                <td>{{$hotel->nom}}</td>
                                <td>{{$hotel->adresse}}</td>
                                <td><img src="{{ asset('uploads/images/' . $hotel->image) }}"
                                    alt="{{ $hotel->image }}" width="20px"></td>
                                <td>{{$hotel->email}}</td>
                                <td>{{$hotel->ville}}</td>
                                <td>{{$hotel->pays}}</td>
                                <td>{{$hotel->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("hotels/edit", ['id' => $hotel->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("hotels/delete", ['id' => $hotel->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{$hotel->tel1}}</td>
                                <td>{{$hotel->tel2}}</td>
                              <td>{{$hotel->devise}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>







@endsection




