<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

//use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

   public function index(){

//    $allCategories = ['Javascript', 'CSS', 'Tailwind CSS', 'PHP', 'Laravel'];

    // when you have a database
//     $allCategories =  DB::table('categories')->get();

    // this works when you have a database and have created the model as well
     $categories = Category::all();
     $posts = Post::when(request('category_id'), function ($query){
        $query->where('category_id' , request('category_id'));
})
         ->latest()
         ->get();

//    return view('index', [
//        'categories' => $allCategories,
//        'posts' => $posts
//    ]);
        return view('index', compact('categories','posts'));
   }

}
