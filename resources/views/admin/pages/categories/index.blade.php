@extends('admin.layouts.admin')

@section('title')
Categories
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
        {!! Form::open(['url' => 'categories', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type category']) !!}
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
                <td><strong>Parent</strong></td>
                <td><strong>Title</strong></td>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>
                  {!! Form::model($category, ['route' => ['categories.destroy', $category], 'method' => 'delete', 'class' => 'form-inline delete_form_category'] ) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger delete-category-btn']) !!} |
                   <a href="{{ route('categories.edit', $category->id)}}">Edit</a> 
                  {!! Form::close()!!}
                </td>
                <td>{{ $category->parent ? $category->parent->title : '' }}</td>
                <td><strong>{{ $category->title }}</strong></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $categories->links() !!}
        </div>
      </div>
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop