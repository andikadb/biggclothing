<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(25);

        return view('master.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('master.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|unique:tags,name',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        Tag::create($requestData);

        Session::flash('flash_message', 'Tag added!');

        return redirect('master/tags');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return view('master.tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('master.tags.edit', compact('tag'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'required|unique:tags,name',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        $tag = Tag::findOrFail($id);
        $tag->update($requestData);

        Session::flash('flash_message', 'Tag updated!');

        return redirect('master/tags');
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('flash_message', 'Tag deleted!');

        return redirect('master/tags');
    }
}
