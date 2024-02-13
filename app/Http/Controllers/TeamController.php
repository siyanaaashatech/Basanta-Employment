<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = Team::all();
        $teams = Team::all();

        // Return the teams to a view for display
        return view('backend.team.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new team
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone_no' => 'required',
            'role' => 'nullable',
            'email' => 'nullable|email',
        ]);

        // Create a new team instance
        $team = new Team();

        // Fill the team instance with request data
        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->phone_no = $request->input('phone_no');
        $team->role = $request->input('role');
        $team->email = $request->input('email');

        // Save the team to the database
        $team->save();

        // Redirect to the team index page with a success message
        return redirect()->route('admin.teams.index')->with('success', 'Team member created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $teamMember)
    {
        // Return the view for editing the team member
        return view('backend.team.update', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone_no' => 'required',
            'role' => 'nullable',
            'email' => 'nullable|email',
        ]);
        $teamMember = Team::findOrFail($id);

        // Update the team member with request data
        $teamMember->update([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'phone_no' => $request->input('phone_no'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
        ]);

        // Redirect to the team index page with a success message
        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // Delete the team member
        $team->delete();

        // Redirect to the team index page with a success message
        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully.');
    }
}
