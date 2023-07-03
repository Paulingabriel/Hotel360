<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <script src="{{ asset('/app-assets/js/sweetalert2@8.js') }}"></script>
    <script src="{{ asset('/app-assets/js/sweetalert.min.js') }}"></script>
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


    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper px-3">

        @include('layouts.sidebar')

        @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="row my-3">

                            <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="icon-screen-tablet fs-1 me-2" style="color: #2e612e;"></i>Réservations de chambres</h4>
                            <div class="col-md-12">

                        {{-- <a href="{{route("facture", ['id' => $reschambre->id])}}" target="_blank">
                            <button class="btn-download float-left"><i class="fa-solid fa-download me-1"></i>facture</button> --}}
                            @if((Auth::user()->hasDirectPermission("créer")) && (Auth::user()->hasRole(["admin","superadmin","manager"])))
                                <button class="btn-add float-right" data-toggle="modal" data-target="#exampleModal" onclick="get()"><i class="fa-solid fa-plus me-2"></i>Ajouter</button>
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
                                <th>Chambre N°</th>
                                <th>Date de reservation</th>
                                <th>Date d'entrée</th>
                                <th>Date de sortie</th>
                                <th>Option de reservation</th>
                                <th>Nombre d'heures</th>
                                <th>Adultes</th>
                                <th>Enfants</th>
                                <th>Prix regulier({{ Auth::user()->hotel->devise}})</th>
                                <th>Montant global({{ Auth::user()->hotel->devise}})</th>
                                <th>Mode de payement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ($reschambres as $reschambre)

                            <tr>

                                <td>{{$reschambre->id}}</td>
                                <td>{{$reschambre->client}}</td>
                                <td>{{$reschambre->numres}}</td>
                                <td>{{$reschambre->numres_id}}</td>
                                <td>{{$reschambre->datedebut}}</td>
                                <td>{{$reschambre->datefin}}</td>
                                <td>{{$reschambre->dateres}}</td>
                                <td>{{$reschambre->occ}}</td>
                                <td>{{$reschambre->adultes}}</td>
                                <td>{{$reschambre->enfants}}</td>
                                <td>{{$reschambre->chambres_pr_id}}</td>
                                <td>{{$reschambre->chambres_ps_id}}</td>
                                <td>{{$reschambre->global}}</td>
                                <td>{{$reschambre->payement}}</td>
                                <td>{{$reschambre->statut}}</td>
                                <td>
                                    <i class='ft-edit mr-1' style='color: rgba(50, 162, 50, 0.8);' data-toggle='modal' data-target='#exampleModalEdit' onclick="editData('{{$reschambre->id}}')"></i>
                                    <i class='ft-trash-2 danger' onclick='deleteData("{{$reschambre->id}}")'></i>
                                </td>
                            </tr>

                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    @include('resChambres.create')
    @include('resChambres.edit')


    @include('resChambres.jquery')

    @include('layouts.script')

    <script>
        // var d = new Date();
        // var date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
        // var hours = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        // var fullDate = date+' '+hours;
        // $('#dateres').val(fullDate);
        
        var chambre1 = document.getElementById('chambres_pr_1');
        var chambre2 = document.getElementById('chambres_pr_2');
        var chambre3 = document.getElementById('chambres_pr_3');
        var chambre4 = document.getElementById('chambres_pr_4');
        var chambre5 = document.getElementById('chambres_pr_5');
        var chambre6 = document.getElementById('chambres_pr_6');
        var option = document.getElementById('option');
        var optionedit = document.getElementById('optionedit');
        var total1 = document.getElementById('total1');
        var total2 = document.getElementById('total2');
        var total3 = document.getElementById('total3');
        var total4 = document.getElementById('total4');
        var total5 = document.getElementById('total5');
        var total6 = document.getElementById('total6');
        var occ = document.getElementById('occ');
        var occedit = document.getElementById('occedit');
        var prixtotal = document.getElementById('prixtotal');
        var prixtotaledit = document.getElementById('prixtotaledit');
        var label = document.getElementById('prix');
        var editlabel = document.getElementById('editprix');
        var datedebut = document.getElementById('datedebut');
        var datefin = document.getElementById('datefin');
        var datedebutedit = document.getElementById('datedebutedit');
        var datefinedit = document.getElementById('datefinedit');
        var he = document.getElementById('he');
        var h = document.getElementById('h');
        var d1 = document.getElementById('d1');
        var de = document.getElementById('de');
        var d2 = document.getElementById('d2');
        var ds = document.getElementById('ds');


        function display(e){
            if(e.value == 'heure'){
                h.style.display = 'block';
                label.style.display = 'block';
                chambre1.style.display = 'block';
                chambre2.style.display = 'none';
                chambre3.style.display = 'none';
                de.style.display = 'none';
                ds.style.display = 'none';
            }else if(e.value == 'sieste'){
                de.style.display = 'block';
                label.style.display = 'block';
                chambre2.style.display = 'block';
                chambre1.style.display = 'none';
                chambre3.style.display = 'none';
                ds.style.display = 'block';
                h.style.display = 'none';
                if(datedebut.value !== ''){
                    total2.value = (chambre2.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                    prixtotal.style.display = 'block';
                    total2.style.display = 'block';
                    total1.style.display = 'none';
                    total3.style.display = 'none';
                }
                else{
                    if(datefin.value !== ''){
                        total2.value = (chambre2.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotal.style.display = 'block';
                        total2.style.display = 'block';
                        total1.style.display = 'none';
                        total3.style.display = 'none';
                    }else{
                        total2.value == 0;
                        prixtotal.style.display = 'block';
                        total2.style.display = 'block';
                        total1.style.display = 'none';
                        total3.style.display = 'none';
                    }
                }
            }else if(e.value == 'nuitée'){
                de.style.display = 'block';
                label.style.display = 'block';
                chambre3.style.display = 'block';
                chambre2.style.display = 'none';
                chambre1.style.display = 'none';
                ds.style.display = 'block';
                h.style.display = 'none';
                if(datedebut.value !== ''){
                    total3.value = (chambre3.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                    prixtotal.style.display = 'block';
                    total3.style.display = 'block';
                    total1.style.display = 'none';
                    total2.style.display = 'none';
                }
                else{
                    if(datefin.value !== ''){
                        total3.value = (chambre3.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotal.style.display = 'block';
                        total3.style.display = 'block';
                        total1.style.display = 'none';
                        total2.style.display = 'none';
                    }else{
                        total2.value == 0;
                        prixtotal.style.display = 'block';
                        total2.style.display = 'block';
                        total1.style.display = 'none';
                        total3.style.display = 'none';
                    }
                    
                }
            }
        }

        function total(e){
            total1.value = (chambre1.value)*e;
            prixtotal.style.display = 'block';
            total1.style.display = 'block';
            total2.style.display = 'none';
            total3.style.display = 'none';
        }

        function totaledit(e){
            total4.value = (chambre4.value)*e;
            prixtotaledit.style.display = 'block';
            total4.style.display = 'block';
            total5.style.display = 'none';
            total6.style.display = 'none';
        }


        function globalfin(e){
            if((datedebut.value !== '') && (option.value == 'sieste')){
                total2.value = (chambre2.value)*(((((new Date(e)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }
            else if((datedebut.value !== '') && (option.value == 'nuitée')){
                total3.value = (chambre3.value)*(((((new Date(e)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total3.style.display = 'block';
                total1.style.display = 'none';
                total2.style.display = 'none';
            }
            else{
                total2.value == 0;
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }
        }

        function globalfinedit(e){
            if((datedebutedit.value !== '') && (optionedit.value == 'sieste')){
                total5.value = (chambre5.value)*(((((new Date(e)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }
            else if((datedebutedit.value !== '') && (optionedit.value == 'nuitée')){
                total6.value = (chambre6.value)*(((((new Date(e)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total6.style.display = 'block';
                total4.style.display = 'none';
                total5.style.display = 'none';
            }
            else{
                total5.value == 0;
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }
        }


        function globaldebut(e){
            if((datefin.value !== '') && (option.value == 'sieste')){
                total2.value = (chambre2.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }
            else if((datefin.value !== '') && (option.value == 'nuitée')){
                chambre2.style.display = 'none';
                total3.value = (chambre3.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total3.style.display = 'block';
                total1.style.display = 'none';
                total2.style.display = 'none';
            }
            else{
                total2.value == 0;
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }
        }

        function globaldebutedit(e){
            if((datefinedit.value !== '') && (optionedit.value == 'sieste')){
                total5.value = (chambre5.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }
            else if((datefinedit.value !== '') && (optionedit.value == 'nuitée')){
                total3.value = (chambre6.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(e)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total6.style.display = 'block';
                total4.style.display = 'none';
                total5.style.display = 'none';
            }
            else{
                total5.value == 0;
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }
        }

        function visibility(e){
            // console.log(e.value);
            if(e.value == 'heure'){
                he.style.display = 'block';
                d1.style.display = 'none';
                d2.style.display = 'none';
                label.style.display = 'block';
                chambre4.style.display = 'block';
                chambre5.style.display = 'none';
                chambre6.style.display = 'none';
            }else if(e.value == 'sieste'){

                d1.style.display = 'block';
                d2.style.display = 'block';
                he.style.display = 'none';
                label.style.display = 'block';
                chambre5.style.display = 'block';
                chambre4.style.display = 'none';
                chambre6.style.display = 'none';
                if(datedebutedit.value !== ''){
                    total5.value = (chambre5.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                    prixtotaledit.style.display = 'block';
                    total5.style.display = 'block';
                    total4.style.display = 'none';
                    total6.style.display = 'none';
                }
                else{
                    if(datefinedit.value !== ''){
                        total5.value = (chambre5.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
                    }else{
                        total5.value == 0;
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
                    }
                }
            }else if(e.value == 'nuitée'){
                d1.style.display = 'block';
                d2.style.display = 'block';
                he.style.display = 'none';
                label.style.display = 'block';
                chambre6.style.display = 'block';
                chambre5.style.display = 'none';
                chambre4.style.display = 'none';
                if(datedebutedit.value !== ''){
                    total6.value = (chambre6.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                    prixtotaledit.style.display = 'block';
                    total6.style.display = 'block';
                    total4.style.display = 'none';
                    total5.style.display = 'none';
                }
                else{
                    if(datefinedit.value !== ''){
                        total6.value = (chambre6.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotaledit.style.display = 'block';
                        total6.style.display = 'block';
                        total4.style.display = 'none';
                        total5.style.display = 'none';
                    }else{
                        total5.value == 0;
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
                    }
                    
                }
            }
        }

            

    </script>

</html>










