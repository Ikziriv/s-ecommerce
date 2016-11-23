@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
        {!! Form::open(['url' => 'user', 'method'=>'get', 'class'=>'form-inline']) !!}
            <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
              {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type Username']) !!}
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
                <td><strong>Roles</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Username</strong></td>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>
                  {!! Form::model($user, ['route' => ['user.destroy', $user], 'method' => 'delete', 'class' => 'form-inline delete_form_user'] ) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger delete-user-btn']) !!} |
                   <a href="{{ route('user.edit', $user->id)}}">Edit</a> 
                  {!! Form::close()!!}
                </td>
                <td><span class="label label-default">{{ $user->role->title }}</span></td>
                <td>{{ $user->email}}</td>
                <td><strong>{{ $user->username }}</strong></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $users->links() !!}
        </div>
        </div>
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop