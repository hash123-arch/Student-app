<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facades\StudentFacade;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $task;
    public function __construct()
    {
        $this->task = new Student();
    }
    public function index()
    {
        $response['tasks'] = StudentFacade::all();

        return view('Pages.Student.index')->with($response);
    }
    public function store(Request $request)
    {
        
   
        StudentFacade::store($request->all());

        return redirect()->back();
    }

    public function delete($task_id)
    {
        StudentFacade::delete($task_id);

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = StudentFacade::get($request['task_id']);
        
        return view('Pages.Student.edit')->with($response);
    }

    public function update(Request $request , $task_id )
    {
        StudentFacade::update($request->all(),$task_id);

        return redirect()->back();

    }

   


}
