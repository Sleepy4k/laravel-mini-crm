<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('companies')? 'active' : ''}}" aria-current="page" href="/companies">
            <span data-feather="layers" class="align-text-bottom"></span>
            Perusahaan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('employees*')? 'active' : ''}}" href="/employees">
            <span data-feather="users" class="align-text-bottom"></span>
            Pegawai
          </a>
        </li>
      </ul>
    </div>
  </nav>