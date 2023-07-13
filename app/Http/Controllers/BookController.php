<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();		
		return view('books.index', compact('books'));    

    }

    public function search(Request $request)
    {
        try {
            // dd($request->all());
            $search = $request->input('search');
            // dd($search);
            // dd($request);
            // $search = "java";
            $books = Book::where('name', 'LIKE', '%' .$search. '%')->get();

            return response()->json($books); 
        } catch (\Exception $e) {
            Log::error('Error in search: '.$e->getMessage());
            return '';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::find($id);		
		return view('books.show', compact('book')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
