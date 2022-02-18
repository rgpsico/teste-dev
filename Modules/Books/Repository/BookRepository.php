<?php

namespace Modules\Books\Repository;

use Modules\Books\Entities\Books;
use Modules\Books\Repository\Contract\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    protected $modelClass = Books::class;

    public function getAll()
    {
        return $this->modelClass::with('category')->get();
    }


    public function  findByID($id)
    {
        return $this->modelClass::find($id);
    }

    public function  create($data)
    {

        return $this->modelClass::create($data);
    }

    public function  update($id, $data)
    {
        if ($this->modelClass::where('id', $id)->update($data)) {
            $result =  response()->json([
                'response' => 'Livro atualizado com successo'
            ]);
        }
        return $result;
    }

    public function  delete($id)
    {
        return $this->modelClass::destroy($id);
    }
}
