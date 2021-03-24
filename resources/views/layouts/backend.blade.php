<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('backend/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('backend/plugins/pace/pace.min.js')}}"></script>
	<link href="{{asset('backend/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />

  <link href="{{asset('backend/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="{{url('/')}}" class="navbar-brand"><span class="navbar-logo"></span> <b>Papi Kost</b></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->

			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="dropdown mr-5">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<p>Coming Soon...</p>
					</ul>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{asset('backend/img/user/user-13.jpg')}}" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								{{auth::user()->name}}
								<small>
									@if (auth::user()->role == "User")
										Pencari Kosan
									@elseif(auth::user()->role == "Owner")
										Pemilik Kosan
									@endif
								</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
              <li>
								@if (auth::user()->role == "Owner")
									<a href="{{route('owner.index')}}"><i class="fa fa-user"></i> Profile</a>
								@elseif(auth::user()->role == "User")
									<a href="{{url('/home')}}"><i class="fa fa-user"></i> Profile</a>
								@endif
							</li>
              <li><a href="mailto:andridesmana@outlook.com"><i class="fa fa-pencil-alt"></i> Kirim Masukan</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> About</a></li>

							<li>
								<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<i class="fa fa-power-off"></i> Logout
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST">
									@csrf
								</form>
							</li>
            </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>

					<li class="{{ Request::is('home') ? 'active' : ''}}">
						<a href="{{url('/home')}}">
						    <i class="fa fa-home"></i>
						    <span>Dashboard<span class="label label-theme m-l-5">NEW</span></span>
						</a>
					</li>

					@if (auth::user()->role == "Pemilik")
						{{-- Menu Khusus Untuk Role Pemilik Kost --}}
						<li class="has-sub {{ Request::is('pemilik/kamar*') ? 'active' : ''}}">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-building"></i>
								<span>Kamar</span>
							</a>
							<ul class="sub-menu">
								<li class="{{ Request::is('pemilik/kamar') ? 'active' : ''}}"><a href="{{route('kamar.index')}}">Data Kamar</a></li>
								<li class="{{ Request::is('pemilik/kamar/create') ? 'active' : ''}}"><a href="{{route('kamar.create')}}">Tambah Kamar</a></li>
							</ul>
						</li>

						<li class="{{ Request::is('/home') ? 'active' : ''}}">
							<a href="">
								<i class="fas fa-users"></i>
								<span>Penghuni</span>
							</a>
						</li>

            <li class="{{ Request::is('/home') ? 'active' : ''}}">
							<a href="{{url('dokumentasi-rilis')}}">
								<i class="fas fa-info fa-fw"></i>
								<span>Dokumentasi</span>
							</a>
						</li>
						{{-- End --}}
					@elseif(auth::user()->role == "Pencari")
						{{-- Menu Khusus Untuk Role Pencari Kost --}}
							<li>
								<a href="{{url('my-room')}}">
									<i class="fa fa-th-large"></i>
									<span>Kamar Saya</span>
								</a>
							</li>
						{{-- End --}}
					@endif
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header">@yield('title_page')</h1>
			<!-- end page-header -->

			<!-- begin panel -->
			@yield('content')
			<!-- end panel -->
		</div>
		<!-- end #content -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('backend/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('backend/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('backend/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('backend/js/theme/default.min.js')}}"></script>
	<script src="{{asset('backend/js/apps.min.js')}}"></script>

	<script src="{{asset('backend/plugins/select2/dist/js/select2.min.js')}}"></script>

  	<script src="{{asset('backend/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('backend/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('backend/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('backend/js/demo/table-manage-default.demo.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->

	<script type="text/javascript">
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();

		});

		$(document).ready(function (){
        $("#select2").select2({
          allowClear:true,
          placeholder: 'Pilih Provinsi'
        });
    })
	</script>
	@yield('scripts')
</body>
</html>
