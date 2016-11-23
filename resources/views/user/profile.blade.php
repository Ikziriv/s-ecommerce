@extends('layouts.master')

@section('title')
Profile
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

@include('partials.sidebar')

	<div class="col-md-offset-1 col-md-8 col-lg-6">
	 <div class="profile">
        <div class="col-sm-12">
            <div class="col-xs-12 col-sm-8">
                <h2>{{ Auth::user()->username }}</h2>
                <p><strong>My Order List : </strong></p>
            </div>             
        </div>          
        <div class="col-md-12 divider text-center">
            @forelse($purcashers as $purcasher)
            <div class="col-md-12 emphasis">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purcasher->cart->items as $item)
                                <!-- foreach ($purcasher->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>{{ $item['item']['title'] }}</td>
                                    <td class="text-center">{{ $item['qty'] }}</td>
                                    <td class="text-center"><i class="fa fa-usd" aria-hidden="true"></i> {{ $item['price'] }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-center"><i class="fa fa-usd" aria-hidden="true"></i> {{ $purcasher->cart->totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            @empty
            <div class="col-md-12 text-center">
              <h1>:(</h1>
              <p>We can't find what you're looking for.</p>
            </div> 
            @endforelse
        </div>
	 </div>                 
	</div>

@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop