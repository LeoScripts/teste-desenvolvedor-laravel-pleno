<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Brand;
use App\Models\ProductDetail;
use App\Models\Products;
use App\Models\Categories;
use Error;

class ProductsController extends Controller
{
  protected $model;
  protected $detail;
  protected $categories;
  protected $brands;

  public function __construct(Products $products, ProductDetail $detail, Categories $categories, Brand $brands)
  {
    $this->model = $products;
    $this->detail = $detail;
    $this->categories = $categories;
    $this->brands = $brands;
  }

  public function index()
  {
    $products = $this->model
      ->with('productDetail')
      ->with('category')
      ->paginate(10);
    // dd(collect($products)); // pra ver o uso do paginate

    $brands = $this->brands->all();
    return view('pages/products/index', compact('products', 'brands'));
  }

  public function create()
  {
    $categories = $this->categories->all();
    $brands = $this->brands->all();
    return view('pages/products/create', compact('categories', 'brands'));
  }

  public function store(StoreProductsRequest $request)
  {
    $data = $request->all();
    $newProduct = $this->model->create([
      'name' => $data['name'],
      'brands_id' => $data['brands_id']
    ]);

    $product = $this->model->with('category')->find($newProduct->id);
    if (isset($data['categoryId'])) {
      $product->category()->attach([$data['categoryId']]);
      return redirect(route('products.index'));
    }
    return redirect(route('products.index'));
  }

  public function show($id)
  {
    $product = $this->model
      ->with('productDetail')
      ->with('category')
      ->find($id);
    $brands = $this->brands->all();
    // dd($brands);
    if ($product) {
      return view('pages/products.show', compact('product', 'brands'));
    }
    throw new Error('Produto não encontrado');
  }

  public function edit($id)
  {
    $product = $this->model
      ->with('productDetail')
      ->with('category')
      ->find($id);

    $categories = $this->categories->all();
    $brands = $this->brands->all();

    if ($product)
      return view('pages/products.edit', compact('product', 'categories', 'brands'));

    echo ('Produto não encontrado: ' . '"' . $id . '"');
  }

  public function update(UpdateProductsRequest $request, $id)
  {
    $data = $request->all();
    // dd($data);
    $product = $this->model->with('category')->find($id);
    $categoriesAll = $this->categories->all();

    if (!$product) {
      echo ('Produto não encontrado: ' . '"' . $id . '"');
    }

    $product->update([
      'name' => $data['name'],
      'brands_id' => $data['brands_id']
    ]);

    $productDetail = $product->productDetail;
    if (!$productDetail) {
      $productDetail = $this->detail->createOrUpdate([
        'products_id' => $id,
        'detail' => $data['description'] || '',
      ]);
    }

    $productDetail->detail = $data['description'];

    if (isset($data['categoryId'])) {
      $product->category()->sync([$data['categoryId']]);
      //depois vou usar o attach para fazer a aplicação de muito para muitos na tela
      // ou outra ideia
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
