<?php

namespace MicroMatt27170\CrudModelHelper;

use \Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class CrudModelHelper
{
    public Request $request;

    /**
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        $limit = $this->request->input('limit', 15);

        return is_numeric($limit) ? $limit : 15;
    }

    /**
     * @param  Builder|\Illuminate\Database\Query\Builder  $query
     * @param  array  $searchable
     * @param  array  $sortable
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function paginator(Builder|\Illuminate\Database\Query\Builder &$query,
                              array $searchable = [],
                              array $sortable = []): Builder|\Illuminate\Database\Query\Builder
    {
        if ($this->request->has('search_query')) {
            $query->where(function (Builder|\Illuminate\Database\Query\Builder $q) use ($searchable) {
                $search = $this->request->input('search_query');

                foreach ($searchable as $col => $optr) {
                    $s = $optr === 'like' ? '%'.$search.'%' : $search;

                    $q->orWhere($col, $optr, $s);
                }
            });
        }

        if ($this->request->has('order_by')) {
            $orderBy = in_array($this->request->input('order_by'), $sortable)
                ? $this->request->input('order_by')
                : Model::CREATED_AT;

            $orderDir = $this->request->input('order_dir', 'desc');
            $orderDir = in_array($orderDir, ['desc', 'asc']) ? $orderDir : 'desc';

            $query->orderBy($orderBy, $orderDir);
        }

        return $query;
    }

    /**
     * @param  Model  $model
     * @param $name
     * @return array
     */
    public function deleteMethod(Model $model, $name = 'La entidad'): array
    {
        $isDel = $model->delete();
        $min = strtolower($name);

        return $isDel
            ? [['success' => true, 'message' => __("$name ha sido eliminada")], 200]
            : [['success' => false, 'message' => __("No se elimino $min")], 422];
    }
}
