<form action="{{ route('statuses.store') }}" method="POST">
    <div>
        <h1>日程管理</h1>
    </div>
    @include('shared._errors')
    {{ csrf_field() }}
    <textarea class="form-control" rows="3" placeholder="发布日程" name="content">{{ old('content') }}</textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">发布</button>
    </div>
</form>