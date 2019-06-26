<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bills;
use Auth;

class BillsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140',
            'bills' => 'required|numeric'
        ]);

        Auth::user()->bills()->create([
            'content' => $request['content'],
            'bills' => $request['bills']
        ]);
        session()->flash('success', '发布成功！');
        return redirect()->back();
    }
    public function destroy(Bills $bill)
    {
        $this->authorize('destroy', $bill);
        $bill->delete();
        session()->flash('success', '账单已被成功删除！');
        return redirect()->back();
    }
}
