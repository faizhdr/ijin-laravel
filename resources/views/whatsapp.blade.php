<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Server Whatsapp</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
	<div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        	<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="#" class="app-brand-link">
                        <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="logo"
                            style="max-width: 150px">
                        {{-- <span class="app-brand-text menu-text fw-bolder fs-3 ms-2">Perizinan</span> --}}
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Dashboard</span>
                    </li>

                    <li class="menu-item {{ $menuDashboard ?? '' }}">
                        <a href="{{ route('main.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home"></i>
                            <div data-i18n="Account Settings">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>

                    <li class="menu-item {{ $menuPost ?? '' }}">
                        <a href="{{ route('posts.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-pin"></i>
                            <div data-i18n="Account Settings">Perizinan</div>
                        </a>
                    </li>

                </ul>
            </aside>
            <!-- / Menu -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <!-- User -->

                            <li>
                                <div>
                                    <span class="align-middle fs-5">Status Server WhatsApp</span>
                                </div>
                                {{-- <a class="dropdown-item" href="auth-login-basic.html">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a> --}}
                            </li>
                            {{-- <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form onsubmit="return confirm('are you sure?')"
                                            action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </button>
                                        </form> --}}
                            {{-- <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a> --}}
                            {{-- </li>
                                </ul> --}}
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                	<div class="container-xxl flex-grow-1 container-p-y">
				        <div class="row">
				            <div class="col-md-12">
				                <div class="card">
				                	<div class="card-header">
				                		<h3 class="card-title" id="title"></h3>
				                	</div>
				                    <div class="card-body">
				                    	<center>
				                    		<img id="qr" class="img-thumbnail">
				                    	</center>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
	<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

    @stack('scriptjs')
    <script type="text/javascript">
    	$("#title").html("Loading...")
        $("#qr").attr("src","https://i.gifer.com/ZKZg.gif")
        const ws = new WebSocket("ws://203.194.114.235:8080");
        ws.addEventListener("open", () =>{
          console.log("We are connected");
        });
        ws.addEventListener('message', function (event) {
          console.log(event.data.toString())
          var json = JSON.parse(event.data.toString());
          if (json.action == "qrcode") {
            $("#title").html("QRCODE")
            $("#qr").attr("src",json.qrCode)
          }else if(json.action == "ready"){
            $("#title").html("Terhubung")
            $("#qr").attr("src","")
          }else{
            $("#status").html("Loading...")
            $("#qr").attr("src","https://i.gifer.com/ZKZg.gif")
          }
          console.log(event.data.toString());
        })
        ws.addEventListener("close", () =>{
          console.log("Close");
        });
    </script>
</body>
</html>