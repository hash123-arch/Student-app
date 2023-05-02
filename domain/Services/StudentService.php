<?php

namespace domain\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;


class StudentService{
    protected $task;
    public function __construct()
    {
        $this->task = new Student();
    }
    

    public function store($data)
    {
        
    
        return $this->task->create($data);


    

    }



    public function all()
    {
        return $this->task->all();
 
    }
    

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();

        return redirect()->back();
    }

    public function get($task_id)
    {

        return $this->task->find($task_id);

    }

    public function update(array $data , $task_id)
    {
        $task = $this->task->find($task_id);


        $task->update($this->edit($task,$data));


    }

    protected function edit(Student $task , $data)
    {

        return array_merge($task->toArray(),$data);

    }





}

?>