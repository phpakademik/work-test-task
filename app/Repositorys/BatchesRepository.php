<?php


namespace App\Repositorys;
use App\Repositorys\Interfaces\BatchesRepositoryInterface;
use App\Models\Batches;

class BatchesRepository implements  BatchesRepositoryInterface
{
    public function add($data)
    {
        $created = Batches::create([
            'provider_id'=>$data->input('provider_id'),
            'total_count'=>$data->input('total_count'),
            'total_price'=>$data->input('total_price'),
            'date'=>date('Y-m-d H:i:s')
        ]);
        if ($created)
            return true;
        else
            return  false;
    }
}
