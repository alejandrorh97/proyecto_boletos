<?php

namespace App\Trait;

trait WithPagination
{
    public function scopeWithPagination($query)
    {
        $request = request();
        $perPage = $request->has('size') ? $request->size : 10;
        $page    = $request->has('page') ? $request->page : 1;

        return $query->paginate($perPage, ['*'], 'page', $page);
    }
}
