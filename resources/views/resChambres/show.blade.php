


<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="px-5 py-5" style="font-family: poppins;">






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
                            <li class="lead text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12 000,00 $</font></font></li>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-left">
                        <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Facturer</font></font></p>
                    </div>
                    <div class="col-6 text-left">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">M. Bret Lezama</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4879, avenue Westfall,</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Albuquerque,</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nouveau-Mexique-87102.</font></font></li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <p><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date de facturation :</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 06/05/2016</font></font></p>
                        <p><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modalités :</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Dû à réception</font></font></p>
                        <p><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date limite :</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 10/05/2016</font></font></p>
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
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Article et description</font></font></th>
                                        <th class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Taux</font></font></th>
                                        <th class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Heures</font></font></th>
                                        <th class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Montant</font></font></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></th>
                                        <td>
                                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Créer un PSD pour une application mobile</font></font></p>
                                            <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Simple texte factice de l'industrie de l'impression et de la composition.</font></font></p>
                                        </td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20,00 $/h</font></font></td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">120</font></font></td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2400,00 $</font></font></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></th>
                                        <td>
                                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Développement d'applications iOS</font></font></p>
                                            <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pellentesque maximus feugiat lorem au cursus.</font></font></p>
                                        </td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25,00 $/h</font></font></td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">260</font></font></td>
                                        <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 6500.00</font></font></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-left">
                            <p class="lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Méthodes de payement:</font></font></p>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom de banque:</font></font></td>
                                                <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Banque ABC, États-Unis</font></font></td>
                                            </tr>
                                            <tr>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom d'accès&nbsp;:</font></font></td>
                                                <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Amanda Orton</font></font></td>
                                            </tr>
                                            <tr>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IBAN :</font></font></td>
                                                <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FGS165461646546AA</font></font></td>
                                            </tr>
                                            <tr>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Code rapide:</font></font></td>
                                                <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BTNPP34</font></font></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total dû</font></font></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sous-total</font></font></td>
                                            <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14 900,00 $</font></font></td>
                                        </tr>
                                        <tr>
                                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TAXE (12%)</font></font></td>
                                            <td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1 788,00 $</font></font></td>
                                        </tr>
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></td>
                                            <td class="text-bold-800 text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12 000,00 $</font></font></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Personne autorisée</font></font></p>
                                <img src="../../app-assets/img/pages/signature-scan.png" alt="signature" class="width-250">
                                <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Amanda Orton</font></font></h6>
                                <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Directeur général</font></font></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Footer -->
                <div id="invoice-footer">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Termes et conditions</font></font></h6>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vous savez, être pilote d'essai n'est pas toujours le métier le plus sain au monde. </font><font style="vertical-align: inherit;">Nous prédisons trop pour l'année prochaine et pourtant beaucoup trop peu pour les 10 prochaines.</font></font></p>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center">
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
