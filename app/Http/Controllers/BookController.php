<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function homePage(){
        $books = Book::all(); 
        return view('Book.Home')->with('book', $books);
    }
    
    public function viewPage(){
        $books = Book::all();
        $categories = Category::all();
        return view('Book.View')->with('books', $books)->with('category', $categories);
    }

    public function addPage(){
        $categories = Category::all();

        return view('Book.Add')->with('categories', $categories);
    }

    public function store(Request $request, Book $book){
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $extension= $request->file('image')->getClientOriginalExtension();
        $file_name = $request->title.'.'.$extension;
        $request->file('image')->storeAs('/public/book/', $file_name);
    
        Book::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $file_name
        ]);
    
        return redirect()->route('viewPage')->with('success', 'Book added successfully');
    }

    public function editPage($id){
        $book = Book::findOrFail($id);

        return view('Book.Edit')->with('book', $book);
    }

    public function updateBook($id, Request $request){
        $book = Book::findOrFail($id);
        if($book->image){
            Storage::delete('/public/book/'.$book->image);
        }

        $request->validate([
            'name' => 'required|min:5|max:80',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $extension= $request->file('image')->getClientOriginalExtension();
        $file_name = $request->title.'.'.$extension;
        $request->file('image')->storeAs('/public/book/', $file_name);

        $book->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $file_name
        ]);

        return redirect()->route('viewPage')->with('success', 'Book updated successfully');
    }

    public function deleteBook($id){
        Book::destroy($id);

        return redirect(route('viewPage'));
    }

    public function delete_image($id){
        $book = Book::findOrFail($id);

        if($book->image){
            Storage::delete('/public/book/'.$book->image);
            $book->update([
                'image' => null
            ]);
        }

        return redirect(route('viewPage'));
    }

}
