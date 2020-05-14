<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Support\Facades\DB;

class BufferController extends Controller
{
    public function index(Request $request)
    {
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }
        $search = $request->input('search');
        $date = $request->input('date');
        $group_p = $request->input('group');

        $bufferPosts = BufferPosting::latest()->search($search,$date,$group_p)->paginate(20);
        // if($request->input()){
            // $bufferPosts = BufferPosting::Where('post_text', 'like', '%' . $request->input('select_search') . '%')->orWhere('sent_at', 'like', '%' . $request->input('select_date') . '%')->orWhere('group_id', 'like', '%' . $request->input('select_group') . '%')
            // ->paginate(10);
            // dd($bufferPosts);     
        // }
        foreach ($bufferPosts as $key => $value) {
            $groupInfo[] = BufferPosting::find($value->id)->groupInfo;
            $accountInfo[] = BufferPosting::find($value->id)->accountInfo;
        }
        $groups = SocialPostGroups::all();
        return view('group.bufferpost', [ 'bufferPosts'=> $bufferPosts, 'groupInfo'=>$groupInfo,'accountInfo'=>$accountInfo, 'groups'=>$groups, 'search'=>$search, 'date'=>$date, 'group_p'=>$group_p, ]);

    }
   
}
