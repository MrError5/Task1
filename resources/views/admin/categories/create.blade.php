@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

{{ Form::open(['method'=>'POST','action'=>'CategoriesController@store']) }}

  <div class="form-group">
    {{ Form::label('name','Name:') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
  </div>

  




  <div class="form-group">
    {{ Form::submit('Create Category',['class'=>'btn btn-primary']) }}
  </div>


{{ Form::close() }}

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection