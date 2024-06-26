<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showNews()
    {
        return view('admin.news');
    }

    public function showN()
    {
      $datan=News::all();
      return view('admin.news',['news'=>$datan]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nname' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news= new News();
        $news->name=$request->nname;
        $news->detail=$request->detail;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }
        $res=$news->save();
        if($res){
        return redirect('/news')
                        ->with('success','Vest je kreirana uspešno.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function deleteNews(News $news)
    {
        $news->delete();
        return redirect('news')
                        ->with('success','Obrisali ste vest.');
    }
}
