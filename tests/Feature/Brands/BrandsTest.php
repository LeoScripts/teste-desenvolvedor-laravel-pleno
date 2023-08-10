<?php

namespace Tests\Feature\Brands;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandsTest extends TestCase
{
  use RefreshDatabase;

  public function test_create_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $this->actingAs($user);
    $this->post(route('brands.store'), ['name' => 'Marca_teste']);
    $this->assertDatabaseHas('brands', ['name' => 'Marca_teste']);
  }

  public function test_update_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $this->actingAs($user);
    $category = Brand::factory()->create(['name' => 'Marca_teste']);
    $this->put("/brands/{$category->id}", [
      'name' => 'Marca_teste-editado',
    ]);

    $this->assertDatabaseHas('brands', [
      'id' => $category->id,
      'name' => 'Marca_teste-editado',
    ]);
  }

  public function test_delete_category()
  {
    $user = User::factory()->create([
      'isAdmin' => 1
    ]);
    $result = $this->actingAs($user)
      ->delete(route('brands.destroy', $user->id), [
        'password' => '123456'
      ]);

    $result->assertSessionHasNoErrors();
  }
}
