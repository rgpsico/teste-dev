<?php

namespace Modules\Books\Repository\Contract;


interface BookRepositoryInterface
{
    public function getAll();
    public function findByID(int $id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete(int $id);
}
