<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    @include('layouts.head')
</head>


<body data-col="2-columns" class="2-columns bg-white">
    <style>
        html {}

        .dataTables_filter [type='search']{
            height: 100%;
            border-radius: 20px;
            padding: 0 15px;
            position: relative;
        }
        .main-panel .btn-add{
            background-color:  #2e612e;
            color: white;
            font-family: 'poppins';
            height: 35px;
            border: none;
            box-sizing: border-box;
            padding: 0 20px;
            border-radius: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
        }
        .fa-plus{
            padding: 2.5px;
            background-color: #fff;
            border-radius: 50%;
            color: #2e612e;
            font-weight: bold;
        }

        .active .page-link{
            background-color:  #2e612e!important;
            border-color:  #2e612e!important;
        }

        .dataTables_filter [type='search']:focus{
        border: 1px solid  rgba(50, 162, 50, 0.8)!important;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;

        }

        .dataTables_filter label{
            position: relative;
        }
        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before{
            background-color:  #2e612e!important;
        }
        .dt-buttons{
           text-align: center;
           padding: 0 0 20px 0;
        }
        .dt-buttons button{
            border-radius: 3px;
            background-color: #fff;
            border: none!important;
            box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
        }
        .dataTables_length, .dataTables_filter{
            display: inline!important;
        }
        .dataTables_filter{
            float: right;
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
                        <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;">Prix regulier</h4>
                        <div class="col-md-12">
                            <a href="{{route("chambresPr/ajouter")}}">
                                <button class="btn-add float-right"><i class="fa-solid fa-plus  me-2"></i>Ajouter</button>
                            </a>
                        </div>
                    </div>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        
                        <thead>
                            <tr>
                                <td class="d-none">#</td>
                                <td>Types de chambres</td>
                                <td>Prix/sieste</td>
                                <td>Prix/heure</td>
                                <td>Prix/nuitee</td>
                                <td>Ajouté</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($chambrespr as $chambrespr)

                            <tr>
                                <td class="d-none">{{$chambrespr->first()->id}}</td>
                                <td>{{$chambrespr->types_chambre->titre}}</td>
                                <td>{{$chambrespr->prixsieste}}</td>
                                <td>{{$chambrespr->prixheure}}</td>
                                <td>{{$chambrespr->prixnuitee}}</td>
                                <td>{{$chambrespr->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="actions text-center">
                                        <a href="{{route("chambresPr/edit", ['id' => $chambrespr->id])}}">
                                            <i class="ft-edit mr-1" style="color: rgba(50, 162, 50, 0.8);"></i>
                                        </a>
                                        <a href="{{route("chambresPr/delete", ['id' => $chambrespr->id])}}" onclick="confirmation(event)">
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

    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->




    <script src="../app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="../app-assets/vendors/js/core/popper.min.js"></script>
    <script src="../app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="../app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../app-assets/vendors/js/prism.min.js"></script>
    <script src="../app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="../app-assets/vendors/js/screenfull.min.js"></script>
    <script src="../app-assets/vendors/js/pace/pace.min.js"></script>
    <script src="../app-assets/vendors/js/chartist.min.js"></script>
    <script src="../app-assets/js/app-sidebar.js"></script>
    <script src="../app-assets/js/notification-sidebar.js"></script>
    <script src="../app-assets/js/customizer.js"></script>
    <script src="../app-assets/js/dashboard-ecommerce.js"></script>

    <!----------javascript links datatables--------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>


     <!----------javascript links export buttons--------->
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js
    ">
    </script>


    <script>
    $(document).ready(function() {
    $('#example').DataTable(
        {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );
    } );
    </script>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:37:02 GMT -->

</html>





