<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Point;

use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index(){
        $points = Point::with('member')->get();
        $members=Member::all();
        return view('points.index',compact('points','members'));
    }

    public function store( Request $request){
      $data= $request->validate([
        'member_id'=>'required',
        'point'=>'required'

      ]);

      $newdata=Point::create($data);
      return redirect()->route('points.index');


    }
}
