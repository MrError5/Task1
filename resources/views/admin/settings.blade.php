@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>

   @push('js')
<script type="text/javascript">



  $(document).on('change','.status',function(){

    var status = $('.status option:selected').val();
    if (status == 'Enabled')
     {
      $('.reason').removeClass('hidden');
     }else
     {
      $('.reason').addClass('hidden');

     }
  });

</script>
   @endpush

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['route'=>'settings_post']) !!}

    <div class="form-group">
      {!! Form::label('site_name',trans('admin.site_name')) !!}
      {!! Form::text('site_name',setting()->site_name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('site_email',trans('admin.site_email')) !!}
      {!! Form::email('site_email',setting()->site_email,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('site_keywords',trans('admin.site_keywords')) !!}
      {!! Form::textarea('site_keywords',setting()->site_keywords,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('site_description',trans('admin.site_description')) !!}
      {!! Form::textarea('site_description',setting()->site_description,['class'=>'form-control']) !!}
    </div>

     <div class="form-group">
      {!! Form::label('maintenance',trans('admin.maintenance')) !!}
      {!! Form::select('maintenance',['Enabled'=>trans('admin.Enabled'),'Disabled'=>trans('admin.Disabled')],setting()->maintenance,['class'=>'form-control status']) !!}
    </div>
    <div class="form-group reason {{ setting()->status != 'refused'?'hidden':'' }}">
      {!! Form::label('maintenance_message',trans('admin.maintenance_message')) !!}
      {!! Form::textarea('maintenance_message',setting()->maintenance_message,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection