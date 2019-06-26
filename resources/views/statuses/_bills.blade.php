<li class="media mt-4 mb-4">
    <a href="{{ route('users.bills', $user->id )}}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar"/>
    </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $bill->created_at->diffForHumans() }}</small></h5>
        账单名称：{{ $bill->content }}
        <br/>
        数目：{{ $bill->bills }}
    </div>
    @can('destroy', $bill)
        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger">删除</button>
        </form>
    @endcan
</li>