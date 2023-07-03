
















<!-- Modal Create -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="container-lg bg-sucessborder-5">

            <div class="section-title">
                <h4 class="border-bottom border-2"><i class="las la-unlock-alt fs-1"></i>
                    Ajouter une Permission
                </h4>
            </div>

            <div class="form-section mb-3">
                <form method="POST" action="{{ route('superadmin.permissions.store') }}">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="date" class="label col-md-6 mb-2">Entrez le Nom:</label>
                                <input type="text" class="border border-2 form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-xl-4 col-xl-8 mt-3">
                                <div class="btn-actions">
                                    <button type="submit" class="btn-submit mb-2">Enregistrer</button>
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



  <!-- Button trigger modal -->

  
  


