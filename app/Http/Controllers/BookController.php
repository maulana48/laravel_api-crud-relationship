<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Author, Category, Book };
use Illuminate\Support\Facades\{ Hash, File };

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::query()
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'categories.nama_category', 'authors.nama_author')
            ->get();
        return response()->json([
            'status' => true,
            'message' => "Data semua buku didapatkan",
            'data' => $books
        ]);
    }

    public function category(Category $category)
    {
        $books = Book::where('category_id', $category->id)->get();

        return response()->json([
            'status' => true,
            'message' => "Data buku dengan categori " . $category->nama . " didapatkan",
            'data' => $books
        ]);
    }

    public function author(Author $author)
    {
        $books = Book::where('author_id', $author->id)->get();

        return response()->json([
            'status' => true,
            'message' => "Data buku dengan author " . $author->nama . " didapatkan",
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!$request->author_id){
            return response()->json([
                'status' => false,
                'message' => 'Author buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->category_id){
            return response()->json([
                'status' => false,
                'message' => 'Category buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->judul){
            return response()->json([
                'status' => false,
                'message' => 'Judul buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->penerbit){
            return response()->json([
                'status' => false,
                'message' => 'Penerbit buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->kota_penerbitan){
            return response()->json([
                'status' => false,
                'message' => 'Kota Penerbitan buku tidak valid',
                'data' => null
            ]);
        }

        if(!$request->ISBN){
            return response()->json([
                'status' => false,
                'message' => 'ISBN buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->tahun_terbit){
            return response()->json([
                'status' => false,
                'message' => 'Tahun terbit buku tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();
        
        if($request->file('sampul')){
            $payload['sampul'] = $request->file('sampul')->store('img/Library', ['disk' => 'public_uploads']);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Gambar sampul tidak valid',
                'data' => null
            ]);
        }
        
        $buku = Book::create($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $buku
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        if(!$book){
            return response()->json([
                'status' => true,
                'message' => 'Data buku tidak ditemukan',
                'data' => null
            ]);
        }
        $author = Author::find($book->author_id);
        $category = Category::find($book->category_id);

        return response()->json([
            'status' => true,
            'message' => 'Data buku didapatkan',
            'data' => [$book, $author, $category]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        
        if(!$request->author_id){
            return response()->json([
                'status' => false,
                'message' => 'Author buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->category_id){
            return response()->json([
                'status' => false,
                'message' => 'Category buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->judul){
            return response()->json([
                'status' => false,
                'message' => 'Judul buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->penerbit){
            return response()->json([
                'status' => false,
                'message' => 'Penerbit buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->kota_penerbitan){
            return response()->json([
                'status' => false,
                'message' => 'Kota Penerbitan buku tidak valid',
                'data' => null
            ]);
        }

        if(!$request->ISBN){
            return response()->json([
                'status' => false,
                'message' => 'ISBN buku tidak valid',
                'data' => null
            ]);
        }
        
        if(!$request->tahun_terbit){
            return response()->json([
                'status' => false,
                'message' => 'Tahun terbit buku tidak valid',
                'data' => null
            ]);
        }
        
        $payload = $request->all();

        if($request->file('sampul')){
            File::delete(public_path($book->sampul));
            $payload['sampul'] = $request->file('sampul')->store('img/Library', ['disk' => 'public_uploads']);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Gambar sampul tidak valid',
                'data' => null
            ]);
        }
        
        $buku = $book->update($payload);
        
        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil diupdate',
            'data' => $payload
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        File::delete(public_path($book->sampul));
        $book->delete();
        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil dihapus',
            'data' => $book
        ]);
    }
}
