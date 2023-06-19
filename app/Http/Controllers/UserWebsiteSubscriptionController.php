<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWebsiteSubscription;
use App\Models\Website;
use Illuminate\Http\Request;

class UserWebsiteSubscriptionController extends Controller
{

    /**
     * Store a new UserWebsiteSubscription.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'site_id' => 'required|int',
            'user_id' => 'required|int',
        ]);

        $userExists = User::where('id', $request->user_id)->exists();

        if (!$userExists) {
            return response()->json([
                'message' => "User not found with id = $request->user_id",
            ], 400);
        }

        $siteExists = Website::where('id', $request->site_id)->exists();

        if (!$siteExists) {
            return response()->json([
                'message' => "Site not found with id = $request->site_id",
            ], 400);
        }

        $rowExists = UserWebsiteSubscription::where('site_id', $request->site_id)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($rowExists) {
            return response()->json([
                'message' => 'Already subscribed',
            ], 400);
        }

        UserWebsiteSubscription::create($validated);

        return response()->json([
            'message' => 'created successfully',
        ], 200);
    }
}
