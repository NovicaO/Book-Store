<div class="form-group">
    {!! Form::label('name','Enter name:') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_active','Active:') !!}
    {!! Form::select('is_active',['1'=>'active','0'=>'inactive'],null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_default','Default:') !!}
    {!! Form::select('is_default',['0'=>'No','1'=>'Yes'],null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_end_status','End status:') !!}
    {!! Form::select('is_end_status',['0'=>'No','1'=>'Yes'],null, ['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButton,['class'=>'btn btn-danger btn-block']) !!}
</div>