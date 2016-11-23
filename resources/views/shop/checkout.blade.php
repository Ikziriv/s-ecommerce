@extends('layouts.master')

@section('title')
Checkout
@endsection
@section('style')
@endsection

@section('content')

@include('partials.sidebar')

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-6">
		<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
		  {{ Session::get('error') }}
		</div>
          <form action="{{ route('checkout') }}" method="post" id="checkout-form" class="form-horizontal" data-toggle="validator" role="form">
          <fieldset>
          <h3><b>Checkout</b> <span class="label label-default"><i class="fa fa-usd" aria-hidden="true"></i> {{ $total }}</span></h3>
            <hr/>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" id="name" placeholder="Name" name="name" class="form-control" data-error="Bruh, that name is not null" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" id="address" placeholder="Address" name="address" class="form-control" data-error="Bruh, that address is not null" required>
                </div>
              </div>

            <img src="{{ asset('img/paypal.png') }}" class="img-rounded" alt="Cinque Terre" width="150" height="44">
            <hr />
            <div class="form-group">
                <div class="col-sm-12">
                  <label for="cardNumber">Card Holder Name</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="card-name" placeholder="Card Holder Name"
                          data-error="Bruh, that holder name is not null" required autofocus />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-12">
                  <label for="cardNumber">Card Number</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="card-number" placeholder="XXXX XXXX XXXX XXXX"
                          required autofocus />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                <div class="col-xs-7 col-md-7">
                    <div class="form-group">
                        <label for="expityMonth">Expiry Date</label>
                        <br />
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                            <input type="text" class="form-control" id="card-expiry-month" placeholder="MM" required />
                        </div>
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                            <input type="text" class="form-control" id="card-expiry-year" placeholder="YY" required /></div>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 pull-right">
                    <div class="form-group">
                        <label for="cvCode">CVC Code</label>
                        <input type="password" class="form-control" id="card-cvc" placeholder="XXX" required />
                    </div>
                </div>
                </div>
            </div>
              {{ csrf_field() }}

              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-6">
            		<button type="submit" class="btn btn-success btn-login-submit btn-block m-t-md">Buy</button>
                </div>
                <div class="col-sm-6"><a href="{{ route('product.shoppingCart') }}">
                	<button type="button" class="btn btn-default btn-login-submit btn-block m-t-md">Cancel</button></a>
                </div>
              </div>
            </fieldset>
          </form>

        
        </div>
    </div>
  </div>
        
    
  
@endsection

@section('scripts')

@stop