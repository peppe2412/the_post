<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [new Middleware('auth', except : ['index', 'show'])];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:8',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'body' => 'required|min:10',
            'category' => 'required'
        ], [

            'title.required' => 'Campo richiesto',
            'title.unique' => 'Titolo già utilizzato',
            'title.min' => 'Questo campo deve avere minimo 5 caratteri',

            'subtitle.required' => 'Campo richiesto',
            'subtitle.min' => 'Questo campo deve avere minimo 8 caratteri',

            'image.required' => 'Inserisci immagine',
            'image.image' => 'Inserisci immagine valida',
            'image.mimes' => 'L\'immagine deve essere nei formati: jpg, jpeg o png',
            'image.max' => 'Immagine troppo grande',

            'body.required' => 'Campo richiesto',
            'body.min' => 'Questo campo deve avere minimo 10 caratteri',

            'category' => 'Scegli una categoria'
        ]);

        

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $request->file('image')->store('images', 'public'),
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('home'))->with('message', 'Articolo creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
