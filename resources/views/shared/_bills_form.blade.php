<form action="{{ route('bills.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <div>账单名称：</div>
    <textarea class="form-control" rows="3" placeholder="" name="content">{{ old('content') }}</textarea>
    <div>收入/支出：</div>
    <textarea class="form-control" rows="1" placeholder="请输入数字" name="bills">{{ old('bills') }}</textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">发布</button>
    </div>
</form>