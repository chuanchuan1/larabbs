<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic, User $user)
    {
        $topics = $topic->withOrder($request->order)
                        ->where("category_id", $category->id)
                        ->paginate(20);

        $active_users = $user->getActiveUsers();

        return view("topics.index", compact('topics', 'category', 'active_users'));
    }
}