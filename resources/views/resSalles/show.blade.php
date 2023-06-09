


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
                            @if(isset($ressalle->salles_pr_id))
                            <li class="lead text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_pr_id)*( ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') ),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></li>
                            @elseif(isset($ressalle->salles_ps_id))
                            <li class="lead text-bold-800"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_ps_id)*( ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') ),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></li>
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
                            {{$ressalle->client_id}}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->where('nom',$ressalle->client_id)->first()->adresse}}</font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->where('nom',$ressalle->client_id)->first()->tel1}}/{{$client->where('nom',$ressalle->client_id)->first()->tel2}}</font></font></li>
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
                                        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $ressalle->id }}</font></font></th>
                                        <td>
                                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reservation de salle</font></font></p>
                                        </td>
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $ressalle->option }}</font></font></td>
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') }}</font></font></td>
                                        @if(isset($ressalle->salles_pr_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format($ressalle->salles_pr_id,0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @elseif(isset($ressalle->salles_ps_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format($ressalle->salles_ps_id,0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @endif
                                        @if(isset($ressalle->salles_pr_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_pr_id)*(((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a')),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                        @elseif(isset($ressalle->salles_ps_id))
                                        <td class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_ps_id)*( ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') ),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
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
                                            @if(isset($ressalle->salles_pr_id))
                                            <td class="text-bold-800 text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_pr_id)*( ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') ),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
                                            @elseif(isset($ressalle->salles_ps_id))
                                            <td class="text-bold-800 text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ number_format(($ressalle->salles_ps_id)*( ((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a') ),0,'.','.') }} {{ Auth::user()->hotel->devise}}</font></font></td>
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


