<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DateTime;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    public function show($id)
    {
    	$book = Book::find($id);

    	if (!$book)
    	{
    		return response()->json([
    			'message'   => 'Registro não encontrado',
    		], 404);
    	}

    	return response()->json($book);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = $this->getValidator($request);
    	if ($validator->fails()) {
    		return response()->json([
    			'message' => 'Requisição inválida',
    			'errors' => $validator->errors()->all()
    		], 422);
    	}
    	$book = new Book();
    	$book->title = $request->title;
    	$book->author = $request->author;
    	$book->rating_information = $request->rating_information;
    	$date = new DateTime();
    	$book->release_date = $date->format('Y-m-d H:i:s');
    	$book->save();
    	return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$validator = $this->getValidator($request);
    	if ($validator->fails()) {
    		return response()->json([
    			'message' => 'Requisição inválida',
    			'errors' => $validator->errors()->all()
    		], 422);
    	}
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }
        $book->title = $request->title;
    	$book->author = $request->author;
    	$book->rating_information = $request->rating_information;
        $book->save();
        return response()->json($book);
    }

    private function getValidator(Request $request) {
    	return Validator::make($request->only('title', 'author', 'rating_information'), [
    		'title' => 'required',
    		'author' => 'required',
    		'rating_information' => 'required'
    	]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }
        return response()->json($book->delete(), 200);
    }
}
