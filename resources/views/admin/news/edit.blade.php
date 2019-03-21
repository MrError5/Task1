@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

{{ Form::open(['method'=>'Put','files'=>true,'action'=>['NewsController@update',$news->id]]) }}

<div class="row">
  <div class="col-lg-4">

  <div class="form-group">
    {{ Form::label('news_title','News Title:') }}
    {{ Form::text('news_title',$news->news_title,['class'=>'form-control']) }}
  </div>
</div>
  <div class="col-lg-4">

      <div class="form-group">
      {!! Form::label('main_photo',trans('admin.main_photo')) !!}
      {!! Form::file('main_photo',['class'=>'form-control']) !!}
      @if(!empty($news->main_photo))
       <img src="{{ Storage::url($news->main_photo) }}" style="width:50px;height: 50px;" />
      @endif
    </div>
</div>

  <div class="col-lg-4">

     <div class="form-group">
        {!! Form::label('category_id',trans('admin.category_id')) !!}
        {!! Form::select('category_id',App\Category::pluck('name','id'),$news->category_id,['class'=>'form-control']) !!}
     </div>
</div>



</div>
<div class="row">
  <div class="col-lg-12">

    <div class="form-group">
      {!! Form::label('news_content',trans('admin.news_content')) !!}
      {!! Form::textarea('news_content',$news->news_content,['class'=>'form-control']) !!}
    </div>
  </div>
</div>

  <div class="dropzone" id="dropzonefileupload">
     
    </div>

{{-- <div class="row">
  <div class="col-lg-12">
 --}}
 @push('js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script type="text/javascript">
  Dropzone.autoDiscover = false;
  $(document).ready(function(){

            $('#dropzonefileupload').dropzone({

          url:'{{ url('upload/image/'.$news->id) }}',
          paraName:'files[]',
          uploadMaltiple:true,
          maxFiles:15,
          maxFilessize:3,
          acceptedFiles:'image/*',
          dictDefaultMessage:'select photos for news',
          dictRemoveFile:'{{ trans('admin.delete') }}',
          params:{
            _token:'{{ csrf_token() }}'
          },
          addRemoveLinks:true,
          removedfile:function(file)
          {
              // alert(file.fid);
              $.ajax({

                dataType:'json',
                type:'post',
                url:'{{ url('delete/image') }}',
                data:{_token:'{{ csrf_token() }}',id:file.fid}

              });

              var fmock;
              return (fmock = file.previewElement) != null ?fmock.parentNode.removeChild(file.previewElement):void 0;
          },
          init:function(){
            @foreach($news->files()->get() as $file)
            var mock = {name:'{{ $file->name }}',size:'{{ $file->size }}',fid:'{{ $file->id }}',type:'{{ $file->mime_type }}'}; 
              this.emit('addedfile',mock);
              this.options.thumbnail.call(this,mock,'{{ url('storage/'.$file->full_file) }}');

            @endforeach
          }
        });

  });

</script>

@endpush

{{-- <div class="row">
  <div class="col-lg-12 form-group">

  
</div>
</div>  --}}
{{--   </div>
</div>
 --}}





  <div class="form-group">
    {{ Form::submit('Edit Post',['class'=>'btn btn-primary']) }}
  </div>


{{ Form::close() }}

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection