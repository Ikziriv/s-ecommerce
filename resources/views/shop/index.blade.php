@extends('layouts.master')

@section('title')
JUKO.com
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cart_slider.css') }}">
@endsection

@section('content')

@include('partials.sidebar')
		
@if(Session::has('success'))
<div class="row">
    <div class='col-md-3'></div>
    <div class="col-md-6">
        <div class="col-md-offset-3">
        <div id="charge-message" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        </div>
    </div>
    <div class='col-md-3'></div>
</div>
@endif
<div class="col-md-9">
{{--     <div class="row carousel-holder">

        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

    </div> --}}

    <div class="row">
        <div class="col-md-12"><h3>Category : {{ isset($selected_category) ? $selected_category->title : 'All'}}</h3><hr></div>
		@forelse($products as $product)	
	    <div class="col-md-4 col-md-4 col-md-4">
	        <div class="col-item">
	            <div class="photo">
	                <img src="{{ $product->photo_path }}" class="img-responsive" alt="a" />
	            </div>
	            <div class="info">
	                <div class="row">
	                    <div class="price col-md-12">
                            <div class="col-md-12">
    	                        <h4>{{ $product->title }}</h4>
                            </div>

                            <div class="col-md-6">
                              <p>Category
                                @foreach ($product->categories as $category)
                                  <a href="{{ url('/shop?cat=' . $category->id)}}">
                                    <br><i class="fa fa-btn fa-tags"></i>
                                    {{ $category->title }}
                                  </a>
                                @endforeach
                              </p>
                            </div>
	                        <h5 class="price-text-color">
                                @if($product->reduce_price == 0)
                                    Price : <i class="fa fa-usd" aria-hidden="true"></i> {{  $product->price }}
                                @else
                                <div class="col-md-6">
                                    <div class="text-danger list-price"><s>
                                       Price : <i class="fa fa-usd" aria-hidden="true"></i> {{ $product->price }}</s>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Price : <i class="fa fa-usd" aria-hidden="true"></i> {{ $product->reduce_price }}
                                </div>
                                @endif
                            </h5>
{{--                             <p>Model: {{ $product->model }}</p>
	                        <h5><p>{{ $product->description }}</p></h5> --}}
	                    </div>
	                </div>
                    @if(session('status') == 'customer' || session('status') == 'visitor')
	                <div class="separator clear-left">
	                    <p class="btn-add">
	                        <i class="fa fa-shopping-cart"></i><a href="{{ route('product.addToCart', ['id' => $product->id])}}" class="hidden-sm">Add to cart</a></p>
	                    <p class="btn-details">
	                        <i class="fa fa-list"></i><a href="#" class="hidden-sm" data-toggle="modal" data-target="#detailModal">More details</a></p>
	                </div>
                    @endif
	                <div class="clearfix">
	                </div>
	            </div>
	        </div>
	    </div>   
        @empty
        <div class="col-md-12 text-center">
          <h1>:(</h1>
          <p>We can't find what you're looking for.</p>
        </div>  
		@endforelse                
    </div>


    <div class="pull-right">{!! $products->links() !!}</div>

    <!-- Modal -->
    <div id="detailModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tentang Aplikasi</h4>
          </div>
          <div class="modal-body">
            <p>JUKO.com merupakan aplikasi penjualan e-commerce online</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection