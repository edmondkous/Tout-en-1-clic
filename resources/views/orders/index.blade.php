@extends('layouts.template')
@section('content')

<main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">La liste des commandes</h5>
              <div class="row mb-3">
                @if (Session::has('success_message'))
                    <script>
                        swal("Message", "{{ Session::get('success_message') }}", 'success', {
                            button: true,
                            button: "OK",
                            timer: 5000,
                        });
                    </script>
                @endif
                @if (Session::has('delete_message'))
                <script>
                    swal("Message", "{{ Session::get('delete_message') }}", 'error', {
                        button: true,
                        button: "OK",
                        timer: 5000,
                    });
                </script>
                @endif
              </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Produits commandés</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Total commande</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>

                <tbody>
                   @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->user->nom }} <br>
                                <small>{{ $order->user->email }}</small>
                            </td>
                            <td>
                                <ul>
                                @foreach ($order->produits as $produit)
                                    <li>
                                        <strong>{{ $produit->nom_prod }}</strong> <br>
                                        Quantité : {{ $produit->pivot->qty }} <br>
                                        Prix unitaire : {{ $produit->prix }} Fcfa <br>
                                        Sous-total : {{ $produit->prix * $produit->pivot->qty }}
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                 @php
                                     // Déterminer la classe de couleur basée sur le statut
                                     $badgeClass = match($order->status) {
                                         'En attente' => 'bg-info',   // bleu pour "En attente"
                                         'Terminé' => 'bg-success',       // Vert pour "Terminé"
                                         'Annulé' => 'bg-danger',         // Rouge pour "Annulé"
                                     };
                                 @endphp
                             <span class="badge {{ $badgeClass }}  fs-6 p-2 ">{{ $order->status }}</span>

                            </td>
                            <td>{{ $order->total }} Fcfa</td>
                            <td>
                                 <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                                     @csrf
                                     @method('PUT')
                                     <div class="input-group">
                                         <select name="status" class="form-select" onchange="this.form.submit()">
                                             <option value="En attente" {{ $order->status === 'En attente' ? 'selected' : '' }}>En attente</option>
                                             <option value="Terminé" {{ $order->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                             <option value="Annulé" {{ $order->status === 'Annulé' ? 'selected' : '' }}>Annulé</option>
                                         </select>
                                     </div>

                                 </form>
                            </td>
                        </tr>


                        @empty
                       <tr>
                           <td colspan="6">Aucune commande trouvée.</td>
                       </tr>
                   @endforelse
                </tbody>
              </table>

              <div>
                {{ $orders->links() }}
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->

@endsection
