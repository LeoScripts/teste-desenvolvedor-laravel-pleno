<?php

namespace Tests\Feature\Categories;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
  use RefreshDatabase;

  public function test_create_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $this->actingAs($user);
    $this->post(route('categories.store'), ['name' => 'categoria_teste']);
    $this->assertDatabaseHas('categories', ['name' => 'categoria_teste']);
  }

  public function test_update_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $this->actingAs($user);
    $category = Categories::factory()->create(['name' => 'categoria_teste']);
    $this->put("/categories/{$category->id}", [
      'name' => 'categoria_teste-editado',
    ]);

    $this->assertDatabaseHas('categories', [
      'id' => $category->id,
      'name' => 'categoria_teste-editado',
    ]);
  }

  public function test_delete_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $result = $this->actingAs($user)
      ->delete(route('categories.destroy', $user->id), [
        'password' => '123456'
      ]);

    $result->assertSessionHasNoErrors();
  }
}
