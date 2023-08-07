<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\ProductDetail;
use App\Models\Products;
use Error;

class ProductsController extends Controller
{
  protected $model;
  protected $detail;

  public function __construct(Products $products, ProductDetail $detail)
  {
    $this->model = $products;
    $this->detail = $detail;
  }

  public function index()
  {
    $products = Products::with('productDetail')->paginate(10);
    // dd(collect($products)); // pra ver o uso do paginate
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
    $product = $this->model->with('productDetail')->find($id);
    if ($product) {
      return view('pages/products.show', compact('product'));
    }
    throw new Error('Produto não encontrado');
  }

  public function edit($id)
  {
    if ($product = $this->model->with('productDetail')->find($id))
      return view('pages/products.edit', compact('product'));

    echo ('Produto não encontrado: ' . '"' . $id . '"');
  }


  public function update(UpdateProductsRequest $request, $id)
  {
    $data = $request->all();
    $product = $this->model->find($id);

    if (!$product) {
      echo ('Produto não encontrado: ' . '"' . $id . '"');
    }

    $product->update([
      'name' => $data['name'],
      'categories' => $data['categories'],
    ]);

    $productDetail = $product->productDetail;
    if (!$productDetail) {
      $productDetail = new ProductDetail([
        'products_id' => $id,
        'detail' => $data['description'],
      ]);
    } else {
      $productDetail->detail = $data['description'];
    }

    $productDetail->save();
    return redirect(route('products.show', ['id' => $id]));
  }


  public function destroy($id)
  {
    $product = $this->model->find($id);
    if (!$product)
      echo ('Produto não encontrado: ' . '"' . $id . '"');

    $product->delete($id);
    return redirect(route('products.index',));
  }
}
