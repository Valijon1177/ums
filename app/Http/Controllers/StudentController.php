<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Group;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('student.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'name' => 'required|max:255',
            'date_of_birth' => 'nullable|date'
        ]);
        $student = new Student();
        $student->group_id = $request->group_id;
        $student->name = $request->name;
        $student->date_of_birth = $request->date_of_birth;
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
         $groups = Group::all();

        return view('student.edit', ['student' => $student, 'groups' => $groups]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'group_id' => 'required',
            'name' => 'required|max:255',
            'date_of_birth' => 'nullable|date'
        ]);
        $student = Student::Find($id);
        $student->group_id = $request->group_id;
        $student->name = $request->name;
        $student->date_of_birth = $request->date_of_birth;
        $student->save();
        return redirect('/students/'. $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::Find($id);
        $student->delete();
        return redirect()->route('students.index');        
    }
}
