<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository extends EloquentRepository
{

    public function model()
    {
        return Product::class;
    }
}
