@extends('layouts.template')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Commandes en attente</h5>
                        <!-- Table for Pending Orders -->
                        <table class="table table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Utilisateur</th>
                                    <th scope="col">Produits commandés</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total commande</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($completedOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->nom }}<br><small>{{ $order->user->email }}</small></td>
                                        <td>
                                            <ul>
                                            @foreach ($order->produits as $produit)
                                                <li>
                                                    <strong>{{ $produit->nom_prod }}</strong><br>
                                                    Quantité : {{ $produit->pivot->qty }}<br>
                                                    Prix unitaire : {{ $produit->prix }} Fcfa<br>
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
                                                <select name="status" class="form-select" onchange="this.form.submit()">
                                                    <option value="En attente" {{ $order->status === 'En attente' ? 'selected' : '' }}>En attente</option>
                                                    <option value="Terminé" {{ $order->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                                    <option value="Annulé" {{ $order->status === 'Annulé' ? 'selected' : '' }}>Annulé</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucune commande terminée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
