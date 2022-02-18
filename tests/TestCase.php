<?php

namespace Tests;

use Database\Factories\BoockFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Books\Entities\Books;
use Modules\Books\Transformers\BookResource;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create(string $model, array $attribute = [])
    {
        $books = $model::factory(5)->create($attribute);

        return new BookResource($books);
    }
}
