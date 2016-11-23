@extends('layouts.master')

@section('title')
Shopping Cart
@endsection

@section('content')
@include('partials.header')

@include('partials.sidebar')

    <div class="col-md-4"><h3>Shopping Bags</h3>
    <hr></div>
    @if(Session::has('cart'))
    <div class="col-md-8">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
	  			@foreach($products as $product)
                <tr>
                    <td class="col-sm-8 col-md-6">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{ $product['item']['title'] }}</a></h4>
                            <h5 class="media-heading"> Description : <a href="#">Brand name</a></h5>
                        </div>
                    </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                    <span class="badge">{{ $product['qty'] }}</span>
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><i class="fa fa-usd" aria-hidden="true"></i> <strong>{{ $product['price'] }}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <div class="btn-group">
				          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				            Action <span class="caret"></span>
				          </button>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce By 1</a></li>
				            <li><a href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
				          </ul>
				        </div>
                    </td>
                </tr>
	    		@endforeach
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong><i class="fa fa-usd" aria-hidden="true"></i> {{ $totalPrice }}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td><a href="{{ route('product.index') }}">
                    <button type="button" class="btn btn-default">
                         Continue Shopping
                    </button></a></td>
{{--                     <td>
                    <a href="{{ route('order') }}">
                    <button type="button" class="btn btn-default">
                        Order
                    </button></a></td> --}}
                    <td>
                    <a href="{{ route('checkout') }}">
                    <button type="button" class="btn btn-success">
                        Checkout 
                    </button></a></td>
                </tr>
            </tbody>
			@else
		    <div class="row">
                <div class='col-md-3'></div>
                <div class="col-md-6">
                    <div class="col-md-offset-3">
		            <div class="">
		                <h1>
		                    Oops!</h1>
		                <div class="error-details">
		                    Sorry, an error has occured, No items in Cart!
		                </div>
		            </div>
                    </div>
                </div>
                <div class='col-md-3'></div>
			@endif
        </table>
    </div>


@endsection

@section('scripts')
<script type="text/javascript">
$('.ui.button').dropdown();
</script>
@endsection