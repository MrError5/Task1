@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

{{ Form::open(['method'=>'get','action'=>['CategoriesController@show',$category->id]]) }}

  <div class="form-group">
    {{ Form::label('name','Name:') }}
    {{ Form::text('name',$category->name,['class'=>'form-control','disabled']) }}
  </div>

  




{{--   <div class="form-group">
    {{ Form::submit('Create Post',['class'=>'btn btn-primary']) }}
  </div>
 --}}

{{ Form::close() }}

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection