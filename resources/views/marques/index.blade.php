@extends('layouts.template')
@section('content')

<main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">La liste des marques</h5>
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
                @if (Session::has('delete_message'))
                <script>
                    swal("Message","{{ Session::get('delete_message')}}",'error',{
                        button:true,
                        button:"OK",
                        timer:5000,

                    });
                </script>
            @endif
            </div>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Actions</th>


                  </tr>
                </thead>

                <tbody>
                   @forelse ($marques as $marque)

                            <tr>
                                <td>{{ $marque->id }}</td>
                                <td>{{ $marque->nom }}</td>

                                <td>
                                    <a href="{{route('marques.edit',$marque->id)}}"><input type='button' class="btn btn-success" value="Modifier"></a>

                                    <a href="{{route('marques.delete',$marque->id)}}"><input type='button' class="btn btn-danger" value="Supprimer"></a>
                                </td>
                            </tr>

                            @empty

                            @endforelse
                </tbody>
              </table>

              <div>
                {{ $marques->links() }}
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


@endsection
