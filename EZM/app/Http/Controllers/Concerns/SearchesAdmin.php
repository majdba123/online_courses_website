<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait SearchesAdmin
{
    /**
     * Validate search request and return query string.
     * Use in admin search methods: $search = $this->validateSearchQuery($request);
     */
    protected function validateSearchQuery(Request $request, string $field = 'query'): string
    {
        $validator = Validator::make($request->all(), [
            $field => 'required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
            abort(422, $validator->errors()->first());
        }

        return $request->input($field);
    }
}
