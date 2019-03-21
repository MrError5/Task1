@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>



  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['route'=>'profile_post']) !!}

    <div class="form-group">
      {!! Form::label('name',trans('admin.name')) !!}
      {!! Form::text('name',user_profile()->name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password',trans('admin.password')) !!}
      {!! Form::password('password',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('password_confirmation',trans('admin.password_confirmation')) !!}
      {!! Form::password('password_confirmation',null,['class'=>'form-control']) !!}
    </div>
    
    {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection