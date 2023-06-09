










<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modalCreate">
      <div class="modal-content">
        <div class="container-lg bg-sucessborder-5">

            <div class="section-title">
                <h4 class="border-bottom border-2">
                    Ajouter une réservation de salle
                </h4>
            </div>

            <div class="form-section mb-3">
                <form action="" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" id="client_id" name="client_id" value="{{ old('client_id') }}">
                                    @foreach ($clients as $client)

                                        <option value="{{$client->nom}}">{{$client->nom}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="clientError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Numero de salle</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" id="salle_id" name="salle_id" value="{{ old('salle_id') }}">
                                    @foreach ($salles as $salle)

                                        <option value="{{$salle->num}}">{{$salle->num}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="salleError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Date de réservation</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="dateres" name="dateres" value="{{ old('dateres') }}">
                                <span class="text-danger" id="dateresError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5  mb-4">
                                <label for="date" class="label col-md-12 mb-2">Du</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datedebut" name="datedebut" value="{{ old('datedebut') }}">
                                <span class="text-danger" id="datedebutError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5  offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Au</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datefin" name="datefin" value="{{ old('datefin') }}">
                                <span class="text-danger" id="datefinError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Prix regulier</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" id="salles_pr_id" name="salles_pr_id" value="{{ old('salles_pr_id') }}">
                                    <option value="" selected>------------</option>
                                    @foreach ($sallesprs as $sallespr)

                                        <option value="{{$sallespr->prix}}">{{$sallespr->prix}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="sallesprError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Prix spécial</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" id="salles_ps_id" name="salles_ps_id" value="{{ old('salles_ps_id') }}">
                                    <option value="" selected>------------</option>
                                    @foreach ($sallespss as $sallesps)

                                    <option value="{{$sallesps->prix}}">{{$sallesps->prix}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="sallespsError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Mode de payement</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" id="payement" name="payement" value="{{ old('payement') }}">
                                    <option value="carte bancaire">carte bancaire</option>
                                    <option value="espèces">espèces</option>
                                </select>
                                <span class="text-danger" id="payementError"></span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="date" class="label col-md-12 mb-2" style="margin-left: -15px">Statut de réservation</label>
                            <div class="d-flex mt-2">
                                <div class="form-check form-check-inline label1">
                                    <label class="form-check-label" for="inlineRadio1">En cours...</label>
                                    <input class="form-check-input" type="radio" name="statut" id="statut" value="En cours...">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label label2" for="inlineRadio2">Terminée</label>
                                    <input class="form-check-input" type="radio" name="statut" id="statut" value="Terminée">
                                </div>
                            </div>
                            <span class="text-danger" id="statutError"></span>
                        </div>
                        <div class="row">
                            <div class="offset-xl-4 col-xl-8 mt-5">
                                <div class="btn-actions">
                                    <button type="button" onclick="addData()"  class="btn-submit mb-2">Enregistrer</button>
                                    <button type="button" class="btn-cancel" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

        </div>
      </div>
    </div>
  </div>
<!-- Modal Edit -->




