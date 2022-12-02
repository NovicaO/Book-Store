<div class="form-group">
    {!! Form::label('name','Enter name:') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('symbol','Enter symbol:') !!}
    {!! Form::text('symbol',null,['class'=>'form-control','placeholder'=>'Enter symbol','required'=>'true','maxlength'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_default','Default:') !!}
    {!! Form::select('is_default',['0'=>'NO','1'=>'YES'],null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButton,['class'=>'btn btn-danger btn-block']) !!}
</div>