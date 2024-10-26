@extends('layouts.template')
@section('content')

<main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulaire pour enregistrer une catégorie</h5>
            <div class="row mb-3">
                @if (Session::has('success_message'))
                    <script>
                        swal("Message","{{ Session::get('success_message')}}",'success',{
                            button:true,
                            button:"OK",
                            timer:5000,


                        });
                    </script>
                @endif
            </div>

              <!-- General Form Elements -->
              <form action ="{{ route('categories.store') }}" method = "POST">

                @csrf
                @method('post')

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Catégorie</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_cat" value="{{old('nom_cat')}}">
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
