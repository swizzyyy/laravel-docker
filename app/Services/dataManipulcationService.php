<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class dataManipulcationService
{
    protected $path;

    public function __construct(protected $model){
        $this->path = 'App\\Models\\'.$model;
    }

    /**
     * Data Creation
    */

    public function create($request)
    {
        return $this->path::create($request);
    }

    /**
     * Data Update
    */

    public function update($request,Model $model)
    {
        return tap($model)->update($request);
    }
}
