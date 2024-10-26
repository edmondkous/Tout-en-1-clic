@extends('layouts.template')
@section('content')

<main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulaire pour enregistrer un produit</h5>
              <div class="row mb-3">
                @if (Session::has('success'))
                    <script>
                        swal("Message","{{ Session::get('success')}}",'success',{
                            button:true,
                            button:"OK",
                            timer:5000,
                        });
                    </script>
                @endif

                @if (Session::has('error'))
                    <script>
                        swal("Message","{{ Session::get('error')}}",'error',{
                            button:true,
                            button:"OK",
                            timer:5000,
                        });
                    </script>
                @endif
            </div>

              <!-- General Form Elements -->
              <form action="{{ route('produits.store') }}" enctype="multipart/form-data" method = "POST">

                @csrf
                @method('post')

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Désignation du produit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_prod">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="slug">
                    </div>
                  </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Catégorie</label>
                    <div class="col-sm-10">

                        <select name="categorie_id" id="categorie_id" class="form-control">
                            <option value=""></option>

                            @foreach ($categories as $categorie )
                            <option value="{{ $categorie->id }} ">{{ $categorie->nom_cat }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Marque</label>
                    <div class="col-sm-10">

                        <select name="marque_id" id="marque_id" class="form-control">
                            <option value=""></option>

                            @foreach ($marques as $marque )
                            <option value="{{ $marque->id }} ">{{ $marque->nom }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Prix Unitaire</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="prix">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Quantité en Stock</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="qty">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description" row="10"></textarea>
                    </div>
                  </div>

                  {{-- <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Staut</label>
                    <div class="col-sm-10">
                      <input type="checkbox" name="status">
                    </div>
                  </div> --}}
                  {{-- @if($produit->image)
                    <img class="default-img" src="{{asset('/storage/produits/'.$produit->image)}}" alt="#">
                  @endif --}}
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Définir l'image du produit</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image">
                    </div>
                  </div>



                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->



@endsection
