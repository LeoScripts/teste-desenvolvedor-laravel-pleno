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

  public function index()
  {
    $products = Products::paginate(10);
    return view('pages/products/index', compact('products'));
  }

  public function create()
  {
    return view('pages/products/create');
  }

  public function store(StoreProductsRequest $request)
  {
    $this->model->create($request->all());
    return redirect(route('products.index'));
  }

  public function show($id)
  {
    $product = $this->model->find($id);
    if ($product) {
      return view('pages/products.show', compact('product'));
    }
    throw new Error('Produto não encontrado');
  }

  public function edit($id)
  {
    if ($product = $this->model->find($id))
      return view('pages/products.edit', compact('product'));

    echo ('Produto não encontrado: ' . '"' . $id . '"');
  }

  public function update(UpdateProductsRequest $request, $id = 5)
  {
    $data = $request->all();
    $product = $this->model->find($id);
    // dd($id);
    if (!$product)
      echo ('Produto não encontrado: ' . '"' . $id . '"');


    $product->update($data);
    return redirect(route('products.show', ['id' => $id]));
  }

  public function destroy($id)
  {
    $product = $this->model->find($id);
    // dd($id);
    if (!$product)
      echo ('Produto não encontrado: ' . '"' . $id . '"');


    $product->delete($id);
    return redirect(route('products.index',));
  }
}
