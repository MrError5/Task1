@include('admin.layouts.header')
@include('admin.layouts.navbar')


  	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard</li>
	      </ol>
	    </section>



			<section class="content">
			@include('admin.layouts.message')
			@yield('content')


			</section>

	</div>


@include('admin.layouts.footer')
	