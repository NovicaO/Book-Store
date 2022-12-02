<div class="form-group">
    {!! Form::label('title','Enter title:') !!}
    {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('author_id','Publisher:') !!}
    {!! Form::select('author_id[]', $author,null, ['class'=>'form-control','required','multiple'=>'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id','Category:') !!}
    {!! Form::select('category_id', $categories,null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('publisher_id','Publisher:') !!}
    {!! Form::select('publisher_id', $publisher,null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('publish_date','Publish date:') !!}
    {{ Form::date('publish_date', null, ['class' => 'form-control','required']) }}
</div>
<div class="form-group">
    {!! Form::label('description','Description:') !!}
    {{ Form::textarea('description', null, ['class' => 'form-control','rows' => 5, 'cols' => 40,'required','style'=>'resize:none;']) }}
</div>
<div class="form-group">
    {!! Form::label('price','Price:') !!}
    {{ Form::number('price', null, ['class' => 'form-control','min'=>0,'required']) }}
</div>
<div class="form-group">
    {!! Form::label('items','Items:') !!}
    {{ Form::number('items', null, ['class' => 'form-control','min'=>1,'required']) }}
</div>
<div class="form-group">
    {!! Form::label('is_active','Active:') !!}
    {!! Form::select('is_active', ['1'=>'Yes','0'=>'No'],null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">

    {!! Form::file('image_path',['id'=>'image','onChange'=>'readURL(this)'])!!}
</div>
<div class="form-group" id="divUpload">
    @if(isset($book->image_path))
            <img src="{{asset($book->image_path)}}" class="img img-responsive img-rounded"
                 style="margin: 0 auto;width: 150px;height: 200px" onclick="removeImage(this)" id="uploaded_image"/>
    @endif

</div>
@if(isset($book->image_path))

    <div class="form-group">
        <a href="/administration/books/{{$book->id}}/removeImage" class="btn btn-danger btn-block">Set default
            image</a>
    </div>
@endif

<div class="form-group">
    {!! Form::submit($submitButton,['class'=>'btn btn-success btn-block']) !!}
</div>

