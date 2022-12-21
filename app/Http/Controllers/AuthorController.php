<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Author };
use Illuminate\Support\Facades\{ Hash };

class AuthorController extends Controller
{

    public function index()
    {
        $author = Author::all();

        return response()->json([
            'status' => true,
            'message' => "Data semua author didapatkan",
            'data' => $author
        ]);
    }

    public function store(Request $request)
    {
        if(!$request->nama){
            return response()->json([
                'status' => false,
                'message' => 'Nama author tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->username){
            return response()->json([
                'status' => false,
                'message' => 'Username author tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->email){
            return response()->json([
                'status' => false,
                'message' => 'Email author tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->password){
            return response()->json([
                'status' => false,
                'message' => 'Email author tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();
        $payload['password'] = Hash::make($request->password);
        $author = Author::create($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Data author berhasil ditambahkan',
            'data' => $author
        ]);
    }

    public function show($id)
    {
        $author = Author::find($id);
        
        if(!$author){
            return response()->json([
                'status' => true,
                'message' => 'Data author tidak ditemukan',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data author didapatkan',
            'data' => $author
        ]);
    }

    public function update(Request $request, Author $author)
    {
        if(!$request->nama){
            return response()->json([
                'status' => false,
                'message' => 'Nama author tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->username){
            return response()->json([
                'status' => false,
                'message' => 'Username author tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->email){
            return response()->json([
                'status' => false,
                'message' => 'Email author tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();
        $payload['password'] = Hash::make($request->password);
        $author = $author->update($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Data author berhasil ditambahkan',
            'data' => $payload
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data author berhasil dihapus',
            'data' => $author
        ]);
    }
}
