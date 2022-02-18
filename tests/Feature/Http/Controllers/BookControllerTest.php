<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Books;
use Illuminate\Support\Str;


use Tests\TestCase;

class BookControllerTest extends TestCase
{
    /**
     * 
     * @test
     */
    public function can_create_a_product()
    {
        $faker = Factory::create();
        $response = $this->json('POST', 'api/books', [
            'name' => $name = $faker->company,
            'slug' =>  Str::slug($name),
            'price' => $price = random_int(10, 1000)
        ]);
        \Log::info(1, [$response->getContent()]);

        $response->assertJsonStructure([
            'id', 'name', 'slug', 'price', 'created_at'
        ])
            ->assertJson([
                'name' => $name,
                'slug' => Str::slug($name),
                'price' => $price
            ])
            ->assertStatus(201);

        $this->assertDatabaseHas('Books', [
            'name' => $name,
            'slug' =>  Str::slug($name),
            'price' => $price
        ]);
    }

    /**
     * 
     * @test
     */
    public function will_fail_with_a_404_if_book_is_not_found()
    {
        $response = $this->json('GET', 'api/products/-1');
        $response->assertStatus(404);
    }

    /**
     * 
     * @test
     */
    public function can_return_a_product()
    {
        $books =  Books::factory()->create();

        $response = $this->json('GET', "api/books/$books->id");

        //status esperado
        $response->assertStatus(200)

            //estrututura do json esperada
            ->assertExactJson([
                'id' => $books->id,
                'name' => $books->name,
                'slug' => Str::slug($books->slug),
                'price' => $books->price,
                'created_at' =>  (string) $books->created_at
            ]);
    }
}
