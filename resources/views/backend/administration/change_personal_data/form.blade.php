<div class="form-group">
    {!! Form::label('name','Enter name:') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','Enter email:') !!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('old_password','Enter old password:') !!}
    {!! Form::password('old_password', ['class' => 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('password','Enter password:') !!}
    {!! Form::password('password', ['class' => 'form-control'])!!}
</div>
<div class="form-group">
    {{ Form::label('password_confirmation', 'Password confirmation') }}
    {{ Form::password('password_confirmation',['class'=>'form-control']) }}
</div>

<div class="form-group">
    {!! Form::submit($submitButton,['class'=>'btn btn-danger btn-block']) !!}
</div>