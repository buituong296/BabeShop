<?php

namespace App\Traits;

trait Searchable
{
    /**
     * Function to perform search on a model.
     *
     * @param string $model The model class to search.
     * @param string|null $query The search keyword.
     * @param array $fields Fields to search in the model.
     * @return \Illuminate\Pagination\LengthAwarePaginator The paginated result.
     */
    public function search($model, $query, $fields = ['name'])
    {
        if ($query) {
            $queryBuilder = $model::query();

            foreach ($fields as $field) {
                $queryBuilder->orWhere($field, 'LIKE', "%{$query}%");
            }

            return $queryBuilder->paginate(50);
        }

        return $model::paginate(50);
    }
}
