<form action="{{route('Student.update',$task->id)}}" method="POST" enctype="multipart/form">
    @csrf
    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Name</label>
      <input type="text" class="form-control" name="name" value="{{$task->name}}">
    </div>
    <div class="mb-3">
      <label for="message-text" class="col-form-label">Age</label>
      <input type="text" class="form-control" name="Age" value="{{$task->age}}">
    </div>
    <div class="mb-3">
      <label for="message-text" class="col-form-label">Status</label>
      <input type="text" class="form-control" name="status" value="{{$task->status}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>