<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Completed Task') }}
        </h2>
    </x-slot>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Completed Task
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>&nbsp;</th>
                            <th class="w-50">Todo</th>
                            <th>Option</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        <form action="{{ route('tasks.resume', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-warning" type="submit">
                                                Resume
                                            </button>
                                        </form>
                                    </td>
                                    <td class="table-text">
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
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
</x-app>
