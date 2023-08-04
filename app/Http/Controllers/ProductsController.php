<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use Error;

class ProductsController extends Controller
{
  protected $model;

  public function __construct(Products $products)
  {
    $this->model = $products;
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Products::paginate(10);
    return view('pages/products/index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // dd('oi');
    return view('pages/products/create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductsRequest $request)
  {
    $this->model->create($request->all());
    return redirect(route('products.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $product = $this->model->find($id);
    if ($product) {
      return view('pages/products.show', compact('product'));
    }
    throw new Error('Produto não encontrado');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Products $products)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductsRequest $request, Products $products)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Products $products)
  {
    //
  }
}
