@extends('layouts.template')

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des catégories</h5>
                        <div class="row mb-3">
                            <!-- Affichage de messages de session -->
                        </div>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->nom_cat }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
