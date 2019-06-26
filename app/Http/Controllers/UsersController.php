<?php

namespace App\Http\Controllers;
use App\Model\Status;
use App\Model\User;
use Auth;
use Mail;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //中间件
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store','index']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    //
    public function create()
    {
        return view('users.create');
    }
    public function show(User $user)
    {
        $statuses = $user->statuses()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('users.show', compact('user', 'statuses'));
    }
    public function bills(User $user)
    {
        $bills = $user->bills()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
//        $bills = $user->bills()
//            ->orderBy('created_at', 'desc');
        return view('users.bills', compact('user', 'bills'));
    }
    public function mission(User $user)
    {
        $mission = $user->mission()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('users.mission', compact('user', 'mission'));
    }
    public function photo(User $user)
    {
        return view('users.photo', compact('user'));
    }
    //注册
    public function store(Request $request)
    {   //验证
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6',
            'phone' => 'nullable|numeric'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        if ($request->phone) {
            $data['phone'] = $request->phone;
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = $user->name . '通讯录';
        return view('users.show_follow', compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = $user->name . '的粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }

}
