<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        //
        sleep(2);
        return Inertia::render('AdminComponents/School/Index', [
            'records' => School::all()->map(fn($school) => [
                'id' => $school->school_id,
                'name' => $school->school_name,
                'location' => $school->location,
                'address' => $school->address,
                'phone' => $school->telephone,
                'schedules' => $school->schedules,
                'social' => $school->social,
                'about' => $school->about
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('AdminComponents/School/Create', [
            'SchoolID' => Str::random(8)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $arributes = $request->validate([
           'school_id' => 'required',
           'school_name' => 'required',
           'about' => 'required',
           'address' => 'required',
           'schedules' => 'required',
           'social' => 'required',
           'telephone' => 'required',
           'location' => 'required'
       ]);

        School::create($arributes);
        return redirect('school')->with('success', 'successfully created school');
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

        return Inertia::render("AdminComponents/School/Update", [
            'records' => School::all()->where('school_id', $id)->map(fn($schools) => [
                'school_id' => $schools->school_id,
                'school_name' => $schools->school_name,
                'location' => $schools->location,
                'address' => $schools->address,
                'telephone' => $schools->telephone,
                'about' => $schools->about
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $token): Application|RedirectResponse|Redirector
    {
        $this->validate($request, [
            'school_name' => 'required',
            'about' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'location' => 'required'
        ]);
        School::updateOrCreate([
            'school_id' => $token
        ], [
            'school_name' => $request->school_name,
            'about' => $request->about,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'location' => $request->location,
        ]);
        return redirect('/school')->with('success', 'successfully update to our School');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        School::where('school_id', $id)->delete();
        return redirect('/school')->with('success', 'successfully deleted School');
    }
}
