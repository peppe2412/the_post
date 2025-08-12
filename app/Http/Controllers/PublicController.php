<?php

namespace App\Http\Controllers;

use App\Mail\CarrerRequestMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller implements HasMiddleware
{

    public static function middleware(){
          return [new Middleware('auth', except : ['home'])];
    }

    public function home(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();
        return view('welcome', compact('articles'));
    }

    public function carrers(){
        return view('carrers');
    }

    public function carrersSubmit(Request $request){
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ], [

            'role.reqired' => 'Campo richiesto',

            'email.reqired' => 'Campo richiesto',
            'email.email' => 'Inserisci email',

            'message.reqired' => 'Campo richiesto',

        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        $info = compact('role', 'email', 'message');

        Mail::to('noreply@admin.com')->send(new CarrerRequestMail($info));

        switch ($role){
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }  

        $user->update();

        return redirect(route('home'))->with('message', 'Richiesta inviata');
    }
}
