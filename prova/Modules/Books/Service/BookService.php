<?php

namespace Modules\Books\Service;

use Modules\Books\Repository\BookRepository;

class BookService
{

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }


    public function  findByID($id)
    {
        return $this->repository->findByID($id);
    }

    public function  create($data)
    {
        return $this->repository->create($data);
    }

    public function  update($id, $data)
    {

        return $this->repository->update($id, $data);
    }

    public function  delete($id)
    {
        return $this->repository->delete($id);
    }
}
