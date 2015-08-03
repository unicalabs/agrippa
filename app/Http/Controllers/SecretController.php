<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Secret;
use Carbon\Carbon;
use Crypt;
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
        return view('secret.create', compact('now'));
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
        $datetime = Carbon::createFromFormat('Y-m-d H:i', $timeString);
        $datetime = $datetime->subHours($request->input('utc_offset'));
        $secret = Secret::create(array(
            'secret'        => Crypt::encrypt($request->input('secret')),
            'uuid4'         => crypt($uuid4, '$6$rounds=5000$' . getenv('APP_SALT') . '$'),
            'expires_at'    => $datetime,
            'expires_views' => $request->input('expires_views')
        ));

        $expires_at = $secret->expires_at;
        $views_remaining = $secret->expires_views - $secret->count_views;

        return view('secret.store', compact('uuid4', 'expires_at', 'views_remaining'));
    }

    /**
     * Display the specified resource.
     *
     * @param  text  $uuid4
     * @return Response
     */
    public function show($uuid4)
    {

        $secret = Secret::where('uuid4', crypt($uuid4, '$6$rounds=5000$' . getenv('APP_SALT') . '$'))->first();

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

        return view('secret.show', compact('secretDecrypted', 'expires_at', 'views_remaining'));
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
