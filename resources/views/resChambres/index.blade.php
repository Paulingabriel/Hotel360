<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('/app-assets/js/sweetalert2@8.js') }}"></script>
    <script src="{{ asset('/app-assets/js/sweetalert.min.js') }}"></script>
    <script src="/app-assets/vendors/js/core/jquery.min.js"></script>
    @include('layouts.head')
</head>


<body data-col="2-columns" class="2-columns bg-white">

    @include('layouts.styleData')


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

                                <button class="btn-add float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus me-2"></i>Ajouter</button>
                        </a>

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
                                <th>Prix regulier</th>
                                <th>Prix spécial</th>
                                <th>Montant global</th>
                                <th>Mode de payement</th>
                                <th>Statut de réservation</th>
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
        var he = document.getElementById('he');
        var h = document.getElementById('h');
        var d1 = document.getElementById('d1');
        var de = document.getElementById('de');
        var d2 = document.getElementById('d2');
        var ds = document.getElementById('ds');


        function display(e){
            if(e.value == 'heure'){
                h.style.display = 'block';
                de.style.display = 'none';
                ds.style.display = 'none';
            }else{
                de.style.display = 'block';
                ds.style.display = 'block';
                h.style.display = 'none';
            }
        }

        function visibility(e){
            // console.log(e.value);
            if(e.value == 'heure'){
                he.style.display = 'block';
                d1.style.display = 'none';
                d2.style.display = 'none';
            }else{

                d1.style.display = 'block';
                d2.style.display = 'block';
                he.style.display = 'none';
            }
        }
      </script>

</html>










