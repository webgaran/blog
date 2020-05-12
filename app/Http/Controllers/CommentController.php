<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Mail\commentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Article $article) {
        $this->validate(request(), [
            'body'      =>      'required|min:3',
        ]);
        $user = auth()->user();
        $article->comments()->create([
            'user_id' => $user->id,
            'body'        =>  request('body'),
        ]);
        Mail::to($user->email)->send(new commentMail($user));
        return back();
    }
}
