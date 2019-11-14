<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use DB;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class ClassroomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function add()
    {

        return view('classroom.add');
    }

    public function store()
    {

        $classroom = new Classroom();

        $data = request('frm');


        $classroomInfo = Classroom::retrieveClass($data['id']);


        if (!isset($classroomInfo)) {
            $classroom->save($data);
        } else {
            return \Redirect::back()->withErrors([$data['id'] . ' class is already defined.']);
        }


        return redirect('/classroom/list');

    }

    public function list()
    {

        $classrooms = Classroom::retrieveAll();

        return view('classroom.list', ['classrooms' => $classrooms]);
    }

    public function edit($id)
    {
        $classroomInfo = Classroom::retrieveClass($id);


        return view('classroom.edit', ['classroomInfo' => $classroomInfo]);
    }

    public function update($id)
    {

        $classroom = new Classroom();

        $data = request('frm');

        $classroomInfo = Classroom::retrieveClass($data['id']);


        if (isset($classroomInfo) && $data['id'] == $id) {
            $classroom->save($data, $id);
        } elseif (!isset($classroomInfo)) {
            $classroom->save($data, $id);
        } else {
            return \Redirect::back()->withErrors([$data['id'] . ' class is already defined.']);
        }


        return redirect('/classroom/list');

    }

    public function delete($id)
    {
        $classroom = new Classroom();
        $classroom::delete($id);


        return redirect('/classroom/list');

    }

    public function composition($id)
    {
        $studentsList = Student::retrieveStudentClass($id);

        $count = Count($studentsList);

        $classroom = Classroom::retrieveById($id);

        if ($count == $classroom->capacity) {
            $full = 1;
        } else {
            $full = 0;
        }

        $students = Student::retrieveStudentWithoutClass();

        return view('classroom.composition', ['students' => $students, 'classroomId' => $id, 'studentsList' => $studentsList, 'full' => $full]);
    }

    public function classComposition(Request $request, $id)
    {
        $students = $request->input('frm');
        $studentClass = new Student();


        foreach ($students as $studentId) {
            $studentClass->save(['classId' => $id], $studentId);
        }


        return redirect('/classroom/list');
    }

    public function deleteStudent($id)
    {

        $studentClass = new Student();

        $studentClass->save(['classId' => ''], $id);

        return redirect('/classroom/list');
    }


}
