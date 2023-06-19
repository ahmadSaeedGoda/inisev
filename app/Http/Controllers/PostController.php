<?php

namespace App\Http\Controllers;

use App\Jobs\NotifySubscribers;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Store a new Post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'site_id' => 'required|int',
        ]);

        $siteExists = Website::where('id', $request->site_id)->exists();

        if (!$siteExists) {
            return response()->json([
                'message' => "Site not found with id = $request->site_id",
            ], 400);
        }

        $post = Post::create($validated);

        NotifySubscribers::dispatchAfterResponse($post);

        return response()->json([
            'message' => 'created successfully',
        ], 200);
    }
}
