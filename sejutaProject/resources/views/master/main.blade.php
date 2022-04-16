<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sejuta</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("template/dist/assets/css/bootstrap.css") }}">
    
<link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/app.css') }}">
    <link rel="shortcut icon" href=" {{ asset('template/dist/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/5.15.4/css/all.min.css"/>
    @yield('css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ url('home') }}" class='sidebar-link'>
                    <i class="bi bi-door-open"></i>
                    <span style="font-size: 25px">Sejuta -
                    @if(auth()->user()->id_level == "1")
Adm

                    @endif
                    @if(auth()->user()->id_level == "2")
Dtr

                    @endif


                </span>
                </a>
                {{-- <span style="font-size: 25px"> Sejuta</span> --}}
              
                {{-- <a href="{{ url('home') }}"><img src="{{ asset('template/dist/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a> --}}
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li
                class="sidebar-item @yield('active')">
                <a href="{{ url('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
        <li class="sidebar-item @yield('active3') ">
            <a href="{{ url('kategori') }}" class='sidebar-link'>
                <i class="bi bi-file-post"></i>
                <span>Kategori</span>
            </a>
            </li>
            <li class="sidebar-item @yield('active3') ">
                <a href="{{ url('barang') }}" class='sidebar-link'>
                    <i class="bi bi-inbox-fill"></i>
                    <span>Barang</span>
                </a>
                </li>
            
            <li
                class="sidebar-item  @yield('active4')">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Transaksi</span>
                </a>
                {{-- <ul class="submenu ">
                    <li class="submenu-item @yield('active4')">
                        <a href="{{ url('topup') }}">Top Up Saldo</a>
                    </li>
                    <li class="submenu-item @yield('active5')">
                        <a href="{{ url('bayar') }}">Bayar Pangkas</a>
                    </li>
                   
                </ul> --}}
            </li>

            @if(auth()->user()->id_level == "1")
            <li
            class="sidebar-item @yield('active1') ">
            <a href="{{ url('admin') }}" class='sidebar-link'>
                <i class="bi bi-person-lines-fill"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <li class="sidebar-item @yield('active2') ">
        <a href="{{ url('user') }}" class='sidebar-link'>
           
            <i class="bi bi-people-fill"></i>
            <span>Data User</span>
        </a>
        </li>
        @endif
            {{-- <li class="sidebar-item @yield('active3') ">
              
                <a class="dropdown-item sidebar-link" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                      <i class="bi bi-box-arrow-right"></i>
                                                       <span>Logout</span>
                                    </a>
                             

                                    <form id="logout-form" action="#" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li> --}}
                <li class="sidebar-item @yield('active3') ">
              
                    <a class="dropdown-item sidebar-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                          <i class="bi bi-box-arrow-right"></i>
                                                           <span>Logout</span>
                                        </a>
                                 
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                    </li>
           
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            @yield('page-heading')



            @yield('content')

    <script src="{{ asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    
<script src="{{ asset('template/dist/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('template/dist/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('template/dist/assets/js/mazer.js') }}"></script>

  

    <script src="assets/js/mazer.js"></script>
    @stack('scripts')
</body>



</html>
