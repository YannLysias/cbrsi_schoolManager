<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 ms-3  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">

      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/img/logoP.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">CEG 1 LOKOSSA</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @if (Auth::user()->role=="Super Administrateur")
            <li class="nav-item">
                <div class="nav-link text-white active bg-gradient-primary">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">dashboard</span>
            </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="/dashboard">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">dashboard</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role=="Directeur" || Auth::user()->role=="Censeur")
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'year-schools.index' ? 'active' : '' }}" href="/year-schools">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="nav-link-text ms-1">Anneé académique</span>
                </a>
            </li>
        @endif
        @if (Auth::user()->role=="Directeur" || Auth::user()->role=="Censeur" || Auth::user()->role=="Super Administrateur")
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'personnals.index' ? 'active' : '' }}" href="/personnals">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-users"></i>
                </div>
                <span class="nav-link-text ms-1">Personnels</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role=="Directeur" || Auth::user()->role=="Censeur")

            <li class="nav-item">
            <a class="nav-link text-white {{ Route::currentRouteName() == 'students.index' ? 'active' : '' }}" href="/students">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-user-graduate"></i>
                </div>
                <span class="nav-link-text ms-1">Elèves</span>
            </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'matieres.index' ? 'active' : '' }}" href="/matieres">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-graduate"></i>
                    </div>
                    <span class="nav-link-text ms-1">Matieres</span>
                </a>
                </li>

            <li class="nav-item">
            <a class="nav-link text-white {{ Route::currentRouteName() == 'salles.index' ? 'active' : '' }}" href="/salles">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-school"></i>
                </div>
                <span class="nav-link-text ms-1">Classe</span>
            </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/Emploidutemps.html">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-book-open"></i>
                  </div>
                  <span class="nav-link-text ms-1">Emploi du temps</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="/infoEcoles">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-book-open"></i>
                  </div>
                  <span class="nav-link-text ms-1">Information Ecole</span>
                </a>
              </li>ss

        @endif

        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1"></span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">

        <span class="btn bg-gradient-primary w-100"  type="button">2022/2023</span>
      </div>
    </div>
  </aside>
