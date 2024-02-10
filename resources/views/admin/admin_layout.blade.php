<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Star Admin2</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('Admin/src/assets/vendors/feather/feather.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('Admin/src/assets/vendors/mdi/css/materialdesignicons.min.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('Admin/src/assets/vendors/ti-icons/css/themify-icons.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('Admin/src/assets/vendors/typicons/typicons.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('Admin/src/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('Admin/src/assets/vendors/css/vendor.bundle.base.css') }}" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{ asset('Admin/src/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('Admin/src/assets/js/select.dataTables.min.css') }}"
    />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('Admin/src/assets/css/vertical-layout-light/style.css') }}" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('Admin/src/assets/images/favicon.png') }}" />
    <script>
        $(document).ready(function () {
          // Activate tooltip
          $('[data-toggle="tooltip"]').tooltip();

          // Select/Deselect checkboxes
          var checkbox = $('table tbody input[type="checkbox"]');
          $("#selectAll").click(function () {
            if (this.checked) {
              checkbox.each(function () {
                this.checked = true;
              });
            } else {
              checkbox.each(function () {
                this.checked = false;
              });
            }
          });
          checkbox.click(function () {
            if (!this.checked) {
              $("#selectAll").prop("checked", false);
            }
          });
        });
      </script>
      <script>
        $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
      </script>
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto"
      />
      <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      />
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
      />
      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>

  <body class="with-welcome-text">
    <div class="container-scroller">
      <nav
        class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row"
      >
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
        >
          <div class="me-3">
            <button
              class="navbar-toggler navbar-toggler align-self-center"
              type="button"
              data-bs-toggle="minimize"
            >
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="../index.html">
              <img src="../assets/images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="../index.html">
              <img src="../assets/images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">
                Good Morning, <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
              </h1>
              <h3 class="welcome-sub-text">
                Your performance summary this week
              </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="navbar">
                            <a   class="Login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="navbar">
                            <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="navbar">
                        <a  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


              </div>
            </li>
          </ul>
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-bs-toggle="offcanvas"
          >
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
        @endif

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href={{ route('index.Admin') }}>
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage Courses</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.doctor') }}"
                      >Doctor</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.Discount') }}"
                      >Discount</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.courses') }}"
                      >Courses</a
                    >
                  </li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage Video</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.video') }}">videos</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a
                  class="nav-link"
                  data-bs-toggle="collapse"
                  href="#ui-basic"
                  aria-expanded="false"
                  aria-controls="ui-basic"
                >
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">Manage web</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('benfit.index') }}">benefit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('qfa.index') }}">QFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('goal.index') }}">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('achievement.index') }}">Achievement</a>
                    </li>
                  </ul>
                </div>
              </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage Rating</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.rate') }}"
                      >Rating</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage Quastion</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.inquire') }}"
                      >Quastion</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage Order</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.orders') }}"
                      >Order</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul id="myDropdown" class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}"
                      >User</a
                    >
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session('success') }}
                </div>
            @endif
        </div>
            @yield('content')


    </div>








    <!-- plugins:js -->
    <script src="{{ asset('Admin/src/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('Admin/src/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('Admin/src/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/js/template.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/js/settings.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('Admin/src/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('Admin/src/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('Admin/src/assets/js/proBanner.js') }}"></script>
    <!-- <script src="../../assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>
