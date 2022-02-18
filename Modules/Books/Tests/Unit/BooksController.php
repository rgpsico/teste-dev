<?php

namespace Modules\Books\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksController extends TestCase
{
    /**    
     *
     * @test
     * 
     */
    public function can_create_a_book()
    {
        $response = $this->json('POST', '/api/products', []);

        $response->assertStatus(300);
    }
}
