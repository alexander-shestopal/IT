@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">List Tasks</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <a href="{{ url('/tasks/create') }}"><button type="button" class="btn btn-secondary m-2">
              Add Task</button>
          </a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Dedline</th>
                <th scope="col">Edit/Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
              <tr>
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->deadline }}</td>
                <td>
                  <a href="{{ route('tasks.edit', $task->id) }}">
                    <button type="button" class="btn btn-success mt-2">Edit</button>
                  </a>
                  <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger mt-2">
                      <i class="fa fa-btn fa-trash"></i>Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection