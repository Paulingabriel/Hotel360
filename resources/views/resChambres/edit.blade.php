






















<!-- Modal Create -->


<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modalEdit">
      <div class="modal-content">
        <div class="container-lg bg-sucessborder-5">

            <div class="section-title">
                <h4 class="border-bottom border-2">
                    Modifier une réservation de chambre
                </h4>
            </div>

            <div class="form-section mb-3">
                <form action="" method="POST" name="formEdit">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line stateSelect2Edit" id="client_id" name="client_id" value="{{ old('client_id') }}">
                                    @foreach ($clients as $client)

                                        <option value="{{$client->nom}}">{{$client->nom}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="clientError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Numero de chambre</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line stateSelect2Edit" id="chambre_id" name="chambre_id" value="{{ old('chambre_id') }}" onchange="editChange(this.options[this.selectedIndex].value)">
                                </select>
                                <span class="text-danger" id="chambreError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Date de réservation</label>
                                <input type="text" class="border border-2 form-control ps-0 form-control-line" id="dateres" name="dateres" disabled>
                                <span class="text-danger" id="dateresError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Option de réservation</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line option2" name="option" id="optionedit" onchange="visibility(this)">
                                    <option value="nuitée">nuitée</option>
                                    <option value="sieste">sieste</option>
                                    <option value="heure">heure</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('option') }}</span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4" id="he" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Nombre d'heures</label>
                                <input type="number" class="border border-2 form-control ps-0 form-control-line" id="occedit" name="occ" value="{{ old('occ') }}" onkeyup="totaledit(this.value)">
                                <span class="text-danger" id="occError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5  mb-4" id="d1" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Date d'entrée</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datedebutedit" name="datedebut" value="{{ old('datedebut') }}" onchange="globaldebutedit(this.value)">
                                <span class="text-danger" id="datedebutError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5  offset-xl-2 mb-4" id="d2" style="display: none;">
                                <label for="date" class="label col-md-12 mb-2">Date de sortie</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datefinedit" name="datefin" value="{{ old('datefin') }}" onchange="globalfinedit(this.value)">
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
                                <label for="date" class="label col-md-12 mb-2"  style="display: none;" id="editprix">Prix</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_4" name="chambres_pr_4" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_5" name="chambres_pr_5" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="chambres_pr_6" name="chambres_pr_6" style="display: none;" disabled/>
                                <span class="text-danger" id="chambresprError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prixtotaledit">Total</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total4" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total5" style="display: none;" disabled/>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total6" style="display: none;" disabled/>
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
                        {{-- <div class="col-md-12 mb-4">
                            <label for="date" class="label col-md-12 mb-2" style="margin-left: -15px">Statut de réservation</label>
                            <div class="d-flex mt-2">
                                <div class="form-check form-check-inline label1">
                                    <label class="form-check-label" for="inlineRadio1">En cours...</label>
                                    <input class="form-check-input" type="radio" name="statut" id="statut1" value="En cours...">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label label2" for="inlineRadio2">Terminée</label>
                                    <input class="form-check-input" type="radio" name="statut" id="statut2" value="Terminée">
                                </div>
                            </div>
                            <span class="text-danger" id="satatutError"></span>
                        </div> --}}
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="offset-xl-4 col-xl-8 mt-5">
                                <div class="btn-actions">
                                    <button type="button" onclick="updateData()"  class="btn-submit mb-2">Enregistrer</button>
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




