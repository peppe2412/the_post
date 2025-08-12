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

        return redirect(route('revisor-dashboard'), compact('unrevisioneArticle', 'acceptedArticle', 'refuseArticle'));
    }
}
