
















<!-- Modal Create -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="container-lg bg-sucessborder-5">

            <div class="section-title">
                <h4 class="border-bottom border-2"><i class="icon-user fs-1"></i>
                    Ajouter un Utilisateur
                </h4>
            </div>

            <div class="form-section mb-3">
                <form method="POST" action="{{ route('superadmin.users.store') }}">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4 col-xl-5">
                                <label for="date" class="label col-md-12 mb-2">Entrez le Nom:</label>
                                <input type="text" class="border border-2 form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="date" class="label col-md-12 mb-2">Entrez l'email:</label>
                                <input type="email" class="border border-2 form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-5">
                                <label for="date" class="label col-md-12 mb-2">Hotel</label>
                                <select class="border border-2 form-control form-select shadow-none form-control-line" name="hotel_id">
                                    @foreach ($hotels as $hotel)

                                        <option value="{{$hotel->id}}">{{$hotel->nom}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-xl-5 offset-xl-2 mb-4">
                                <label for="password" class="label col-md-12 mb-2">Mot de Passe:</label>
                                <input type="password" class="border border-2 form-control ps-0 form-control-line @error('password') is-invalid @enderror" name="password"  value="{{ old('password') }}">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
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





