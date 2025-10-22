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
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="mb-0">Пост {{ $post->title }}</h1>
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="text-success">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <table class="table table-striped" role="table">
                                    <tbody>
                                    <tr class="align-middle">
                                        <td>ID</td>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>Название</td>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>Контент</td>
                                        <td>{{ strip_tags($post->content) }}</td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>ID Категории</td>
                                        <td>{{ $post->category_id }}</td>
                                    </tr>
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
