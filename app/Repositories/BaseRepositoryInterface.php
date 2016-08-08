<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function paginate($limit);

    public function showById($id);

    public function create($data);

    public function all($filters = []);

    public function updateById($inputs, $id);

    public function deleteById($ids);

    public function search($term);

}
