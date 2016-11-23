@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header pull-left">User Edit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">
      {!! Form::model($user, ['route' => ['user.update', $user], 'data-toggle' => 'validator', 'method' =>'put'])!!}
        @include('admin.pages.users._form_edit', ['model' => $user])
      {!! Form::close() !!}
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop