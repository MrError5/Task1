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

@foreach($categories as $category)


    <tr>
<th>{{ $category->id }}</th>

<th>{{ $category->name }}</th>


<th>{{ $category->created_at->diffForHumans() }}</th>
<th>{{ $category->updated_at->diffForHumans() }}</th>
<th><a href="{{ route('categories.edit',$category->id) }}">Edit</a></th>
<th>


 {{--  <a href="{{ route('categories.destroy',['id'=>$category->id]) }}">Delete

    {{ method_field('DELETE') }}
  </a> --}}

{!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>'himan']) !!}

    <a href="#" onclick="$(this).closest('form').submit();">Delete</a>

{!! Form::close() !!}


</th>
<th><a href="{{ route('categories.show',$category->id) }}">Show</a></th>


    </tr>
@endforeach



  </tbody>
</table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection