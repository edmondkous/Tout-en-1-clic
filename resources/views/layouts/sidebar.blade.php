 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Catégories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('categories.create')}}">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="{{route('categories.index')}}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Marques</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('marques.create')}}">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="{{route('marques.index')}}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
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
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav4" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('orders.attente')}}">
              <i class="bi bi-circle"></i><span>En attente</span>
            </a>
          </li>
          <li>
            <a href="{{route('orders.termine')}}">
              <i class="bi bi-circle"></i><span>Terminer</span>
            </a>
          </li>
          <li>
            <a href="{{route('orders.annule')}}">
              <i class="bi bi-circle"></i><span>Annuler</span>
            </a>
          </li>
          <li>
            <a href="{{route('orders.index')}}">
              <i class="bi bi-circle"></i><span>Tous</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


    </ul>

  </aside><!-- End Sidebar-->
