@extends('admin.layouts.master')

@section('page-title', 'Create article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
        <strong>錯誤！</strong> 請修正以下問題：
        <ul>
            <li>錯誤 1</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form action="{{route('admin.posts.store')}}" method="post"><!--用post方法將表單內的資料傳送到路由admin.posts.store-->
        <!--新增一筆新的資料-->
        <!--模擬HTML表單沒辦法做的動作(PUT、PATCH、DELETE)-->
        <!--laravel主要是用這個方法來確認要做甚麼動作-->
        @method('post')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">文章標題</label>
            <!--回傳時會把name包裝成key，填入的內容包裝成value-->
            <input name="title" id="title" type="text" class="form-control" placeholder="請輸入文章標題"><!--單行輸入框-->
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">文章內容</label>
            <textarea name="content" id="content" class="form-control" rows="10" placeholder="請輸入文章內容"></textarea><!--多行輸入框-->
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
