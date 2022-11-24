<?php

namespace App\Classes\BaseResponse;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

class BaseCollection extends ResourceCollection
{

    public $collects;

    /**
     * Create a new anonymous resource collection.
     *
     * @param mixed $resource
     * @param string $collects
     * @return void
     */
    public function __construct($resource, $collects)
    {
        $this->collects = $collects;

        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'code' => 200,
            'status' => true,
        ];
    }

    public function toResponse($request)
    {
        return $this->resource instanceof AbstractPaginator
            ? (new BasePaginatedResourceResponse($this))->toResponse($request)
            : (new BaseResourceResponse($this))->toResponse($request);
    }

}
