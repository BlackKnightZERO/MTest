<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Support\Facades\DB;

class BufferController extends Controller
{
    public function index()
    {
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }
        $bufferPosts = BufferPosting::paginate(10);

        foreach ($bufferPosts as $key => $value) {
            $groupInfo[] = BufferPosting::find($value->id)->groupInfo;
            $accountInfo[] = BufferPosting::find($value->id)->accountInfo;
        }
        $groups = SocialPostGroups::all();
        return view('group.bufferpost', [ 'bufferPosts'=> $bufferPosts, 'groupInfo'=>$groupInfo,'accountInfo'=>$accountInfo, 'groups'=>$groups ]);
    }

    public function getBySelect($any)
    {
        return "any";   
    }
    // public function getajax(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = DB::table('buffer_postings')
    //             ->join('social_post_groups', 'buffer_postings.group_id', '=', 'social_post_groups.id')
    //             ->join('social_accounts', 'buffer_postings.account_id', '=', 'social_accounts.id')
    //             ->select(
    //                 'buffer_postings.post_text as b_text',
    //                 'buffer_postings.sent_at as b_time',
    //                 'social_post_groups.type as b_type', 
    //                 'social_accounts.name as b_name', 
    //                 'social_post_groups.name as b_name2'
    //             )
    //             ->get();

    //             return $data;
    //     }
    // }
}
