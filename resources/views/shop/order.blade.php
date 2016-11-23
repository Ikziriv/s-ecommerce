@extends('layouts.master')

@section('title')
Order
@endsection
@section('style')
@endsection

@section('content')

<div class="row">
    <div class="col-md-1">
    </div>
      <div class="col-md-6">
          <form action="{{ route('checkout') }}" method="post" class="form-horizontal" role="form">
          <fieldset>
            <h3><b>Order</b></h3>
            <h4><b>Your Total</b> <i class="fa fa-usd" aria-hidden="true"></i>{{ $total }}</h4>
            <hr/>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" id="address" name="address" placeholder="Address" class="form-control" required>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="email" placeholder="Email" class="form-control" required>
                </div>
              </div>


              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" placeholder="City" class="form-control" required>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-6">
                  <input type="text" placeholder="Phone #" class="form-control" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" placeholder="Post Code" class="form-control" required>
                </div>
              </div>

            <hr />
            <div class="form-group">
                <div class="col-sm-12">
                  <label for="cardNumber">Order With</label>
                  <div class="form-group">
                    <!-- Select Basic -->
                      <div class="col-md-12">
                        <select id="Country" name="Country" class="form-control">
                          <option>Select</option>
                          <option value="1">JNE</option>
                          <option value="2">TIKI</option>
                        </select>
                      </div>
                  </div>
                </div>
            </div> 
              {{ csrf_field() }}
              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-success btn-login-submit btn-block m-t-md">Order</button>
                </div>
                <div class="col-sm-6"><a href="{{ route('product.shoppingCart') }}">
                <button type="button" class="btn btn-default btn-login-submit btn-block m-t-md">Cancel</button></a>
                </div>
              </div>
            </fieldset>
          </form>

        
      </div>
  </div>
        
    
  
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop