<div class="col-sm-6 col-md-6">
  <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
       <label>Username</label>
       <input type="text" class="form-control" name="username" data-error="Bruh, that username is not null" required>                        
       @if($errors->has('username'))
          <span class="help-block">{{ $errors->first('username') }}</span>
      @endif
  </div>
</div>

<div class="col-sm-6 col-md-6">
  <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
       <label>Email</label>
       <input type="text" class="form-control" name="email" data-error="Bruh, that email is not null" required>                        
       @if($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}</span>
      @endif
  </div>
</div>

<div class="col-sm-6 col-md-6">
  <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
       <label>Password</label>
       <input type="password" class="form-control" name="password" data-error="Bruh, that password is not null" required>                        
       @if($errors->has('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
      @endif
  </div>
</div>

<div class="col-sm-6 col-md-6">
  <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
       <label>Password Confrim</label>
       <input type="password" class="form-control" name="password_confirmation" data-error="Bruh, that password is not null" required>                        
       @if($errors->has('password_confirmation'))
          <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
      @endif
  </div>
</div>

<div class="col-sm-12 col-md-12">
  <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
    {!! Form::label('role', 'Role') !!}
    {!! Form::select('role', $select, null, ['class'=>'form-control']) !!}
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="col-sm-12 col-md-12">
{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
</div>
