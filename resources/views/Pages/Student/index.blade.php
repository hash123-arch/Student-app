@extends('Layouts.app')

@section('content')

<h1 class="mt-5 text-center display-5">Student Portal</h1>
<form class="mt-5 row g-3" action="{{  route('Student.store')  }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-auto">
      <label for="staticEmail2">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="col-auto">
      <label for="inputPassword2">Age</label>
      <input type="text" class="form-control" name="Age">
    </div>
    
  <div class="col-auto">
    <label for="exampleFormControlInput1" class="form-label">Status</label>
    <div class="form-check">
        <input class="form-check-input" type="radio"  name="status" value="Active">
        <label class="form-check-label" for="flexRadioDefault1">
          Active
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio"  name="status" value="Inactive">
        <label class="form-check-label" for="flexRadioDefault2">
          Inactive
        </label>
      </div>
  </div>
 
  <button class="btn btn-success">Submit Data</button>
</form>


<table class="table table-success table-striped mt-5">
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
      
        <th scope="col">Age</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $key => $task)
      <tr>
        <th scope="row">{{++$key }}</th>
        <td>{{$task->name}}</td>
       
        <td>{{$task->age}}</td>
        @if($task->status == 'Active')
        <td><span class="badge text-bg-success">Active</span></td>
        @else
        <td><span class="badge text-bg-danger">Inactive</span></td>
        @endif
      
        <td>


          <button class="btn btn-danger"><a href="{{route('Student.delete',$task->id)}}" style="color:#fff"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" ><a href="javascript:void(0)" style="color:#fff" onclick="editModal({{$task->id}})"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
        </td>
      @endforeach
    </tr>
    </tbody>

    
</table>

@endsection



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="taskeditcontent">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<script>
  function editModal(task_id){
    var data ={
      task_id:task_id,
    };

    $.ajax({
      url:"{{ route('Student.edit') }}",
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

      },
      type:'GET',
      dataType:'',
      data:data,
      success:function(response){
        $('#exampleModal').modal('show');
        $('#taskeditcontent').html(response);
      }
    });
  }
</script>
