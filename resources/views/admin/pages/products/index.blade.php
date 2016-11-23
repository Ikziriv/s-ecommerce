@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
        {!! Form::open(['url' => 'products', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type name / model']) !!}
              {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
            </div>
            {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <td></td>
                <td><strong>Category</strong></td>
                <td><strong>Model</strong></td>
                <td><strong>Name</strong></td>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>
                  {!! Form::model($product, ['route' => ['products.destroy', $product], 'method' => 'delete', 'class' => 'form-inline delete_form_product'] ) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger delete-product-btn']) !!} |
                   <a href="{{ route('products.edit', $product->id)}}">Edit</a> 
                  {!! Form::close()!!}
                </td>
                <td>
                  @foreach ($product->categories as $category)
                    <span class="label label-primary">
                    <i class="fa fa-btn fa-tags"></i>
                    {{ $category->title }}</span>
                  @endforeach
                </td>
                <td>{{ $product->model}}</td>
                <td><strong>{{ $product->title }}</strong></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $products->links() !!}
        </div>
      </div>
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop