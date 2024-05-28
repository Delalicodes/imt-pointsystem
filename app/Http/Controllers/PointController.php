<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Point;

use Illuminate\Http\Request;

class PointController extends Controller

    {
        public function index()
        {

            $points=Point::all();
            $members = Member::with('points')->get(); // Load all members with their associated points
            return view('points.index', compact('members','points'));


        }


        public function store(Request $request){
            $data= $request->validate([
                'member_id' => 'required', // Make sure member_id is required
                'point' => 'required',      // Also, make sure point is required
            ]);

            $newdata=Point::create($data);

            return redirect()->route('points.index');
        }

}



