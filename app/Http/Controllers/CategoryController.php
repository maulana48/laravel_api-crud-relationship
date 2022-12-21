<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Category };

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();

        return response()->json([
            'status' => true,
            'message' => "Data semua category didapatkan",
            'data' => $category
        ]);
    }

    public function store(Request $request){
        if(!$request->nama){
            return response()->json([
                'status' => false,
                'message' => 'Nama category tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->slug){
            return response()->json([
                'status' => false,
                'message' => 'Slug category tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->deskripsi){
            return response()->json([
                'status' => false,
                'message' => 'Deskripsi category tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();
        $category = Category::create($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Category berhasil ditambahkan',
            'data' => $category
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        
        if(!$category){
            return response()->json([
                'status' => true,
                'message' => 'Data category tidak ditemukan',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data category didapatkan',
            'data' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        
        if(!$request->nama){
            return response()->json([
                'status' => false,
                'message' => 'Nama category tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->slug){
            return response()->json([
                'status' => false,
                'message' => 'Slug category tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->deskripsi){
            return response()->json([
                'status' => false,
                'message' => 'Deskripsi category tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();
        $category = $category->update($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Category berhasil diupdate',
            'data' => $payload
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category berhasil dihapus',
            'data' => $category
        ]);
    }
}
