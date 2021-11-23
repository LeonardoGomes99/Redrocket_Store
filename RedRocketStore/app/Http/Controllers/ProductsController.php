<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductsController extends Controller
{
    public function __construct(Products $Products)
    {
        $this->Products = $Products;
    }

    public function createProduct(){
        return view('create_product');
    }

    public function storeProduct(Request $request){
        $this->Products->name = $request->nome;
        $this->Products->description = $request->desc;
        $this->Products->quantity = $request->qnt;
        $this->Products->model = $request->model;
        $this->Products->serial_number = $request->serial;
        $this->Products->color = $request->cor;
        $this->Products->save();
        return response()->json(['message' => '/dashboard'], 200);

    }

    public function productsAll(){
        $products = $this->Products::all();
        return view('products', [
            'productsData' => $products,
        ]);

    }
    

    public function edit(Request $request){

        $productEdit = $this->Products->where('id', $request->id)->get();
        return view('edit_product', [
            'productsData' => $productEdit,
        ]);   
    }

    public function editStore(Request $request){
        $this->Products
        ->where('id', $request->id)
        ->update(
            [
            'name' =>  $request->nome,
            'description' =>  $request->desc,
            'quantity' =>  $request->qnt,
            'model' =>  $request->model,
            'serial_number' =>  $request->serial,
            'color' =>  $request->cor
            ]);
        return response()->json(['message' => '/products'], 200);


                
    }

    public function removeProduct(Request $request){
        $this->Products->where('id', $request->id)->delete();
        return response()->json(['message' => '/dashboard'], 200);
    }
}