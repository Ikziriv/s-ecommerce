@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection
@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contact</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
      <div class="col-md-12">
        @foreach ($messages as $message)
        <div class="panel {!! $message->seen? 'panel-default' : 'panel-warning' !!}">
          <div class="panel-heading">
            <table class="table">
              <thead>
                <tr>
                  <th class="col-lg-1"></th>
                  <th class="col-lg-1">Seen</th>
                  <th class="col-lg-1">Date</th>
                  <th class="col-lg-1">Email</th>
                  <th class="col-lg-1">Name</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $message->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                  {!! Form::close() !!}
                  </td>
                  <td>{!! Form::checkbox('vu', $message->id, $message->seen) !!}</td>
                  <td>{{ $message->created_at }}</td>
                  <td>{{ $message->email }}</a></td>
                  <td class="text-primary"><strong>{{ $message->name }}</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="panel-body">
            {{ $message->text }}
          </div>
        </div>
      @endforeach
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $(function() {
      $(':checkbox').change(function() {
        $(this).parents('.panel').toggleClass('panel-warning').toggleClass('panel-default');
        $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: 'contact/' + this.value,
          type: 'PUT',
          data: "seen=" + this.checked + "&_token=" + token
        })
        .done(function() {
          $('.fa-spin').remove();
          $('input[type="checkbox"]:hidden').show();
        })
        .fail(function() {
          $('.fa-spin').remove();
          var chk = $('input[type="checkbox"]:hidden');
          chk.parents('.panel').toggleClass('panel-warning').toggleClass('panel-default');
          chk.show().prop('checked', chk.is(':checked') ? null:'checked');
          alert('Update fail.');
        });
      });
    });

</script>
@stop