<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Category;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithoutMiddleware;
    use DatabaseMigrations;

    public function testCategoryEditForm() {
      $this->withoutExceptionHandling();
      $category = factory(Category::class)->create();
      $oldName = $category->name;
      $oldDescription = $category->description;

      $response = $this->postJson('admin/category/'.$category->id.'/edit', [
        'name' => 'new name'
      ]);
      $response->assertStatus(200);
      dd(Category::find($category->id));
      $this->assertTrue(
        Category::find($category->id)->name == 'new name'

      );

    }
}
