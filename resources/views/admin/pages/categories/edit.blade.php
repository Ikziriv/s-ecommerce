@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header pull-left">Category Edit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">
        {!! Form::model($category, ['route' => ['categories.update', $category], 'method' =>'patch'])!!}
          @include('admin.pages.categories._form', ['model' => $category])
        {!! Form::close() !!}
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop