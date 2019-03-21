@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Show</th>

    </tr>
  </thead>
  <tbody>

@foreach($newses as $news)


    <tr>
<th>{{ $news->id }}</th>

<th>{{ $news->news_title }}</th>


<th>{{ $news->created_at->diffForHumans() }}</th>
<th>{{ $news->updated_at->diffForHumans() }}</th>
<th><a href="{{ route('news.edit',$news->id) }}">Edit</a></th>
<th>


 {{--  <a href="{{ route('categories.destroy',['id'=>$category->id]) }}">Delete

    {{ method_field('DELETE') }}
  </a> --}}

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
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection