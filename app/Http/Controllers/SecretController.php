<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Secret;
use Carbon\Carbon;
use Crypt;
use Hash;
use Rhumsaa\Uuid\Uuid;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Set expiry time to an hour from now
        $now = Carbon::now()->addHour();
        return view('create', compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $uuid4 = Uuid::uuid4();
        $timeString = $request->input('expires_date') . ' ' . $request->input('expires_time');
        $secret = Secret::create(array(
            'secret'        => Crypt::encrypt($request->input('secret')),
            'uuid4'         => Hash::make($uuid4),
            'expires_at'    => Carbon::createFromFormat('Y-m-d H:i', $timeString),
            'expires_views' => $request->input('expires_views')
        ));

        $expires_at = $secret->expires_at;
        $views_remaining = $secret->expires_views - $secret->count_views;

        return view('store', compact('uuid4', 'expires_at', 'views_remaining'));
    }

    /**
     * Display the specified resource.
     *
     * @param  text  $uuid4
     * @return Response
     */
    public function show($uuid4)
    {

        /* The secret's uuid is hashed in the database to reduce the likelihood 
        that a record can be linked back to a URL. However, Laravel's hashing 
        implementation does not return a consistent string (for good reason), 
        making querying directly by the hashed value impossible. Therefore, we 
        must perform a collection filtering operation on all records in the 
        database, which is less than ideal for performance. For gigantic
        installations, we could perhaps shard the data (virtually) and pass the
        shard ID in the retrieval URL for use as a first-pass filter prior to
        performing the hash check, but that is frought with potential pain. */

        $secretsCollection = Secret::all();

        $filteredSecretsCollection = $secretsCollection->filter(function($secret) use ($uuid4)
        {
            return Hash::check($uuid4, $secret->uuid4);
        });

        $secret = $filteredSecretsCollection->first();

        if(!empty($secret))
        {
            // Check for expiry
            if(Carbon::now()->gte($secret->expires_at) || $secret->count_views >= $secret->expires_views)
            {
                $secret->delete();
            } else 
            {
                // Increment the view count
                $secret->increment('count_views');

                // Get attributes for display
                $secretDecrypted = Crypt::decrypt($secret->secret);
                $expires_at = $secret->expires_at;
                $views_remaining = $secret->expires_views - $secret->count_views;


            }
        }

        return view('show', compact('secretDecrypted', 'expires_at', 'views_remaining'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
