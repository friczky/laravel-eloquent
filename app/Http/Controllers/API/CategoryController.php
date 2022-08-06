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

    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        if (!$category) {
            $data = [
                'status' => 'error',
                'message' => 'No category found',
            ];

            return response()->json($data, 404);
        }
        $category->update($request->all());
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Category updated',
            ],
            'data' => $category,
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        if (!$category) {
            $data = [
                'status' => 'error',
                'message' => 'No category found',
            ];

            return response()->json($data, 404);
        }
        $category->delete();
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Category deleted',
            ],
            'data' => $category,
        ];
        return response()->json($data);
    }
}
