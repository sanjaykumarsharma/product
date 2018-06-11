<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category = Category::sortBy('category')->paginate(5);
        $category = Category::orderBy('category')->paginate(2);
        //$category = DB::table('categories')->orderBy('category')->paginate(2);

        return view('category.index', ['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category' => 'required|unique:categories',
        ]);

        $category = Category::create([
            'category' => $request->input('category'),
        ]);

        if($category){
            return redirect()->route('category.index')
                            ->with('Success', 'Category created Successfully');
        }

        return back()->withInput()->with('Error', 'Error creating new category');
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
        $category = Category::find($id);

        return view('category.edit', ['category'=>$category]);
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
        $validateData = $request->validate([
            'category' => 'required|unique:categories',
        ]);

        $updateCategory = Category::where('id',$id)
                                        ->update([
                                            'category' => $request->input('category'),
                                        ]);

        if($updateCategory){
            return redirect()->route('category.index')->with('success', 'category updated successfully');
        }

        return back()->withInput()->with('error', 'error updating category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if($category->delete()){
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }

        return back()->withInput()->with('error', 'category can not be deleted');
    }
}
