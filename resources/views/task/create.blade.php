@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> Create Task </div>

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
          <form action="{{ url('/tasks') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" placeholder="title" />
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control" placeholder="description" />
            </div>
            <div class="form-group">
              <label for="inputStatus">Status</label>
              <input type="text" name="status" id="inputStatus" aria-describedby="helpStatus" class="form-control" placeholder="status" />
              <small id="helpStatus" class="form-text text-muted">
                Your status must be 'not_start','pending','completed'.
              </small>
            </div>

            <div class="form-group">
              <label for="inputDeadline">Deadline</label>
              <input type="date" name="deadline" id="inputDeadline" aria-describedby="helpDeadline" class="form-control" placeholder="deadline"  />
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