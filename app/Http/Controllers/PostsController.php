<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(10);

        return view('posts.index', ['posts' => $posts]);



        // $posts = Post::paginate(10);

        // return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,

        ];


        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpeg|max:148',
            ]);

            $imageName = time() . '__' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

            $image_uri = 'images/' . $imageName;
            $data['image_uri'] = $image_uri;
        }

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
        ]);


        Post::create(
            $data
        );

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,

        ];

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = time() . '__' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

            $image_uri = 'images/' . $imageName;

            $data['image_uri'] = $image_uri;
        }

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
        ]);



        Post::find($id)->update(
            $data
        );

        return redirect('posts/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
