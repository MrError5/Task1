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
        <div class="row">
        		<div class="col-lg-3 col-xs-6">

				   <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>{{ $category_count }}</h3>

		              <p>Categories Count</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-list"></i>
		            </div>
		            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
		          </div>
				</div>
	      


	              {{-- <div class="row"> --}}
        		<div class="col-lg-3 col-xs-6">

				   <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>{{ $news_count }}</h3>

		              <p>News Count</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-newspaper-o"></i>
		            </div>
		            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
		          </div>
				</div>
	     {{--  </div> --}}
	     </div>

			</section>

	</div>


@include('admin.layouts.footer')
	