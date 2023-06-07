


<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="px-2 py-5" style="font-family: poppins;">






<section class="invoice-template">
    <div class="card">
        <div class="card-body p-3">
            <div id="invoice-template" class="card-block">
                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row">
                    <div class="col-6 text-left">
                        @if(isset(Auth::user()->hotel->image))
                        <img src="{{ asset('uploads/images/' . Auth::user()->hotel->image) }}" alt="logo d'entreprise" class="mb-2" width="70">
                        @else
                        <img src="" alt=""/>
                        @endif
                        <ul class="px-0 list-unstyled">
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ Auth::user()->hotel->adresse }}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ Auth::user()->hotel->ville }}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ Auth::user()->hotel->pays }}</font></font></li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FACTURE</font></font></h2>
                        <p class="pb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">#INV-001001</font></font></p>
                        <ul class="px-0 list-unstyled">
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Solde dû</font></font></li>
                            @if(isset($reschambre->chambres_pr_id))
                            <li class="lead text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_pr_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></li>
                            @elseif(isset($reschambre->chambres_ps_id))
                            <li class="lead text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_ps_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-left">
                        <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Client:</font></font></p>
                    </div>
                    <div class="col-6 text-left">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{$reschambre->client_id}}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->where('nom',$reschambre->client_id)->first()->adresse}}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->where('nom',$reschambre->client_id)->first()->tel1}}/{{$client->where('nom',$reschambre->client_id)->first()->tel2}}</font></font></li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <p><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date de facturation :</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $todayDate }}</font></font></p>
                    </div>
                </div>
                <!--/ Invoice Customer Details -->
                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">#</font></font></th>
                                        <th style="width: 30%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></th>
                                        <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Option</font></font></th>
                                        <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Occurence</font></font></th>
                                        <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">P.U</font></font></th>
                                        <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Montant</font></font></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reschambre->id }}</font></font></th>
                                        <td>
                                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reservation de chambre</font></font></p>
                                        </td>
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reschambre->option }}</font></font></td>
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reschambre->occ }}</font></font></td>
                                        @if(isset($reschambre->chambres_pr_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reschambre->chambres_pr_id }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @elseif(isset($reschambre->chambres_ps_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $reschambre->chambres_ps_id }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @endif
                                        @if(isset($reschambre->chambres_pr_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_pr_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @elseif(isset($reschambre->chambres_ps_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_ps_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-left">
                           
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total dû</font></font></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></td>
                                            @if(isset($reschambre->chambres_pr_id))
                                            <td class="text-bold-800 text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_pr_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                            @elseif(isset($reschambre->chambres_ps_id))
                                            <td class="text-bold-800 text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ($reschambre->chambres_ps_id)*( $reschambre->occ ) }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Footer -->
                <div id="invoice-footer">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="button" onclick="printMe()" id="button" class="btn btn-primary my-1" style="background-color:  #2e612e!important;"><i class="fa-solid fa-print mr-1"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imprimer la facture</font></font></button>
                        </div>
                    </div>
                </div>
                <!--/ Invoice Footer -->
            </div>
        </div>
    </div>
</section>

<script>
    var button = document.getElementById('button');

    function printMe(){
        button.style.visibility = 'hidden';
        window.print();
    }

</script>
</body>

</html>













{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Funda Ecommerce</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #6</span> <br>
                    <span>Date: 24 / 09 / 2022</span> <br>
                    <span>Zip code : 560077</span> <br>
                    <span>Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>6</td>

                <td>Full Name:</td>
                <td>Ved Prakash</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>funda-CRheOqspbA</td>

                <td>Email Id:</td>
                <td>ved@gmail.com</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>22-09-2022 10:54 AM</td>

                <td>Phone:</td>
                <td>8889997775</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>Cash on Delivery</td>

                <td>Address:</td>
                <td>asda asdad asdad adsasd</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>completed</td>

                <td>Pin code:</td>
                <td>566999</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">16</td>
                <td>
                    Mi Note 7
                </td>
                <td width="10%">$14000</td>
                <td width="10%">1</td>
                <td width="15%" class="fw-bold">$14000</td>
            </tr>
            <tr>
                <td width="10%">17</td>
                <td>
                    Vivo V19
                </td>
                <td width="10%">$699</td>
                <td width="10%">1</td>
                <td width="15%" class="fw-bold">$699</td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">$14699</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Funda of Web IT
    </p>

</body>
</html>

 --}}
