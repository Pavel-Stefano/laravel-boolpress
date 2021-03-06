<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;

class TagController extends Controller
{
    protected $validationRule = [
        "name" => "required|string|max:100",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        // dd($data);

        $newTag = new Tag();
        $newTag->name = $data['name'];
        $newTag->slug = $this->getSlug($newTag->name);
        $newTag->save();
        return redirect()->route('admin.tags.show', $newTag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

            if($tag->name != $data['name']){
                $tag->name = $data['name'];
                $slug = Str::of($tag->name)->slug("-");
                if($slug != $tag->slug) {
                    $tag->slug = $this->getSlug($tag->name);
                }
            }
        
        $tag->update();
        return redirect()->route('admin.tags.show', $tag->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // $tag->tags()->sync([]);      non funziona

        $tag->delete();
        return redirect()->route('admin.tags.index')->with("message", "tag with id: {$tag->id} successfully deleted !");
    }


    private function getSlug($name) {
        $slug = Str::of($name)->slug("-");
        $count = 1;

        while( Tag::where("slug", $slug)->first() ) {
            $slug = Str::of($name)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;

    }
}
