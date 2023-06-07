@extends('layouts.main')

@section('content')

                        <!----------START STYLE----------->


                        @include('../layouts.styleForm')

                        <style>

textarea:focus{
    border: 1px solid  rgba(50, 162, 50, 0.8)!important;
    box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
}

.alert{


            /* padding: 0 12.5px; */
            font-size: 12px;
            padding: 0;
            width: 70px;
            font-family: 'poppins';
            color: white;
            border-radius: 0;
            background-color: rgb(255, 0, 0, 0.8);
            box-shadow: 0px 0px 4px rgba(255, 0, 0, 0.8)!important;


}




                        </style>

                        <!----------END STYLE----------->

            <div class="container-lg bg-sucessborder-5">

                <div class="section-title">
                    <h4 class="border-bottom border-2">
                        Modifier un utilisateur
                    </h4>
                </div>

                <div class="form-section mb-3">
                    <div class="row w-100 mb-3">

                            <form  method="POST" action="/superadmin/users/{{$user->id}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-xl-5">
                                            <label for="date" class="label col-md-12 mb-2">Nom</label>
                                            <input type="text" class="border border-2 form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name" value = {{$user->name}}>
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="col-md-6 col-xl-5 offset-xl-2">
                                            <label for="email" class="label col-md-12 mb-2">Email</label>
                                            <input type="email" class="border border-2 form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" value = {{$user->email}}>
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xl-5 mb-4">
                                            <label for="date" class="label col-md-12 mb-2">Hotel</label>
                                            <select class="border border-2 form-control form-select shadow-none form-control-line" name="hotel_id">
                                                @if(isset($hotel->id))
                                                <option value="{{$hotel->id}}" selected>{{$hotel->nom}}</option>
                                                @else
                                                <option value=""></option>
                                                @endif
                                                @foreach ($hotels as $hotel)

                                                <option value="{{$hotel->id}}">{{$hotel->nom}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                            {{-- <label for="password" class="label col-md-12 mb-2">Mot de Passe</label> --}}
                                            <input type="hidden" class="border border-2 form-control ps-0 form-control-line @error('password') is-invalid @enderror" name="password"  value="{{ $user->password }}">
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                    <div class="row w-100">

                                            <div class="btn-actions">
                                                <button type="submit" class="btn-submit mb-2">Modifier</button>
                                            </div>

                                    </div>
                            </form>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5 border-2 border-top border-bottom">
                            <h4><i class="las la-trash-alt danger me-1 fs-1"></i>Supprimer une permission</h4>
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    {{-- <form class="" method="POST"
                                        action="{{ route('superadmin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="confirmation(event)"> --}}
                                    <a href="/superadmin/users/{{$user->id}}/permissions/{{$user_permission->id}}">
                                        <button class="alert me-1">
                                            {{ $user_permission->name }}
                                        </button>
                                    </a>
                                    {{-- </form> --}}
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-5 offset-md-2 border-2 border-top border-bottom">
                            <h4><i class="las la-trash-alt danger me-1 fs-1"></i>Supprimer un role</h4>
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    {{-- <form class="" method="POST"
                                        action="{{ route('superadmin.permissions.permissions.revoke', [$permission->id, $permission_permission->id]) }}" onsubmit="confirmation(event)"> --}}
                                    <a href="/superadmin/users/{{$user->id}}/roles/{{$user_role->id}}">
                                        <button class="alert me-1">
                                            {{ $user_role->name }}
                                        </button>
                                    </a>
                                    {{-- </form> --}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <form method="POST" action="/superadmin/users/{{$user->id}}/permissions">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="permission"
                                            class="label col-md-12">Permission</label>
                                        <select id="permission" name="permission" autocomplete="permission-name"
                                            class="border border-2 form-control form-select shadow-none form-control-line">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('permission')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                                <div class="row mt-4">

                                    <div class="btn-actions">
                                        <button type="submit" class="btn-submit mb-2">Assigner</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 offset-md-2">
                            <form method="POST" action="/superadmin/users/{{$user->id}}/roles">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="role"
                                            class="label col-md-12">Roles</label>
                                        <select id="role" name="role" autocomplete="role-name"
                                            class="border border-2 form-control form-select shadow-none form-control-line">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('role')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror

                                <div class="row mt-4">

                                    <div class="btn-actions">
                                        <button type="submit" class="btn-submit mb-2">Assigner</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



@endsection
