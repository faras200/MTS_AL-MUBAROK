<div class="sidebar" data-color="green" data-background-color="black">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="sidebar-wrapper" style="height: 700px !important">
        <div class="user">
            <div class="photo">
                <img src="/assetsadmin/img/faces/marc.jpg" />
            </div>
            <div class="user-info">
                <a class="username">
                    <span>
                        Dashboard Sistem
                    </span>
                </a>
                {{-- <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        Admin {{ auth()->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a> --}}

                {{-- <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/profile">
                                <i class="material-icons">person</i>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                    </ul>
                </div> --}}

            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            @can('role', ['admin'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">group</i>
                        <p> Administrator
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item {{ Request::is('dashboard/admin') ? 'active' : '' }}">
                                <a class="nav-link" href="/dashboard/admin">
                                    <i class="material-icons">person</i>
                                    <p> Admin </p>
                                </a>
                            </li>
                            <li class="nav-item  {{ Request::is('dashboard/panitia') ? 'active' : '' }} ">
                                <a class="nav-link" href="/dashboard/panitia">
                                    <i class="material-icons">supervised_user_circle</i>
                                    <p> Panitia</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item {{ Request::is('dashboard/ormawa*') ? 'active' : '' }} ">
                    <a class="nav-link" href="/dashboard/ormawa">
                        <i class="material-icons">security</i>
                        <p> Ormawa </p>
                    </a>
                </li> --}}
            @endcan
            @canany('role', ['panitia', 'admin'])
                <li class="nav-item {{ Request::is('dashboard/siswa*') ? 'active' : '' }} ">
                    <a class="nav-link" href="/dashboard/siswa">
                        <i class="material-icons">security</i>
                        <p> Siswa</p>
                    </a>
                </li>
            @endcan
            {{-- <li class="nav-item {{ Request::is('dashboard/pengajuan*') ? 'active' : '' }} ">
                <a class="nav-link" href="/dashboard/pengajuan">
                    <i class="material-icons">post_add</i>
                    <p> Pengajuan </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/ambil-dana*') ? 'active' : '' }} ">
                <a class="nav-link" href="/dashboard/ambil-dana">
                    <i class="material-icons">request_quote</i>
                    <p>Pengambilan Dana </p>
                </a>
            </li> --}}
            {{-- @canany('role', ['admin'])
                <li class="nav-item {{ Request::is('dashboard/arsip-pengajuan*') ? 'active' : '' }} ">
                    <a class="nav-link" href="/dashboard/arsip-pengajuan">
                        <i class="material-icons">description</i>
                        <p>Arsip Pengajuan </p>
                    </a>
                </li>
            @endcanany --}}
            <li class="nav-item {{ Request::is('dashboard/ppdb*') ? 'active' : '' }} ">
                <a class="nav-link" href="/dashboard/ppdb">
                    <i class="material-icons">description</i>
                    <p>PPDB</p>
                </a>
            </li>
            @can('role', ['admin', 'panitia'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#konten">
                        <i class="material-icons">dashboard_customize</i>
                        <p> Kelola Konten
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="konten">
                        <ul class="nav">
                            @canany('role', ['panitia'])
                                <li class="nav-item {{ Request::is('dashboard/posts*') ? 'active' : '' }} ">
                                    <a class="nav-link" href="/dashboard/posts">
                                        <i class="material-icons">assignment</i>
                                        <p> My Posts </p>
                                    </a>
                                </li>
                            @endcanany
                            @canany('role', ['admin'])
                                <li class="nav-item {{ Request::is('dashboard/categories*') ? 'active' : '' }} ">
                                    <a class="nav-link" href="/dashboard/categories">
                                        <i class="material-icons">book</i>
                                        <p> Categories </p>
                                    </a>
                                </li>
                            @endcanany
                            <li class="nav-item {{ Request::is('dashboard/media*') ? 'active' : '' }} ">
                                <a class="nav-link" href="/dashboard/media">
                                    <i class="material-icons">image</i>
                                    <p> Media </p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('dashboard/arsip-file*') ? 'active' : '' }} ">
                                <a class="nav-link" href="/dashboard/arsip-file">
                                    <i class="material-icons">folder</i>
                                    <p>Arsip File </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            <li class="nav-item ">
                <a class="nav-link" href="/home">
                    <i class="material-icons">home</i>
                    <p> Home </p>
                </a>
            </li>
        </ul>
    </div>
</div>
