<?php

namespace App\Services;

class ModelService
{

    public static function filter_search($model,$column,$request)
    {
        if($request->search_key)
            $model->where($column,'like','%'.$request->search_key.'%');
        return $model->paginate($request->show??10);
    }
}
