<?php


namespace App\Repositorys;
use App\Repositorys\Interfaces\StorageRepositoryInterface;
use App\Models\Storage;
use App\Models\Selling;


class StorageRepository implements StorageRepositoryInterface
{
    public function all($batches_id)
    {
        $all = Storage::where(['batches_id'=>$batches_id])->get();
        if (!$all)
            return false;
        return  $all;
    }
    public function buying($data)
    {
        Storage::create([
            'batches_id'=>$data->input('batches_id'),
            'product_id'=>$data->input('product_id'),
            'provider_id'=>$data->input('provider_id'),
            'count'=>$data->input('count'),
            'price'=>$data->input('price'),
            'date'=>date('Y-m-d H:i:s')
        ]);
        return true;
    }
    public function canculate($storage_id)
    {
        $selling = Selling::where(['storage_id'=>$storage_id])->first();
        $selling_price = $selling->count * $selling->price;
        $storage = Storage::find($storage_id);
        $storage_price = $storage->count * $storage->price;
        $total = $selling_price - $storage_price;
        return[
            'foyda'=>$total,
            'selling'=>[
                'count'=>$selling->count,
                'price'=>$selling->count*$selling->price,
            ],
        ];
    }
}
