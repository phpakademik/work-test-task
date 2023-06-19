<?php


namespace App\Repositorys;

use App\Models\Storage;
use App\Repositorys\Interfaces\RefoundRepositoryInterdace;
use App\Models\Refound;

class RefoundRepository implements RefoundRepositoryInterdace
{
    public function refound($data)
    {
        $storage = Storage::query()->find($data->input('storage_id'));
        $count = $storage->count + $data->input('count');
        if ($count>=0) {
            $storage->update([
                'count' => $count
            ]);
            Refound::create([
                'type' => $data->input('type'),
                'client_id'=>$data->input('client_id'),
                'storage_id' => $data->input('storage_id'),
                'comment'=>$data->input('comment'),
                'count' => $data->input('count'),
                'date' => date('Y-m-d H:i:s')
            ]);
            return true;
        }
    }
}
