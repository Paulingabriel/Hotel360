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
            font-family: 'poppins';
            color: white;
            border-radius: ;
            background-color: rgba(50, 162, 50, 0.8);
            /* box-shadow: 0 0 4px rgba(50, 162, 50, 0.5)!important; */
            text-align: center;
        }
    </style>


<div class="wrapper px-3">

    @include('layouts.sidebar')

    @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="icon-user fs-1 me-2" style="color: #2e612e;"></i>Utilisateurs</h4>
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
                                <th class="text-center">Permissions</th>
                                <th class="text-center">Hotel</th>
                                <th class="text-center">Ajouté</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                            <tr>
                                <td class="d-none">{{$user->first()->id}}</td>
                                <td class="d-flex justify-content-center"><div class="roles">{{$user->name}}</div></td>
                                <td class="text-center">
                                    @if ($user->roles)
                                        @foreach ($user->roles as $user_role)
                                            <div class="role" style="display: inline-block;">{{$user_role->name}}</div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($user->permissions)
                                        @foreach ($user->permissions as $user_permission)
                                            <div class="role" style="display: inline-block;">{{$user_permission->name}}</div>
                                        @endforeach
                                    @endif
                                </td>
                                @if(isset($user->hotel->nom))
                                <td class="text-center">{{$user->hotel->nom}}</td>
                                @else
                                <td></td>
                                @endif
                                <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="actions text-center">
                                        <a href="/superadmin/utilisateurs/modifier/{{$user->id}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("superadmin.users.destroy",  ['user' => $user->id])}}" onclick="confirmation(event)">
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


    @include('superadmin.users.create')
    @include('layouts.script')




</body>
</html>

