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
                    <div class="col-sm-6"><h3 class="mb-0">Добавление пользователя</h3></div>
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
                    <div class="col-12">
                        <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Name" autocomplete="off">
                                @error('name')
                                    <div class="text-danger">Это поле обязятально для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control mb-2" name="email" id="email" placeholder="Email" autocomplete="off">
                                @error('email')
                                <div class="text-danger">Это поле обязятально для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control mb-2" name="password" id="password" placeholder="Password" autocomplete="off">
                                @error('password')
                                <div class="text-danger">Это поле обязятально для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h6>Выберите роль</h6>
                                <select name="role" class="form-select mb-3" aria-label="Default select example">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
