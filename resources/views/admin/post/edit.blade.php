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
                    <div class="col-sm-6"><h3 class="mb-0">Редактирование поста</h3></div>
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
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="w-25" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <input type="text" class="form-control mb-2" name="title" id="title" placeholder="Название поста"
                                       value="{{ $post->title }}">
                            </div>
                            <div class="form-group mb-3" style="width: 600px;">
                                <div id="editor" style="height: 150px"></div>
                                <input type="hidden" name="content" value="{{ $post->content }}">
                            </div>
                            <div class="form-group">
                                <h6>Добавить превью</h6>
                                <div class="w-100 mb-2">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="" class="w-50">
                                </div>
                                <div class="input-group mb-3" style="width: 600px;">
                                    <input type="file" class="form-control" id="inputGroupFile01" name="preview_image">
                                    <label class="input-group-text" for="inputGroupFile01">Загрузка</label>
                                </div>
                                <h6>Добавить изображение</h6>
                                <div class="w-100 mb-2">
                                    <img src="{{ url('storage/' . $post->main_image) }}" alt="" class="w-50">
                                </div>
                                <div class="input-group mb-3" style="width: 600px;">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="main_image">
                                    <label class="input-group-text" for="inputGroupFile02">Загрузка</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6>Выберите категорию</h6>
                                <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ $category->id == $post->category_id ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <h6>Тэги</h6>
                                <select id="tags" name="tag_ids[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                                {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? 'selected' : '' }}
                                        >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
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
