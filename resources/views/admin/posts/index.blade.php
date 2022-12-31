@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">文章一覽表</li>
    </ol>
    <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
        <strong>完成！</strong> 成功儲存文章
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('admin.posts.create') }}">新增</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" style="text-align: left">標題</th>
            <th scope="col" style="text-align: right">精選?</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)<!--posts陣列內有幾筆資料就會重複執行幾次-->
            <tr>
                <th scope="row" style="text-align:left">{{ $post->id }}</th><!--印出資料表內的id欄位-->
                <td>{{ $post->title }}</td>
                <td style="text-align: right">{{$post->is_feature}}</td>
                <td style="width: 150px">
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-sm btn-primary">編輯</a>
                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" style="display: inline-block">
                        @method('DELETE')   <!--{{//method_field('DELETE')}}-->
                        @csrf   <!--{{//csrf_field()}}-->
                        <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
