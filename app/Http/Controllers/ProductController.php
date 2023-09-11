<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('viewproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData =$request->validate([
            'name' => 'required|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|max:9999999.99',
            'quantity' => 'required|integer',
        ]);
        
        $products = Products::create($storeData);
        //return redirect('/products')->with('completed','Products Successfully added!');
        return redirect()->back()->with('success', 'Product has been added Successfully!');
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
        $product = Products::findOrFail($id);
        $selectedCategory = $product->category; 
        $categories = Categories::all();

        return view('editproduct', compact('product', 'categories','selectedCategory'));
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
        $updateData =$request->validate([
            'name' => 'required|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|max:9999999.99',
            'quantity' => 'required|integer',
        ]);
        Products::whereId($id)->update($updateData);
        return redirect('/products')->with('success','Products has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products =Products::findOrFail($id);
        $products->delete();
      //  return redirect('/products')->with('completed','Products has been deleted');  
        return redirect()->back()->with('success', 'Products has been deleted!');
     }
}
