<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Story;
use App\Transaction;
use App\Http\Resources\Story as StoryResource;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{

    /**
     * Display a listing of the resource for admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(Request $request)
    {
        return view('admin', ['stories' => Story::orderByDesc('created_at')->get()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home', ['stories' => Story::orderByDesc('created_at')->paginate(10)]);
    }

    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $story = Story::findOrFail($request->id);

        if($request->isMethod('get')) {
          return view('admin-story', [
            'story' => $story,
            'enableFiles' => false,
            'title' => 'Upraviť príbeh',
            'btn' => 'Upraviť',
            'method' => 'PUT'
          ]);
        }

        $story->title = $request->title;
        $story->content = $request->content;

        if($story->save()) {
          $stories = Story::orderByDesc('created_at')->get();
          $message = 'Príbeh "'.$story->title.'" bol úspešne upravený.';
          return redirect('/admin')->with(['stories' => $stories, 'message' => $message]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['images' => 'required', 'title' => 'required', 'content' => 'required']);

        $imageLocations = array_map(function($file) { return Storage::disk('stories')->putFile('', $file); }, $request->images);

        $story = new Story;
        $story->title = $request->title;
        $story->content = $request->content;
        $story->serializedImageLocations=implode('|', $imageLocations);

        if($story->save()) {
          $stories = Story::orderByDesc('created_at')->get();
          $message = 'Príbeh "'.$story->title.'" bol úspešne vytvorený.';
          return redirect('/admin')->with(['stories' => $stories, 'message' => $message]);
        }
        array_walk($imageLocations, function($file) { return Storage::disk('stories')->delete($file); });
        return redirect('/admin')->withErrors(['not_found' => $stories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::findOrFail($id);
        $story->serializedImageLocations = explode("|", $story->serializedImageLocations);
        return view('story', ['story' => $story]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $story = Story::find($id);
        $message = null;
        if($story && $story->delete()) {
            Storage::disk('stories')->deleteDirectory($id);
            $message = 'Príbeh "'.$story->title.'" bol úspešne vymazaný.';
        }
        $stories = Story::orderByDesc('created_at')->get();
        return view('admin', ['stories' => $stories, 'message' => $message]);
    }

    // select date_format(date, '%M%Y'), sum(amount) from transactions group by date_format(date, '%M%Y');
    public function stats(Request $request)
    {

      $raised = Transaction::where('amount', '>', 0)->sum('amount');
      $given = Transaction::where('amount', '<', 0)->sum('amount');
      $funders = Transaction::distinct('account')->count();
      $storyCount = Story::count();
      $data = Transaction
                  ::selectRaw('date_format(date, "%M %Y") as month, sum(amount) as total')
                  ->whereRaw('date > date_sub(now(), interval 1 year)')
                  ->groupByRaw('date_format(date, "%M %Y")')
                  ->get();

      return view('stats', [
        'data' => $data,
        'given' => $given,
        'raised' => $raised,
        'funders' => $funders,
        'storyCount' => $storyCount
      ]);
    }
}
