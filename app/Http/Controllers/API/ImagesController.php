<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Images;

class ImagesController extends Controller
{
    //
    public function index()
    {
        $data = Images::all();

        if (!$data) {
            $data = [
                'status' => 'error',
                'message' => 'No images found',
            ];

            return response()->json($data, 404);
        }
        $data  = [
            'meta' => [
                'status' => 'success',
                'message' => 'Images found',
            ],
            'data' => $data,
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Images::find($id);

        if (!$data) {
            $data = [
                'status' => 'error',
                'message' => 'No image found',
            ];

            return response()->json($data, 404);
        }
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Image found',
            ],
            'data' => $data,
        ];
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $data = Images::create($request->all());

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Images::find($id);
        if (!$data) {
            $data = [
                'status' => 'error',
                'message' => 'No image found',
            ];

            return response()->json($data, 404);
        }
        $data->update($request->all());
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Image updated',
            ],
            'data' => $data,
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Images::find($id);
        if (!$data) {
            $data = [
                'status' => 'error',
                'message' => 'No image found',
            ];

            return response()->json($data, 404);
        }
        $data->delete();
        $data = [
            'meta' => [
                'status' => 'success',
                'message' => 'Image deleted',
            ],
            'data' => $data,
        ];
        return response()->json($data);
    }
}
