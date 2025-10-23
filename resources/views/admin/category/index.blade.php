@extends('admin.layouts.main')
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Категории</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Категории</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-1">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-2">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <table class="table table-striped" role="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 100px" scope="col">ID</th>
                                        <th scope="col">Категории</th>
                                        <th scope="col" colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="align-middle">
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.category.show', $category->id) }}">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                   class="text-success">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="bi bi-trash text-danger"></i>
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
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
