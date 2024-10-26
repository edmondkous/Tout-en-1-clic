 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('client_dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav12" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav12" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{-- <li>
            <a href="{{route('marques.create')}}">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li> --}}
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Mes commandes</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('produits.create')}}">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="{{route('index.produits')}}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav --> --}}


    </ul>

  </aside><!-- End Sidebar-->
