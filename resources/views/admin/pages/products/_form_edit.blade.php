<div class="col-sm-6 col-md-6">
  <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
	     <label>Title</label>
	     <input type="text" class="form-control" name="title" value="{{ $product->title }}" placeholder="Add New Product" required>                        
	     @if($errors->has('title'))
	        <span class="help-block">{{ $errors->first('title') }}</span>
	    @endif
	  </div>
	</div>

	<div class="col-sm-6 col-md-6">
	  <div class="form-group {!! $errors->has('stock') ? 'has-error' : '' !!}">
	     <label>Stock</label>
	     <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" placeholder="Add Product Quantity" required>                        
	     @if($errors->has('stock'))
	        <span class="help-block">{{ $errors->first('stock') }}</span>
	    @endif
	  </div>
	</div>

	<div class="col-sm-6 col-md-6">
	  <div class="form-group {!! $errors->has('size') ? 'has-error' : '' !!}">
	     <label>Size</label>
	     <input type="text" class="form-control" name="size" value="{{ $product->size }}" placeholder="Size Product" required>                        
	     @if($errors->has('size'))
	        <span class="help-block">{{ $errors->first('size') }}</span>
	    @endif
	  </div>
	</div>

	<div class="col-sm-6 col-md-6">
	  <div class="form-group {!! $errors->has('model') ? 'has-error' : '' !!}">
	     <label>Model</label>
	     <input type="text" class="form-control" name="model" value="{{ $product->model }}" placeholder="New Model Product" required>                        
	     @if($errors->has('model'))
	        <span class="help-block">{{ $errors->first('model') }}</span>
	    @endif
	  </div>
	</div>

	<div class="col-sm-6 col-md-6">
	<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
	     <label>Price</label>
	     <div class="input-group">
	       <div class="input-group-addon"><i class="fa fa-usd"></i></div>
	       <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Product Price" required>   
	     </div>                         
	     @if($errors->has('price'))
	        <span class="help-block">{{ $errors->first('price') }}</span>
	    @endif
	</div>
	</div>

	<div class="col-sm-6 col-md-6">
	<div class="form-group {!! $errors->has('reduce_price') ? 'has-error' : '' !!}">
	     <label>Reduce Price</label>
	     <div class="input-group">
	       <div class="input-group-addon"><i class="fa fa-usd"></i></div>
	       <input type="text" class="form-control" name="reduce_price" value="{{ $product->reduce_price }}" placeholder="Reduce Product" required>   
	     </div>                     
	     @if($errors->has('reduce_price'))
	        <span class="help-block">{{ $errors->first('reduce_price') }}</span>
	    @endif
	</div>
	</div>

	<div class="col-sm-12 col-md-12">
	  <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
	     <label>Description</label>
	      <textarea id="description" class="form-control" name="description" required>
	          {{ $product->description }}
	      </textarea>
	      @if($errors->has('description'))
	          <span class="help-block">{{ $errors->first('description') }}</span>
	      @endif
	  </div>
	</div>

	<div class="col-sm-12 col-md-12">
	  <div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
	     <label>Categories</label>
	    {{-- Simplify things, no need to implement ajax for now --}}
	    {!! Form::select('category_lists[]', [''=>'']+App\Models\Category::lists('title','id')->all(), null, ['class'=>'form-control js-selectize-multiple', 'multiple', 'required']) !!}

	    {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
	  </div>
	</div>

	<div class="col-sm-12 col-md-12">
	  <div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
	     <label>Product photo / jpeg,png</label>
	    {!! Form::file('photo') !!}
	    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}

	    @if (isset($model) && $model->photo !== '')
	    <div class="row">
	      <div class="col-md-6">
	        <p>Current photo</p>
	        <div class="thumbnail">
	          <img src="{{ url('/img/' . $model->photo) }}" class="img-rounded">
	        </div>
	      </div>
	    </div>
	    @endif
	  </div>
	</div>

	<div class="col-sm-12 col-md-12">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
	</div>