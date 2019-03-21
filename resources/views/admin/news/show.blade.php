@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

{{ Form::open(['method'=>'get','action'=>['CategoriesController@show',$news->id]]) }}

<div class="row">
  <div class="col-lg-4">

  <div class="form-group">
    {{ Form::label('news_title','News Title:') }}
    {{ Form::text('news_title',$news->news_title,['class'=>'form-control','disabled']) }}
  </div>
</div>
  <div class="col-lg-4">

      <div class="form-group">
      {!! Form::label('main_photo',trans('admin.main_photo')) !!}
      {{-- {!! Form::file('main_photo',['class'=>'form-control','disabled']) !!} --}}
      @if(!empty($news->main_photo))
       <img src="{{ Storage::url($news->main_photo) }}" style="width:50px;height: 50px;" />
      @endif
    </div>
</div>

  <div class="col-lg-4">

     <div class="form-group">
        {!! Form::label('category_id',trans('admin.category_id')) !!}
        {!! Form::select('category_id',App\Category::pluck('name','id'),$news->category_id,['class'=>'form-control','disabled']) !!}
     </div>
</div>






</div>
<div class="row">
  <div class="col-lg-12">

    <div class="form-group">
      {!! Form::label('news_content',trans('admin.news_content')) !!}
      {!! Form::textarea('news_content',$news->news_content,['class'=>'form-control','disabled']) !!}
    </div>




  </div>
</div>



<div class="row">
  <div class="col-lg-12">
     <div class="form-group">
      {!! Form::label('news_file',trans('admin.news_file')) !!}

 @foreach($news->files()->get() as $file)

  <img src="{{ Storage::url($file->full_file) }}" style="width:80px;height: 80px;" />
            @endforeach

</div>

</div>
</div>


{{--   <div class="form-group">
    {{ Form::submit('Edit Post',['class'=>'btn btn-primary']) }}
  </div>


 --}}
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