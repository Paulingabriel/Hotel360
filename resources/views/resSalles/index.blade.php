<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('../app-assets/js/sweetalert2@8.js') }}"></script>
    <script src="{{ asset('../app-assets/js/sweetalert.min.js') }}"></script>
    <script src="/app-assets/vendors/js/core/jquery.min.js"></script>
    @include('layouts.head')

</head>


<body data-col="2-columns" class="2-columns bg-white">


    @include('layouts.styleData')

    <style>
        .select2{
    width: 100%!important;
    height: 45px;
    box-sizing: border-box;
    border-radius: 25px;
    border: none!important;
    box-shadow: 0 3px 8px rgb(0, 0, 0, 0.1)!important;
    padding: 0 15px 0 15px!important;
    display: flex;
    align-items: center;
}

.selection, .select2-selection, .select2-selectio_rendered{
    box-sizing: border-box;
    height: auto!important;
    border: none!important;
    position: relative;
    width: 100%;
}

.select2-container--default .select2-selection--single .select2-selectio_arrow{
    position: absolute;

}
    </style>

    @include('resSalles.jquery')

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper px-3">

        @include('layouts.sidebar')

        @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="row my-3">
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="icon-screen-tablet fs-1 me-2" style="color: #2e612e;"></i>Réservations de Salles</h4>
                        <div class="col-md-12">

                            {{-- <a href="{{route("facture", ['id' => $ressalle->id])}}" target="_blank">
                                <button class="btn-download float-left"><i class="fa-solid fa-download me-1"></i>facture</button>
                            </a> --}}
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                <button class="btn-add float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus me-2" onclick="get()"></i>Ajouter</button>
                            @else
                            <button class="btn-add float-right"><i class="fa-solid fa-plus me-2"></i>Ajouter</button>
                            @endif
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du client</th>
                                <th>Salle N°</th>
                                <th>Date de reservation</th>
                                <th>Date d'entrée</th>
                                <th>Date de sortie</th>
                                <th>Prix regulier({{ Auth::user()->hotel->devise}})</th>
                                <th>Montant global({{ Auth::user()->hotel->devise}})</th>
                                <th>Mode de payement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    
    @include('resSalles.create')
    {{-- @include('resSalles.edit') --}}
    
    
    @include('layouts.script')
    
    <script>

        var salle = document.getElementById('salles_pr_id');
        var salleedit = document.getElementById('editsalles_pr_id');
        var total = document.getElementById('total');
        var totaledit = document.getElementById('totaledit');
        var prixtotal = document.getElementById('prixtotal');
        var prixtotaledit = document.getElementById('prixtotaledit');
        var label = document.getElementById('prix');
        var editlabel = document.getElementById('editprix');
        var datedebut = document.getElementById('datedebut');
        var datefin = document.getElementById('datefin');
        var datedebutedit = document.getElementById('datedebutedit');
        var datefinedit = document.getElementById('datefinedit');



        function globalfin(e){
            if(datedebut.value !== ''){
                total.value = (salle.value)*(((((new Date(e)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total.style.display = 'block';
            }
            else{
                total.value == 0;
                total.style.display = 'block';
                prixtotal.style.display = 'block';
            }
        }

        function globalfinedit(e){
            if(datedebutedit.value !== ''){
                totaledit.value = (salleedit.value)*(((((new Date(e)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                totaledit.style.display = 'block';
            }
            else{
                totaledit.value == 0;
                totaledit.style.display = 'block';
                prixtotaledit.style.display = 'block';
            }
        }


        function globaldebut(e){
            if(datefin.value !== ''){
                total.value = (salle.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total.style.display = 'block';
            }
            else{
                total.value == 0;
                total.style.display = 'block';
                prixtotal.style.display = 'block';
            }
        }


        function globaldebutedit(e){
            if(datefinedit.value !== ''){
                totaledit.value = (salleedit.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                totaledit.style.display = 'block';
            }
            else{
                totaledit.value == 0;
                totaledit.style.display = 'block';
                prixtotaledit.style.display = 'block';
            }
        }
    </script>