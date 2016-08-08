<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function paginate($limit);

    public function showById($id = null);

    public function create($data);

    public function all($filters = []);

    public function updateById($inputs, $id);

    public function deleteById($ids);

    public function search($term);

    public function find($id);

}
