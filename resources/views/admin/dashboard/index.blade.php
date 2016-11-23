@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection
@section('style')
<style type="text/css" media="screen">

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">    
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('categories.index') }}" class="dashboard-block">
        <div class="rotate">
            <i class="fa fa-tag fa-5x"></i>
        </div>
        <div class="details">
          <span class="title">Categories Detail</span>
          <span class="sub">7</span>
        </div><!--/details-->
        <i class="fa fa-chevron-right fa-2x more"></i>
      </a><!--/dashboard-block1-->
    </div>
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('products.index') }}" class="dashboard-block">
        <div class="rotate">
            <i class="fa fa-gift fa-5x"></i>
        </div>
        <div class="details">
          <span class="title">Products Detail</span>
          <span class="sub">17</span>
        </div><!--/details-->
        <i class="fa fa-chevron-right fa-2x more"></i>
      </a><!--/dashboard-block1-->
    </div>
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('purcasher.index') }}" class="dashboard-block">
        <div class="rotate">
           <i class="fa fa-money fa-5x"></i>
        </div>
        <div class="details">
          <span class="title">Purchasers Detail</span>
          <span class="sub">7</span>
        </div><!--/details-->
        <i class="fa fa-chevron-right fa-2x more"></i>
      </a><!--/dashboard-block1-->
    </div>
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('user.index') }}" class="dashboard-block">
        <div class="rotate">
            <i class="fa fa-user fa-5x"></i>
        </div>
        <div class="details">
          <span class="title">Users Detail</span>
          <span class="sub">17</span>
        </div><!--/details-->
        <i class="fa fa-chevron-right fa-2x more"></i>
      </a><!--/dashboard-block1-->
    </div>
	
    <div class="col-md-12">
		<div class="panel-body">
		{!! $chart->render() !!}
		</div>
    </div>
  {{--   <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tag fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('categories.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-gift fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('products.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('purcasher.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> --}}
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@stop