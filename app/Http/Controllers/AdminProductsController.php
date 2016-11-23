<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Flash;

class AdminProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $products = Product::where('title', 'LIKE', '%'.$q.'%')
            ->orWhere('model', 'LIKE', '%'.$q.'%')
            ->orderBy('title')->paginate(7);
        return view('admin.pages.products.index', compact('products', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // $data = $request->only('title', 'stock', 'size', 'price', 'description', 'model');
        // Replace any "/" with a space.
        $title =  str_replace("/", " " ,$request->input('title'));
        $product = Product::create([
            'title' => $title,
            'stock' => $request->input('stock'),
            'size' => $request->input('size'),
            'model' => $request->input('model'),
            'price' => $request->input('price'),
            'reduce_price' => $request->input('reduce_price'),
            'description' => $request->input('description'),
        ]);
        // Don't overcomplicate, just upload to public/img folder and log the file name
        // In the future, maybe we would do some processing like resize or crop it.
        if ($request->hasFile('photo')) {
            $product['photo'] = $this->savePhoto($request->file('photo'));
        }

        $product->save();
        $product->categories()->sync($request->get('category_lists'));

        // Flash a success message
        flash()->success('Success', 'Product created successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', '=', $id)->find($id);
        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductEditRequest $request)
    {
        $product = Product::findOrFail($id);        
        if (Auth::user()->status == 'customer') {
            // If user is a test user (id = 2),display message saying you cant delete if your a test user
            flash()->error('Error', 'Cannot edit Product because you are a customer.');
        } else {
            $data = $request->only(
                'title',
                'stock',
                'size',
                'model',
                'price',
                'reduce_price',
                'description'
            );

            if ($request->hasFile('photo')) {
                $data['photo'] = $this->savePhoto($request->file('photo'));
                // I'm not deleting old photo, as stub image file is used by multiple product.
            }

            $product->update($data);
            if (count($request->get('category_lists')) > 0) {
                $product->categories()->sync($request->get('category_lists'));
            } else {
                // no category set, detach all
                $product->categories()->detach();
            }

            flash()->success('Success', 'Product updated successfully');

        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        flash()->success('Success', 'Product deleted successfully');
        return redirect()->route('products.index');
    }

    /**
     * Move uploaded photo to public/img folder
     * @param  UploadedFile $photo
     * @return string
     */
    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
