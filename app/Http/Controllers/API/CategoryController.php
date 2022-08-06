<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Categories::all();

        return response()->json($data);
    }

    public function show($id)
    {
        $data = Categories::find($id);
        if (!$data) {
            $data = [
                'status' => 'error',
                'message' => 'No category found',
            ];

            return response()->json($data, 404);
        }
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Category found',
            ],
            'data' => $data,
        ];
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $category = Categories::create($request->all());

        return response()->json($category);
    }
}
