@extends('layouts.master')

@section('title')
Contact
@endsection
@section('style')

@endsection

@section('content')

@include('partials.sidebar')

<div class="row">
    <div class='col-md-3'></div>
    <div class="col-md-6">
        <div class="col-md-offset-3">
        
    		<form role="form" id="contact-form" class="contact-form" method="post" action="{{ route('contact.store') }}">
            <legend>Contact</legend>
            <div class="row">
              <div class="col-md-12">
                  <p>Have a question or comment ? Fill out the following information and we will get back to you as soon as possible.</p>
              </div>
              <div class="col-md-6">
            		<div class="form-group">
                  <label for="name" class="control-label">Name</label>
                  <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Name">
            		</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email" class="control-label">E-mail</label>
                  <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail">
                </div>
              </div>
            </div>
          	<div class="row">
          		<div class="col-md-12">
            		<div class="form-group">
                  <label for="message" class="control-label">Message</label>
                  <textarea class="form-control textarea" rows="13" cols="50" name="message" id="Message" rows="5" placeholder="Message"></textarea>
            		</div>
            	</div>
            </div>
            {{ csrf_field() }}
            <div class="row">
            <div class="col-md-12">
            <button type="submit" class="btn main-btn pull-right">Send a message</button>
            </div>
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