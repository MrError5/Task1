@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

{{ Form::open(['method'=>'Put','action'=>['CategoriesController@update',$category->id]]) }}

  <div class="form-group">
    {{ Form::label('name','Name:') }}
    {{ Form::text('name',$category->name,['class'=>'form-control']) }}
  </div>

  




  <div class="form-group">
    {{ Form::submit('Edit Category',['class'=>'btn btn-primary']) }}
  </div>


{{ Form::close() }}

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection