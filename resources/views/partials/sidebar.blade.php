<div class="col-md-3 list-category text-info">
	<div class="list-group">
     {!! Form::open(['url' => 'shop', 'method'=>'get', 'class' => 'navbar-form']) !!}
	    <div class="form-group" style="display:inline;">
	      <div class="input-group">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Search']) !!}
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
	      </div>
          {!! Form::hidden('cat', isset($selected_category) ? $selected_category->id : '') !!}
          
	    </div>
     {!! Form::close() !!}
	</div>
{{-- 
	<h4 class="title">
	Category 
	</h4> --}}
      
	<div class="list-group">
		<a href="/shop" class="list-group-item">
			<div class="truncate text-center">
				All Products
			</div>
		</a>
        @foreach(App\Models\Category::all() as $category)
		<a href="{{ url('/shop?cat=' . $category->id)}}" class="list-group-item">
			<div class="truncate text-center">
				{{ $category->title }}
				<span class="pull-right"><strong>
				{{ $category->total_products > 0 ? $category->total_products  : ''}}</strong></span>
			</div>
		</a>
        @endforeach
	</div>
</div>