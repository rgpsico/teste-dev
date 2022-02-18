<?php

namespace Modules\Books\Http\Controllers\Api;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Books\Entities\Books;
use Modules\Books\Entities\Category;
use Modules\Books\Http\Requests\BookRequest;
use Modules\Books\Transformers\BookResource;

class CategoriaController extends Controller
{
    private $service;


    public function __construct(Category $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $books = $this->service->getAll();

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $data = ['name' => 'roger'];

        $books = Category::create($data);

        return response()->json('foi', 201);
    }
}
