      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
              <div class="navbar-wrapper">
                  <div class="navbar-minimize">
                      <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                          <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                          <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                      </button>
                  </div>
                  <a class="navbar-brand" href="javascript:;">{{ Str::afterLast(Str::title(Request::path()), '/') }}</a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                  aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                  <form class="navbar-form">

                  </form>
                  <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">person</i>
                              <p class="d-lg-none d-md-block">
                                  Account
                                  <b class="caret"></b>
                              </p>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right collapse"
                              aria-labelledby="navbarDropdownProfile">

                              <a class="nav-link dropdown-item" style="width: 93% !important" href="/dashboard/profile">
                                  <i class="material-icons">person</i>
                                  <span class="sidebar-normal"> My Profile </span>
                              </a>
                              <form action="/logout" method="post">
                                  @csrf
                                  <button class="dropdown-item" style="width: 93% !important" type="submit"><i
                                          class="material-icons">logout</i>Logout</button>
                              </form>

                              <div class="dropdown-divider"></div>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- End Navbar -->
