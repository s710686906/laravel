@extends('layouts.default')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div>
            <h2>任务管理系统</h2>
        </div>
        <div class="offset-md-2 col-md-8">
            <section class="user_info">
                @include('shared._user_info', ['user' => $user])
            </section>
            <section class="status_form">
                @include('shared._mission_form')
            </section>
            <hr style="height:10px;border:none;border-top:10px groove black;" />
            <div>
                <h3>任务列表：</h3>
            </div>
            <section class="status">
                @if ($mission->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($mission as $missions)
                            @include('statuses._mission')
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $mission->render() !!}
                    </div>
                @else
                    <p>没有数据！</p>
                @endif
            </section>
        </div>
    </div>
@stop