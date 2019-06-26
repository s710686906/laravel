@extends('layouts.default')
@section('title', $user->name)

@section('content')
    <div>
        <h2>账单管理系统</h2>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="user_info">
                @include('shared._user_info', ['user' => $user])
            </section>
            <section class="status_form">
                @include('shared._bills_form')
            </section>
            <hr style="height:10px;border:none;border-top:10px groove black;" />
            <section class="status">
                <h3>账单明细：</h3>
                @if ($bills->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($bills as $bill)
                            @include('statuses._bills')
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $bills->render() !!}
                    </div>
                @else
                    <p>没有数据！</p>
                @endif
            </section>
            <hr style="height:10px;border:none;border-top:10px groove black;" />
            <div><h3>账单统计：</h3></div>
        </div>
    </div>
@stop