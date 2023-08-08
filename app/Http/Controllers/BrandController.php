<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Error;

class BrandController extends Controller
{
  protected $model;

  public function __construct(Brand $brands)
  {
    $this->model = $brands;
  }

  public function index()
  {
    $brands = Brand::paginate(10);
    return view('pages/brands/index', compact('brands'));
  }

  public function create()
  {
    return view('pages/brands/create');
  }

  public function store(StoreBrandRequest $request)
  {
    $this->model->create($request->all());
    return redirect(route('brands.index'));
  }

  public function show($id)
  {
    $brand = $this->model->find($id);
    if ($brand) {
      return view('pages/brands.show', compact('brand'));
    }
    throw new Error('Marca não encontrada');
  }

  public function edit($id)
  {
    if ($brand = $this->model->find($id))
      return view('pages/brands.edit', compact('brand'));

    echo ('Marca não encontrada: ' . '"' . $id . '"');
  }

  public function update(UpdateBrandRequest $request, $id)
  {
    $data = $request->all();
    $brand = $this->model->find($id);
    if (!$brand)
      echo ('Marca não encontrada: ' . '"' . $id . '"');

    $brand->update($data);
    return redirect(route('brands.show', ['id' => $id]));
  }

  public function destroy($id)
  {
    $brand = $this->model->find($id);
    if (!$brand)
      echo ('Marca não encontrada: ' . '"' . $id . '"');

    $brand->delete($id);
    return redirect(route('brands.index',));
  }
}
