<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('AdminComponents/Users/Index',[
                    'users' => User::query()->when(Request::input('search'), function($query, $search){
                        $query->where('name', 'like', "%{$search}%");
                    })->paginate(10)
                        ->withQueryString()
                        ->through(fn($user) => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'role' => $user->roles->pluck('name')
                    ]),
                    'filter' => Request::only(['search'])
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        //
        return Inertia::render('AdminComponents/Users/Edit', [
            'users' => User::all()->where('id', $id)->map(fn($user) => [
                'user_name' => $user->name,
                'registered_on' => $user->created_at,
                'verified_on' => $user->updated_at,
                'user_email' => $user->email,
                'user_profile_photo' => $user->profile_photo_url,
                'user_roles' => $user->roles() != null ? $user->roles()->pluck('name') : null
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
