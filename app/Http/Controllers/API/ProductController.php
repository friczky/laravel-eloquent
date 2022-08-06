<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Products::with('images')->get();

        if (!$products) {
            $data = [
                'status' => 'error',
                'message' => 'No products found',
            ];

            return response()->json($data, 404);
        }
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Products found',
            ],
            'data' =>  $products
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $products = Products::with('images')->find($id);

        if (!$products) {
            $data = [
                'status' => 'error',
                'message' => 'No product found',
            ];

            return response()->json($data, 404);
        }

        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Product found',
            ],
            'data' => $products
        ];

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $products = Products::create($request->all());

        return response()->json($products);
    }

    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->update($request->all());
        if (!$products) {
            $data = [
                'status' => 'error',
                'message' => 'No product found',
            ];

            return response()->json($data, 404);
        }
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Product Updated',
            ],
            'data' => $products
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        if (!$products) {
            $data = [
                'status' => 'error',
                'message' => 'No product found',
            ];

            return response()->json($data, 404);
        }
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Product Deleted',
            ],
            'data' => $products
        ];
        return response()->json($data);
    }
}
