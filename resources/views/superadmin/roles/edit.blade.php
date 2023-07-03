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
                        Modifier un role
                    </h4>
                </div>

                <div class="form-section mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <form  method="POST" action="{{ route('superadmin.roles.update', $role->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="date" class="label col-md-12 mb-2">Nom</label>
                                            <input type="text" class="border border-2 form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name"  value="{{ $role->name }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="row w-100">

                                            <div class="btn-actions">
                                                <button type="submit" class="btn-submit mb-2">Modifier</button>
                                            </div>

                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 border-2 border-top border-bottom">
                            <h4><i class="las la-trash-alt danger me-1 fs-1"></i>Supprimer une permission</h4>
                            @if ($role->permissions)
                                @foreach ($role->permissions as $role_permission)
                                    {{-- <form class="" method="POST"
                                        action="{{ route('superadmin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="confirmation(event)"> --}}
                                    <a href="/superadmin/roles/{{$role->id}}/permissions/{{$role_permission->id}}">
                                        <button class="alert me-1">
                                            {{ $role_permission->name }}
                                        </button>
                                    </a>
                                    {{-- </form> --}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('superadmin.roles.permissions', $role->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
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
            </div>



@endsection
