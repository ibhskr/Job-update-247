<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->paginate(10);
        return view("home", compact("posts"));
    }

    public function create()
    {
        return view("createPost");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // FacadesDB
        DB::table("posts")->insert([
            "title"             => $request->title,
            "description"       => $request->description,
            "Notifications_id"  => $request->Notifications_id,
            "department"        => $request->department,
            "isVacancy"         => $request->isVacancy,
            "vacancy"           => $request->vacancy,
            "qualification"     => $request->qualification,
            "apply_start_date"  => $request->apply_start_date,
            "apply_end_date"    => $request->apply_end_date,
            "official_website"  => $request->official_website,
            "notification_link" => $request->notification_link,
            "Apply_link"        => $request->Apply_link,
            // Add timestamps manually for Query Builder
            "created_at"        => now(),
            "updated_at"        => now(),
        ]);

        return view("home");
        // return view('fullpost');
        // return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the single post
        $post = Post::findOrFail($id);
        // return $post;
        // Return the view we just created
        return view('fullpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
