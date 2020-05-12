<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create() {
        $categories = Category::all()->pluck('name' , 'id');
        return view('articles.create', compact('categories'));
    }

    public function store() {
        $this->validate(request(), [
            'title'     =>  'required',
            'body'     =>  'required|min:5',
            'category' => 'required'
        ]);
        $article = auth()->user()->articles()->create([
            'title'   =>  request('title'),
            'body'   =>  request('body'),
        ]);
        $article->categories()->attach(request('category'));
        session()->flash('message' , 'مقاله شما با موفقیت ایجاد شد');
        return redirect('/');
    }

    public function show(Article $article) {
        $comments = $article->comments()->get();
        return view('articles.show', compact('article','comments'));
    }

    public function edit(Article $article) {
        $categories = Category::all()->pluck('name' , 'id');
        return view('articles.edit' , compact('article' , 'categories'));
    }

    public function update(Article $article) {
        $article->update(request(['title' , 'body']));

        $article->categories()->sync(request('category'));

        return redirect('/');
    }
}
