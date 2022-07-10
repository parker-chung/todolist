<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        Add a To-do Task
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-2 col-form-label text-center">Task</label>
                                <div class="col-md-8">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary rounded-pill px-3">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Task
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>&nbsp;</th>
                            <th class="w-50">Todo</th>
                            <th>Option</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @auth
                                @unless($tasks->isEmpty())
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>
                                                <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                    <button class="btn btn-success" type="submit" name="complete"
                                                        value="1">
                                                        Complete
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="table-text py-3">
                                                {{ $task->name }}
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}">
                                                    <button class='btn btn-warning'>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="py-8 border-t border-b border-gray-300 text-lg" colspan="4">
                                            <p class="text-center my-3">No Tasks</p>
                                        </td>
                                    </tr>
                                @endunless
                            @else
                            <td colspan="4" class="text-center">
                                <span>Login in to add a task</span>
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-info text-white ml-3 rounded-pill">Login</button>
                                </a>
                            </td>
                            @endauth
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app>
