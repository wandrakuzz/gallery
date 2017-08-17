<?php

namespace App\Http\Controllers;

use App\Gambar;
use App\Comment;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Gambar::all();

        return view ('gambar.upload',compact('images'));
    }

    public function komen($id)
    {
      $komens = Gambar::find($id);
      $lists = Comment::all();
      return view('comment.create',compact('komens','lists'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Gambar $gambar)
    {

        Comment::create([
          'image_id' => $gambar->id,
          'comment'  => $request->comment,
        ]);

        // // $gambars = new Gambar;
        // $komens = new Comment;
        //
        //
        // // $komens->image_id = $gambars->id;
        // $komens->comment  = $request->comment;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function show(Gambar $gambar)
    {
        //
        return $gambar;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambar $gambar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gambar $gambar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gambar = Gambar::find($id)->delete();

        return back()->with('success','Successfully delete');
    }

    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['title'] = $request->title;
        Gambar::create($input);

    	return back()
    		->with('success','Image Uploaded successfully.');
    }
}
