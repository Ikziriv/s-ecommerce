@extends('layouts.master')

@section('title')
Sign In
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login_box.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="col-md-offset-3">
                    <form action="{{ route('user.login') }}" method="post" data-toggle="validator" role="form">
                        <div class="form-group col-lg-12">
                            <legend>Sign In</legend>
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
                            <label for="username-email">E-mail / Username</label>
                            <input id="log" name="log" placeholder="E-mail / Username" type="text" class="form-control" data-error="Bruh, that username is not null" required/><div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Password</label>
                            <input id="password" name="password" placeholder="Password" type="password" class="form-control" data-error="Bruh, that password is wrong" required/><div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="checkbox">
                            <label>
                              <input id="memory" type="checkbox" name="memory" value="1"> Remember me
                            </label>
                          </div>
                        </div>
		  				{{ csrf_field() }}
                        <div class="form-group col-lg-12">
                            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Login" />
                        </div>
                        <div class="form-group col-lg-12">
                            <p class="text-center m-t-xs text-sm">Do not have an account?</p> 
                            <a href="{{ route('user.register') }}" class="btn btn-default btn-block m-t-md">Create an account</a>
                        </div>
                    </form>
                
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>


@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop