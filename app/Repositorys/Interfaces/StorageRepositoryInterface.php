<?php

namespace App\Repositorys\Interfaces;

interface StorageRepositoryInterface{
    public function all($batches_id);
    public function buying($data);
    public function canculate($storage_id);
}
