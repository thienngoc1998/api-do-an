<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends EloquentRepository
{

    public function model()
    {
        return Category::class;
    }
}
