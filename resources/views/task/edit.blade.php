@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Task</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" value="{{$task->title}}" />
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control" value="{{$task->description}}" />
            </div>
           
            <div class="form-group">
              <label for="inputStatus">Status</label>
              <input type="text" name="status" id="inputStatus" aria-describedby="helpStatus" class="form-control"  value="{{$task->status}}" />
              <small id="helpStatus" class="form-text text-muted">
                Your status must be 'not_start','pending','completed'.
              </small>
            </div>


            <div class="form-group">
              <label for="inputDeadline">Deadline</label>
              <input type="text" name="deadline" id="inputDeadline" aria-describedby="helpDeadline" class="form-control" value="{{$task->deadline}}" />
              <small id="helpDeadline" class="form-text text-muted">
                   Your date cannot be less than today.
              </small>
            </div>
            <button type="submit" class="btn btn-primary m-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection