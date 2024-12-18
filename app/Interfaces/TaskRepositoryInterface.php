<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

    public function taskExistsInRedis(int $id);
}
