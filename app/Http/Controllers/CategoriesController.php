<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Categories;
use Error;

class CategoriesController extends Controller
{
  protected $model;

  public function __construct(Categories $categories)
  {
    $this->model = $categories;
  }

  public function index()
  {
    $categories = Categories::paginate(10);
    return view('pages/categories/index', compact('categories'));
  }

  public function create()
  {
    return view('pages/categories/create');
  }

  public function store(StoreCategoriesRequest $request)
  {
    $this->model->create($request->all());
    return redirect(route('categories.index'));
  }

  public function show($id)
  {
    $category = $this->model->find($id);
    if ($category) {
      return view('pages/categories.show', compact('category'));
    }
    throw new Error('Categoria não encontrada');
  }

  public function edit($id)
  {
    if ($category = $this->model->find($id))
      return view('pages/categories.edit', compact('category'));

    echo ('Categoria não encontrada: ' . '"' . $id . '"');
  }

  public function update(UpdateCategoriesRequest $request, $id)
  {
    $data = $request->all();
    $category = $this->model->find($id);
    if (!$category)
      echo ('Categoria não encontrada: ' . '"' . $id . '"');

    $category->update($data);
    return redirect(route('categories.show', ['id' => $id]));
  }

  public function destroy($id)
  {
    $category = $this->model->find($id);
    // dd($id);
    if (!$category)
      echo ('Categoria não encontrada: ' . '"' . $id . '"');

    $category->delete($id);
    return redirect(route('categories.index',));
  }
}
