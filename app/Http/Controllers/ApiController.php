<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellingRequest;
use App\Http\Requests\BuyingRequest;
use App\Http\Requests\RefoundRequest;
use App\Http\Requests\CanculateRequest;
use App\Repositorys\BatchesRepository;
use App\Repositorys\StorageRepository;
use App\Repositorys\SellingRepository;
use App\Repositorys\RefoundRepository;

class ApiController extends Controller
{
    private $batches;
    private $storage;
    private $selling;
    private $refound;
    public function __construct()
    {
        $this->batches = new BatchesRepository();
        $this->storage = new StorageRepository();
        $this->selling = new SellingRepository();
        $this->refound = new RefoundRepository();
    }
    /**
     * @OA\Get(
     * path="/api/products/{batches_id}",
     * summary="Products",
     * description="Bu joydan Productlarni olasiz",
     * operationId="Products",
     * tags={"Api"},
     * @OA\Parameter(name="batches_id", in="path", description="bu yerga batches_id ni kiriting", required=true,
     *        @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function products($batches_id)
    {
        $all = $this->storage->all($batches_id);
        if (!$all)
            return response(['message'=>'not found products'],404);
        return $all;
    }
    /**
     * @OA\Get(
     * path="/api/canculate/{storage_id}",
     * summary="Products",
     * description="Bu joydan kichikina xisobotni olasiz",
     * operationId="canculate",
     * tags={"Api"},
     * @OA\Parameter(name="storage_id", in="path", description="bu yerga storage_id ni kiriting", required=true,
     *        @OA\Schema(type="integer")
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function canculate($storage_id){
        return $this->storage->canculate($storage_id);
    }
    /**
     * @OA\Post(
     * path="/api/buying",
     * summary="buying",
     * description="buying",
     * operationId="buying",
     * tags={"Api"},
     * @OA\RequestBody(
     *    required=true,
     *    description="buying",
     *    @OA\JsonContent(
     *       required={"provider_id","batches_id","count","price"},
     *       @OA\Property(property="provider_id", type="integer",format="text", example="1"),
     *       @OA\Property(property="batches_id", type="integer", format="text", example="1"),
     *       @OA\Property(property="product_id", type="integer", format="integer", example="1"),
     *       @OA\Property(property="count", type="integer", format="text", example="1"),
     *       @OA\Property(property="price", type="integer", format="text", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function buying(BuyingRequest $request)
    {
        $this->storage->buying($request);
        return response(['message'=>'success buying']);
    }
    /**
     * @OA\Post(
     * path="/api/selling",
     * summary="order-to-client",
     * description="order-to-client",
     * operationId="order-to-client",
     * tags={"Api"},
     * @OA\RequestBody(
     *    required=true,
     *    description="buying",
     *    @OA\JsonContent(
     *       required={"provider_id","batches_id","conut"},
     *       @OA\Property(property="client_id", type="integer",format="text", example="1"),
     *       @OA\Property(property="storage_id", type="integer", format="text", example="1"),
     *       @OA\Property(property="count", type="integer", format="text", example="1"),
     *       @OA\Property(property="price", type="integer", format="text", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function selling(SellingRequest $request)
    {
        if ($this->selling->selling($request)){
            return response(['message'=>'success selling']);
        } else {
            return response(['message'=>'error'],422);
        }
    }

    /**
     * @OA\Post(
     * path="/api/refounds",
     * summary="refound",
     * description="refound",
     * operationId="refound",
     * tags={"Api"},
     * @OA\RequestBody(
     *    required=true,
     *    description="buying",
     *    @OA\JsonContent(
     *       required={"provider_id","batches_id","conut"},
     *       @OA\Property(property="type", type="string",format="text", example="client"),
     *       @OA\Property(property="client_id", type="integer",format="text", example="0"),
     *       @OA\Property(property="storage_id", type="integer", format="text", example="1"),
     *       @OA\Property(property="count", type="integer", format="text", example="1"),
     *       @OA\Property(property="price", type="integer", format="text", example="1"),
     *       @OA\Property(property="comment", type="string", format="text", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function refounds(RefoundRequest $request)
    {
        $this->refound->refound($request);
        return response(['message'=>'success refounded']);
    }
}
