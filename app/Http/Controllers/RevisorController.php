<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard(){
        $unrevisioneArticle = Article::where('is_accepted', NULL)->get();
        $acceptedArticle = Article::where('is_accepted', true)->get();
        $refuseArticle = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unrevisioneArticle', 'acceptedArticle', 'refuseArticle'));
    }

    public function acceptedArticle(Article $article){
        $article->is_accepted = true;
        
        $article->save();

        return redirect(route('revisor-dashboard', compact('article')))->with('message', 'Articolo accettato');

    }

    public function refuseArticle(Article $article){
        $article->is_accepted = false;

        $article->save();

        return redirect(route('revisor-dashboard', compact('article')))->with('message', 'Articolo rifiutato');
    }

    public function undoArticle(Article $article){
        $article->is_accepted = NULL;

        $article->save();

        return redirect(route('revisor-dashboard', compact('article')))->with('message', 'Articolo è in revisione');
    }
}
