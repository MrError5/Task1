@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">


<ul class="nav nav-tabs">

    <li><a data-toggle="tab" href="#Category_search">{{ trans('admin.Category_search') }} <i class="fa fa-list">({{ $cat_count }})</i></a></li>
    <li><a data-toggle="tab" href="#News_search">{{ trans('admin.News_search') }} <i class="fa fa-list">({{ $news_count }})</i></a></li>

  </ul>

  <div class="tab-content">



        <div id="Category_search" class="tab-pane fade in active">
          <h3>{{ trans('admin.Category_search') }}</h3>

 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
{{--       <th scope="col">Created At</th>
      <th scope="col">Updated At</th> --}}
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Show</th>

    </tr>
  </thead>
  <tbody>

@foreach($category_search as $cat)


    <tr>
<th>{{ $cat->id }}</th>

<th>{{ $cat->name }}</th>


{{-- <th>{{ $cat->created_at->diffForHumans() }}</th>
<th>{{ $cat->updated_at->diffForHumans() }}</th> --}}
<th><a href="{{ route('categories.edit',$cat->id) }}">Edit</a></th>
<th>


{!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $cat->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>'himan']) !!}

    <a href="#" onclick="$(this).closest('form').submit();">Delete</a>

{!! Form::close() !!}


</th>
<th><a href="{{ route('categories.show',$cat->id) }}">Show</a></th>


    </tr>
@endforeach



  </tbody>
</table>
        </div>

                <div id="News_search" class="tab-pane fade in active">
          <h3>{{ trans('admin.News_search') }}</h3>



 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
{{--       <th scope="col">Created At</th>
      <th scope="col">Updated At</th> --}}
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Show</th>

    </tr>
  </thead>
  <tbody>

@foreach($news_search as $news)


    <tr>
<th>{{ $news->id }}</th>

<th>{{ $news->news_title }}</th>


{{-- <th>{{ $cat->created_at->diffForHumans() }}</th>
<th>{{ $cat->updated_at->diffForHumans() }}</th> --}}
<th><a href="{{ route('news.edit',$news->id) }}">Edit</a></th>
<th>



{!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $news->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>'himan']) !!}

    <a href="#" onclick="$(this).closest('form').submit();">Delete</a>

{!! Form::close() !!}


</th>
<th><a href="{{ route('news.show',$news->id) }}">Show</a></th>


    </tr>
@endforeach



  </tbody>
</table>



        </div>



  
   


  </div>

    </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
    