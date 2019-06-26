<?php

namespace App\Http\Controllers;
use App\Model\Mission;
use Auth;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->mission()->create([
            'content' => $request['content']
        ]);
        session()->flash('success', '录入成功！');
        return redirect()->back();
    }

    public function destroy(Mission $mission)
    {
        $this->authorize('destroy', $mission);
        $mission->delete();
        session()->flash('success', '已被成功删除！');
        return redirect()->back();
    }
}
