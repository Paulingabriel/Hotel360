










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
                <form action="" method="POST" name="form">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line salleSelect2" id="client_id" name="client_id" value="{{ old('client_id') }}">
                                    <option value="" selected>------------</option>
                                    @foreach ($clients as $client)

                                        <option value="{{$client->nom}}">{{$client->nom}}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger" id="clientError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Numero de salle</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line salleSelect2" id="salle_id" name="salle_id" value="{{ old('salle_id') }}" onchange="change(this.options[this.selectedIndex].value)">
                                </select>
                                <span class="text-danger" id="salleError"></span>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2 d-none">Date de réservation</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line d-none" id="dateres" name="dateres" value="{{ old('dateres') }}">
                                <span class="text-danger" id="dateresError"></span>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6 col-xl-5  mb-4">
                                <label for="date" class="label col-md-12 mb-2">Du</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datedebut" name="datedebut" value="{{ old('datedebut') }}" onchange="globaldebut(this.value)">
                                <span class="text-danger" id="datedebutError"></span>
                            </div>
                            <div class="col-md-6 col-xl-5  offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Au</label>
                                <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datefin" name="datefin" value="{{ old('datefin') }}" onchange="globalfin(this.value)">
                                <span class="text-danger" id="datefinError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prix">Prix</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="salles_pr_id" name="salles_pr_id" style="display: none;" disabled/>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prixtotal">Total</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="total" style="display: none;" disabled/>
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
<!-- Modal Edit -->

<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modalEdit">
        <div class="modal-content">
          <div class="container-lg bg-sucessborder-5">
  
              <div class="section-title">
                  <h4 class="border-bottom border-2">
                      Modifier une réservation de salle
                  </h4>
              </div>
  
              <div class="form-section mb-3">
                  <form action="" method="POST" name="formEdit">
                      @csrf
                          <div class="row">
                              <div class="col-md-6 col-xl-5 mb-4">
                                  <label for="date" class="label col-md-12 mb-2">Nom du client</label>
                                  <select class="border border-2 form-control form-select shadow-none form-control-line salleSelect2Edit" id="client_id" name="client_id">
                                      @foreach ($clients as $client)
  
                                          <option value="{{$client->nom}}">{{$client->nom}}</option>
  
                                      @endforeach
                                  </select>
                                  <span class="text-danger" id="clientError"></span>
                              </div>
                              <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                  <label for="date" class="label col-md-12 mb-2">Numero de salle</label>
                                  <select class="border border-2 form-control form-select shadow-none form-control-line salleSelect2Edit" id="editsalle_id" name="salle_id" onchange="editChange(this.options[this.selectedIndex].value)">
                                  </select>
                                  <span class="text-danger" id="salleError"></span>
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
                              <div class="col-md-6 col-xl-5  mb-4">
                                  <label for="date" class="label col-md-12 mb-2">Du</label>
                                  <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datedebutedit" name="datedebutedit" onchange="globaldebutedit(this.value)">
                                  <span class="text-danger" id="datedebutError"></span>
                              </div>
                              <div class="col-md-6 col-xl-5  offset-xl-2 mb-4">
                                  <label for="date" class="label col-md-12 mb-2">Au</label>
                                  <input type="date" class="border border-2 form-control ps-0 form-control-line" id="datefinedit" name="datefinedit" onchange="globalfinedit(this.value)">
                                  <span class="text-danger" id="datefinError"></span>
                              </div>
                          </div>
                          <div class="row">
                                <div class="col-md-6 col-xl-5 mb-4">
                                    <label for="date" class="label col-md-12 mb-2"  style="display: none;" id="editprix">Prix</label>
                                    <input type="text" class="border border-2 form-control shadow-none form-control-line" id="editsalles_pr_id" name="salles_pr_id" style="display: none;" disabled/>
                                </div>
                              <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2" style="display: none;" id="prixtotaledit">Total</label>
                                <input type="text" class="border border-2 form-control shadow-none form-control-line" id="totaledit" style="display: none;" disabled/>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 col-xl-5 mb-4">
                                  <label for="date" class="label col-md-12 mb-2">Mode de payement</label>
                                  <select class="border border-2 form-control form-select shadow-none form-control-line" id="payement" name="payement">
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
                              <span class="text-danger" id="statutError"></span>
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









