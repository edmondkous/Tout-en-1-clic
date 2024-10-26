@extends('layouts.template')
@section('content')

<main id="main" class="main">

    @if (Session::has('success'))
    <script>
        swal("Message","{{ Session::get('success')}}",'success',{
            button:true,
            button:"OK",
            timer:5000,
        });
    </script>
    @endif
    @if (Session::has('message_delete'))
    <script>
        swal("Message","{{ Session::get('message_delete')}}",'success',{
            button:true,
            button:"OK",
            timer:5000,
        });
    </script>
    @endif

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Qté en Stock</th>
                    <th scope="col">Actions</th>


                  </tr>
                </thead>

                 <tbody>
                   @forelse ($produits as $produit)

                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td><img src="{{asset('/storage/produits/'.$produit->image)}}" width="50" height="50"></td>
                                <td>{{ $produit->nom_prod }}</td>
                                <td>{{ $produit->categorie->nom_cat }}</td>
                                <td>{{ $produit->marque->nom }}</td>

                                <td>
                                    <span class="badge bg-info">{{ $produit->prix }}Fcfa</span>
                                </td>
                                <td>{{ $produit->qty }}</td>
                                <td>
                                    <a href="{{route('produits.edit',$produit->id)}}"><input type='button' class="btn btn-success" value="Modifier"></a>

                                    <a href="{{route('produits.delete',$produit->id)}}"><input type='button' class="btn btn-danger" value="Supprimer"></a>
                                </td>
                            </tr>

                            @empty

                            @endforelse
                </tbody>
              </table>

              <div>
                {{ $produits->links() }}
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


@endsection
