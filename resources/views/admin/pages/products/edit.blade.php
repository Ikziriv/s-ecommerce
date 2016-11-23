@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12"> 
        <h1 class="page-header pull-left">Products Edit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">
{{--             <form role="form" method="POST" action="{{ route('products.update', $product->id) }}">
              @include('admin.pages.products._form_edit', ['model' => $product])
            </form> --}}
        {!! Form::model($product, ['route' => ['products.update', $product], 'method' =>'patch', 'data-toggle' => 'validator', 'files' => true])!!}
			     @include('admin.pages.products._form_edit', ['model' => $product])
        {!! Form::close() !!}
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop