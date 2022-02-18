<?php

namespace Modules\Books\Http\Controllers\Api;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Books\Entities\Books;
use Modules\Books\Http\Requests\BookRequest;
use Modules\Books\service\Bookservice;
use Modules\Books\Transformers\BookResource;

class BooksController extends Controller
{
    private $service;


    public function __construct(Bookservice $service)
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
    public function store(BookRequest $request)
    {
        $books = $this->service->create($request->all());

        return response()->json(new BookResource($books), 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $books = $this->service->findByID($id);

        return response()->json(new BookResource($books));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $books = $this->service->findByID($id);

        if (!$books) {
            return response()->json([
                'response' => 'Livro não encontrado'
            ]);
        }

        return $this->service->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $books = Books::findOrFail($id);

        return response()->json([
            'id' => $this->service->delete($id)
        ]);
    }
}
