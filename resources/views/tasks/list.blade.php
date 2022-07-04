<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        新增 Todo
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">任務</label>
                                <div class="col-md-6">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        新增
                                    </button>
                                </div>
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
                        任務列表
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>&nbsp;</th>
                            <th class="w-50">Todo</th>
                            <th>選項</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <form action="">
                                        <button class="btn btn-success" type="submit" name="complete" value="1">
                                            完成
                                        </button>
                                    </form>
                                </td>
                                <td class="table-text">
                                    A task
                                </td>
                                <td>
                                    <form action="">
                                        <button type="submit" class="btn btn-danger">
                                            刪除
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="">
                                        <button class='btn btn-warning'>
                                            編輯
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
