<form action="{{ route('mission.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <textarea class="form-control" rows="3" placeholder="请按时完成任务." name="content">{{ old('content') }}</textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">录入</button>
    </div>
</form>