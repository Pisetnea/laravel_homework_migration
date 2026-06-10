<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_creation_requires_name_and_desc(): void
    {
        $response = $this->postJson('/api/categories', [
            'name' => '',
            'desc' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonFragment(['message' => 'Validation failed'])
            ->assertJsonValidationErrors(['name']);
    }

    public function test_category_creation_rejects_duplicate_name(): void
    {
        Category::create([
            'name' => 'Existing Category',
            'desc' => 'Already stored',
            'is_active' => 'Active',
        ]);

        $response = $this->postJson('/api/categories', [
            'name' => 'Existing Category',
            'desc' => 'New description',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
