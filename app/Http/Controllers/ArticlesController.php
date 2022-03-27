<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index() {
        $articles = Article::all();
        //$articles = Article::orderBy('created_at', 'asc')->paginate(1);

        return view('articles.index')->with('articles', $articles);
        //пагинация на сайте

    }

    public function create() {
        return view('articles.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' =>'required|max:190:min:10',
            'text' =>'required:min:20',
            'main_image' => 'nullable|image|max:1999' //загрузка только картинок
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();//получение название изображения без разширения

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);//получаем название изображения, разширение удаляем остается только название файла которое сохраняется в переменную

            $ext = $request->file('main_image')->getClientOriginalExtension();//получаем разширение для определённого файла
            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images',$image_name);//перемещает в папку storage/app/public


        } else
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();

        return redirect('/articles')->with('success', 'Статья была добавлена');

    }

    public function show($id) {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    public function edit($id) {
        $article = Article::find($id);
        if(auth()->user()->id != $article->user_id)
            return reditect('/articles')->with('error', 'Вы не авторизованы');

        return view('articles.edit')->with('article', $article);

    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' =>'required|max:190:min:10',
            'text' =>'required:min:20'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();//получение название изображения без разширения

            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);//получаем название изображения, разширение удаляем остается только название файла которое сохраняется в переменную

            $ext = $request->file('main_image')->getClientOriginalExtension();//получаем разширение для определённого файла
            $image_name = $image_name_without_ext."_".time().".".$ext;
            $path = $request->file('main_image')->storeAs('public/images',$image_name);//перемещает в папку storage/app/public
        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        if($request->hasFile('main_image')){
            if($article->image != "noimage.jpg")
            Storage::delete('public/images/'.$article->image);
            $article->image = $image_name;
        }

        $article->save();

        return redirect('/articles')->with('success', 'Статья была обновлена');

    }

    public function destroy($id) {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return reditect('/articles')->with('error', 'Вы не авторизованы');


        if($article->image != "noimage.jpg")
            Storage::delete('public/images/'.$article->image);

        $article->delete();
        return redirect('/articles')->with('success', 'Статья была удалена');

    }
}
