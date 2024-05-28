<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Course;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        $members = Member::with(['course', 'points'])->get();
        $selectedDay = $request->input('day');
        $points = Point::all();
        $courses = Course::all();
        $groupByDay = Point::select(DB::raw('DAYNAME(created_at) as day_name'), DB::raw('DATE(created_at) as day_date'), DB::raw('count(*) as total'))
        ->groupBy('day_name', 'day_date')
        ->get();

    return view('members.index', compact('members', 'courses', 'points', 'groupByDay'));

    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'email' => 'required'

        ]);

        $newdata = Member::create($data);

        return redirect(route('members.index'));


        // return redirect()->route('members.create');
    }



    public function create()
    {
        $courses = Course::all();

        return view('members.create', compact('courses'));
    }

    public function show()
    {
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'points' => 'nullable|integer'

        ]);
        $member = Member::find($id);
        $member->update($data);
        return redirect()->route('members.index');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect(route('members.index'));
    }

    public function edit($id)
    {
        $member = Member::find($id);
        if (!$member) {
            return redirect()->route('members.index')->with('error', 'Member not found');
        }
        $courses = Course::all();

        return view('members.edit', compact('member', 'courses'));
    }


   // app/Http/Controllers/MemberController.php





    // Method to display the members' league

}


