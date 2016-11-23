@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header pull-left">Category Create</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">  
        {!! Form::open(['route' => 'categories.store'])!!}
          @include('admin.pages.categories._form')
        {!! Form::close() !!}
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop