<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    @include('layouts.head')

</head>


<body data-col="2-columns" class="2-columns bg-white">

@include('layouts.styleData')

    <style>

        .role{
            padding: 0 10px;
            font-size: 12px;
            color: white;
            font-family: 'poppins';
            text-align: center;
            border-radius: ;
            background-color: rgba(50, 162, 50, 0.8);
            box-shadow: 0 0 4px rgba(50, 162, 50, 0.5)!important;
        }

        .permissions{
            border: 2px solid rgba(50, 162, 50, 0.8)!important;
            background-color: ;
            width: 80px;
            font-size: 12px;
            font-family: 'poppins';
            /* box-shadow: 0 0 6px rgba(50, 162, 50, 0.8)!important; */
            font-weight: 500;
            text-align: center;
            display: flex;
            color:  #226922;
            justify-content: center;
            background-color: white;
            /* text-shadow: 0 0 4px rgba(50, 162, 50, 0.5)!important; */
        }
    </style>

<div class="wrapper px-3">

    @include('layouts.sidebar')

    @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-unlock-alt fs-1 me-2" style="color: #2e612e;"></i>Permissions</h4>
                        <div class="col-md-12">

                                <button class="btn-add float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>

                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Ajouté</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permissions as $permission)
                            <tr>
                                <td class="d-none">{{$permission->first()->id}}</td>
                                <td class="d-flex justify-content-center"><div class="permissions">{{$permission->name}}</div></td>
                                <td class="text-center"  style="display: inline-block;">
                                    @if ($permission->roles)
                                        @foreach ($permission->roles as $permission_role)
                                            <div class="role" style="display: inline-block;">{{$permission_role->name}}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">{{$permission->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="actions text-center">
                                        <a href="{{route("superadmin.permissions.edit", ['permission' => $permission->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("superadmin.permissions.destroy", ['permission' => $permission->id])}}" onclick="confirmation(event)">
                                            <i class="ft-trash-2 danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    @include('superadmin.permissions.create')
    @include('layouts.script')




