<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

  public function index()  {
    $courses=Course::all();
    return view('courses.index',['courses'=>$courses]);

  }


    public function create(){

    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required'
        ]);

        $newdata= Course::create($data);

        return redirect()->route('courses.index');


    }

    public function edit($id){

            $course= Course::find($id);
            return view('courses.edit', ['course' => $course]);


    }

    public function update( Request $request, $id){
        $data = $request->validate([
            'name' => "required",

        ]);

        $course = Course::find($id);

        $course->update($data);
        return redirect()->route('courses.index',['id'=>$course->id]);
}

public function destroy($id){

    $course = Course::find($id);
    $course->delete();
    return redirect()->route('courses.index');


}


}
