<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // all profile
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    // add profile
    public function add(Request $request)
    {
        $book = new Book([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'urlpicture' => $request->urlpicture
        ]);
        $book->save();

        return response()->json('The profile successfully added');
    }

    // edit profile
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // update profile
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('The profile successfully updated');
    }

    // delete profile
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('The profile successfully deleted');
    }
}
