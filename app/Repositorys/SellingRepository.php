<?php

namespace App\Repositorys;

use App\Repositorys\Interfaces\SellingRepositoryInterface;
use App\Models\Selling;
use App\Models\Storage;

class SellingRepository implements SellingRepositoryInterface
{
    public function selling($data)
    {
        $storage = Storage::query()->find($data->input('storage_id'));
        $count = $storage->count - $data->input('count');
        if ($count>=0) {
            $storage->update([
                'count'=>$count
            ]);
            $selling = Selling::create([
                'storage_id' => $data->input('storage_id'),
                'client_id' => $data->input('client_id'),
                'count' => $data->input('count'),
                'price' => $data->input('price'),
                'date' => date('Y-m-d H:i:s')
            ]);
            if ($selling)
                return true;
            else
                return false;
        }
    }
}
