@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Purcasher</h1>
        {!! Form::open(['url' => 'purcasher', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type purcasher name']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>
          {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    @foreach($purcashers as $purcasher)
    <div class="col-xs-12">
    <div class="invoice-title">
      <h2 class="pull-left">Invoice</h2><h3 class="pull-right">Order # {{ $purcasher->id }}</h3>
    </div>
    <div class="row">
      <div class="col-xs-12 text-left">
        <address class="pull-left">
        <strong>Billed To : {{ $purcasher->name }}</strong><br>
        <strong>ID User : {{ $purcasher->user_id }}</strong><br>
        <strong>Address : {{ $purcasher->address }}</strong>
        </address>
      </div>
{{--       <div class="col-xs-12 text-left">
        <address class="pull-left">
          <strong>Payment ID:</strong><br>
          {{ $purcasher->payment_id }}<br>
          <strong>Order Date:</strong><br>
          {{ $purcasher->created_at }}<br><br>
        </address>
      </div> --}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><strong>Order summary</strong></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-condensed">
            <thead>
                <tr>
                  <td class="text-center"><strong>Price</strong></td>
                  <td class="text-center"><strong>Quantity</strong></td>
                  <td><strong>Item</strong></td>
                </tr>
            </thead>
            <tbody>
              @foreach($purcasher->cart->items as $item)
              <!-- foreach ($order->lineItems as $line) or some such thing here -->
              <tr>
                <td class="text-center">{{ $item['price'] }} <i class="fa fa-usd" aria-hidden="true"></i></td>
                <td class="text-center">{{ $item['qty'] }}</td>
                <td>{{ $item['item']['title'] }}</td>
              </tr>
              @endforeach
               <tr>
                  <td class="no-line text-center">{{ $purcasher->cart->totalPrice }} <i class="fa fa-usd" aria-hidden="true"></i></td>
                  <td class="no-line text-center"><strong>Total</strong></td>
                  <td class="no-line"></td>
               </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{!! $purcashers->links() !!}

@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop