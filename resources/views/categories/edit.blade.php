@extends('layouts.template')
@section('content')

<main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Modification de la catégorie</h5>


              <!-- General Form Elements -->
              <form action ="{{ route('categories.update', $categorie->id) }}" method = "put">

                @csrf
                @method('put')

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Catégorie</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_cat" value="{{ $categorie->nom_cat }}">
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



