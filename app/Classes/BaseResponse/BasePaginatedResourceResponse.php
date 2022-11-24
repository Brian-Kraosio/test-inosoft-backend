<?php

namespace App\Classes\BaseResponse;

use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Support\Arr;

class BasePaginatedResourceResponse extends BaseResourceResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return tap(response()->json(
            $this->wrap(
                $this->resource->resolve($request),
                array_merge_recursive(
                    $this->paginationInformation($request),
                    $this->resource->with($request),
                    $this->resource->additional
                )
            ),
            $this->calculateStatus()
        ), function ($response) use ($request) {
            $response->original = $this->resource->resource->map(function ($item) {
                return is_array($item) ? Arr::get($item, 'resource') : $item->resource;
            });

            $this->resource->withResponse($request, $response);
        });
    }
    /**
     * Pagination Links
     *
     * @param array $paginated
     * @return array
     */
    protected function paginationLinks($paginated)
    {
        return [
            'first' => $paginated['first_page_url'] ?? null,
            'last' => $paginated['last_page_url'] ?? null,
            'prev' => $paginated['prev_page_url'] ?? null,
            'next' => $paginated['next_page_url'] ?? null,
        ];
    }

    /**
     * Meta Pagination
     *
     * @param array $paginated
     * @return array
     */
    protected function meta($paginated)
    {
        $paginated['next_page'] = $paginated['current_page'] != $paginated['last_page'] ? ($paginated['current_page']+1) : null;
        unset($paginated['to']);

        return Arr::except($paginated, [
            'data',
            'path',
            'links',
            'first_page_url',
            'last_page_url',
            'prev_page_url',
            'next_page_url',
        ]);
    }

    protected function paginationInformation($request)
    {
        $paginated = $this->resource->resource->toArray();

        return [
            'data' => $this->meta($paginated),
        ];
    }
}
