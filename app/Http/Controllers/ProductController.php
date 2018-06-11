<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id')->paginate(2);

        return view('product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sort();
        return view('product.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:products',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $img_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $img_name);
        //$this->postImage->add($input);

        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'product_name' => $request->input('product_name'),
            'slug' => $request->input('slug'),
            'image' => $img_name,
            'description' => $request->input('description'),
        ]);

        if($product){
            return redirect()->route('product.index')
                            ->with('Success', 'Product created Successfully');
        }

        return back()->withInput()->with('Error', 'Error creating new product');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('product.edit', ['product'=>$product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'slug' => 'required|unique:products',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);

        if($request->file('image')){
            $product = Product::find($id);
            $image = $request->file('image');
            $img_name = $product->image;
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $img_name);
        }


        $updateProduct = Product::where('id',$id)
                                        ->update([
                                            'category_id' => $request->input('category_id'),
                                            'product_name' => $request->input('product_name'),
                                            'slug' => $request->input('slug'),
                                            'description' => $request->input('description'),
                                        ]);

        if($updateProduct){
            return redirect()->route('product.index')->with('success', 'product updated successfully');
        }

        return back()->withInput()->with('error', 'error updating product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->delete()){
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        }

        return back()->withInput()->with('error', 'product can not be deleted');
    }
}
