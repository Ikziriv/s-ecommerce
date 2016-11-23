@extends('layouts.master')

@section('title')
Sign Up
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login_box.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="col-md-offset-3">
                    <form action="{{ route('user.register') }}" method="post" data-toggle="validator" role="form">
                        <div class="form-group col-lg-12">
                            <legend>Sign Up</legend>
                        </div>
		  				@if(count($errors)>0)
	                        <div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								@foreach($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
		  				@endif
                        <div class="form-group col-lg-12">
                            <label for="username-email">Username</label>
                            <input id="email" name="username" placeholder="Username" type="text" class="form-control" data-error="Bruh, that username is not null" required/><div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="username-email">E-mail</label>
                            <input id="email" name="email" placeholder="E-mail" type="text" class="form-control" data-error="Bruh, that email address is invalid" required/><div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Password</label>
                            <input id="password" name="password" placeholder="Password" type="password" class="form-control" data-minlength="6" required/>
                            <div class="help-block">Minimum of 6 characters</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Confirm your password</label>
                            <input id="password" name="password_confirmation" placeholder="Confirm Password" type="password" class="form-control" data-match="#password" data-match-error="Whoops, these don't match" required/>
                        </div>
		  				{{ csrf_field() }}
                        <div class="form-group col-lg-12">
                            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Signup" />
                        </div>
                    </form>
                
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.ui.form')
  .form({
    fields : validationRules,
    inline : true,
    on     : 'blur'
  });
</script>
@stop