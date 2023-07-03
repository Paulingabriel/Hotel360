<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    @include('layouts.head')

</head>


<body data-col="2-columns" class="2-columns bg-white">


@include('layouts.styleData')

    <style>

        .roles{
            border: 2px solid rgba(50, 162, 50, 0.8)!important;
            /* box-shadow: 0 0 6px rgba(50, 162, 50, 0.8)!important; */
            background-color: white;
            width: 70px;
            font-size: 12px;
            font-family: 'poppins';
            font-weight: 500;
            display: flex;
            color:  #226922;
            justify-content: center;
            text-align: center;
            /* border-radius: 10px 0 10px 0; */
            /* text-shadow: 0 0 4px rgba(50, 162, 50, 0.5)!important; */
        }
        .role{
            padding: 0 10px;
            font-size: 12px;
            font-family: 'poppins';
            color: white;
            border-radius: ;
            background-color: rgba(50, 162, 50, 0.8);
            text-align: center;
            /* box-shadow: 0 0 4px rgba(50, 162, 50, 0.5)!important; */
        }
    </style>


<div class="wrapper px-3">

    @include('layouts.sidebar')

    @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-user-tag fs-1 me-2" style="color: #2e612e;"></i>Roles</h4>
                        <div class="col-md-12">

                                <button class="btn-add float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>

                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Permissions</th>
                                <th class="text-center">Ajouté</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <td class="d-none">{{$role->first()->id}}</td>
                                <td class="d-flex justify-content-center"><div class="roles">{{$role->name}}</div></td>
                                <td class="text-center">

                                    @if ($role->permissions)
                                        @foreach ($role->permissions as $role_permission)
                                            <div class="role" style="display: inline-block;">{{$role_permission->name}}</div>
                                        @endforeach
                                    @endif

                                </td>
                                <td class="text-center">{{$role->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="actions text-center">
                                        <a href="{{route("superadmin.roles.edit", ['role' => $role->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("superadmin.roles.destroy",  ['role' => $role->id])}}" onclick="confirmation(event)">
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


    @include('superadmin.roles.create')
    @include('layouts.script')




</body>
</html>

