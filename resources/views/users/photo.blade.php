@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div><h3>照片管理</h3></div>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <section class="user_info">
            @include('shared._user_info', ['user' => $user])
        </section>
        <hr style="height:10px;border:none;border-top:10px groove black;" />
        <div>照片列表：</div>
        <hr style="height:10px;border:none;border-top:10px groove black;" />
    <div>

    </div>
        <div><h5>图片上传：</h5></div>
        <form action="/Home/SaveFile1" method="post" enctype="multipart/form-data">
            <input type="file" class="file1" name="file1" />
            <button type="submit" class="but1">上传</button>
        </form>

    </div>
</div>
@stop