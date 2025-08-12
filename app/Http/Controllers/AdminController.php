<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequest = User::where('is_admin', NULL)->get();
        $revisorRequest = User::where('is_revisor', NULL)->get();
        $writerRequest = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequest', 'revisorRequest', 'writerRequest'));
    }

    public function setAdmin(User $user){
        $user->is_admin = true;

        $user->save();

        return redirect(route('admin-dashboard'))->with('message', "$user->name è diventato amministratore");
    }

    public function setRevisor(User $user){
        $user->is_revisor = true;

        $user->save();

        return redirect(route('admin-dashboard'))->with('message', "$user->name è diventato revisore");
    }

    public function setWriter(User $user){
        $user->is_writer = true;

        $user->save();

        return redirect(route('admin-dashboard'))->with('message', "$user->name è diventato writer");
    }

}
