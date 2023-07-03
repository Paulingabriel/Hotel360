
















<!-- Modal Create -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modalCreate">
      <div class="modal-content">
        <div class="container-lg bg-sucessborder-5">

            <div class="section-title">
                <h4 class="border-bottom border-2">
                    Ajouter une réservation de chambre
                </h4>
            </div>
            <div class="form-section mb-3">
                <form action="" method="POST" name="form">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line stateSelect2" id="client_id" name="client_id" value="{{ old('client_id') }}">
                                    <option value="" selected>------------</option>
                                    @foreach ($clients as $client)

                                        <option value="{{$client->nom}}">{{$client->nom}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="clientError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Numero de chambre</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line stateSelect2" id="chambre_id" name="chambre_id" onchange="change(this.options[this.selectedIndex].value)">
                                </select>

                                <span class="text-danger" id="chambreError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2 d-none">Date de réservation</label>
                                <input type="text" class="border border-2 form-control ps-0 form-control-line d-none" id="dateres" name="dateres" disabled>
                                <span class="text-danger" id="dateresError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Option de réservation</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" name="option" id="option" onchange="display(this)">
                                    <option value="" selected>------------</option>
                                    <option value="nuitée">nuitée</option>
                                    <option value="sieste">sieste</option>
                                    <option value="heure">heure</option>
                                </select>
                                <span class="text-danger" id="optionError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4" id="h" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Nombre d'heures</label>
                                <input type="number" class="border border-2 form-control ps-0 form-control-line" id="occ" name="occ" onkeyup="total(this.value)">
                                <span class="text-danger" id="occError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5  mb-4" id="de" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Date d'entrée</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datedebut" name="datedebut" value="{{ old('datedebut') }}" onchange="globaldebut(this.value)">
                                <span class="text-danger" id="datedebutError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5  offset-xl-2 mb-4" id="ds" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Date de sortie</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datefin" name="datefin" value="{{ old('datefin') }}" onchange="globalfin(this.value)">
                                <span class="text-danger" id="datefinError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5  mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nombre d'adultes</label>
                                <input type="number" class="border border-2 form-control ps-0 form-control-line" name="adultes"  id="adultes" value="{{ old('adultes') }}">
                                <span class="text-danger" id="adultesError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nombre d'enfants</label>
                                <input type="number" class="border border-2 form-control ps-0 form-control-line" name="enfants" id="enfants" value="{{ old('enfants') }}">
                                <span class="text-danger" id="enfantsError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prix">Prix</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_1" name="chambres_pr_1" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_2" name="chambres_pr_2" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_3" name="chambres_pr_3" style="display: none;" disabled/>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prixtotal">Total</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total1" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total2" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total3" style="display: none;" disabled/>
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







