<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PushOrder;
use App\User;
use App\Models\PushNotification;
use App\Models\CartItem;
use Auth;
use Session;
use Notification;

class PushController extends Controller
{
    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);

        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);
        
        return response()->json(['success' => true],200);
    }

    /**
     * Send Push Notifications to all users.
     * 
     * @return \Illuminate\Http\Response
     */
    public function push(){
        $notification = PushNotification::all();//OVDE MORAM NAPRAVITI DRUGU TABELU 
        $notify = User::whereIn('id', [1,2])->get();
        //Notification::send($notify,new PushOrder);

        if(count($notification) > 0)
        {
            Notification::send($notify,new PushOrder);
            PushNotification::whereIn('user_id', [Auth::id()])->delete();
            CartItem::whereIn('user_id', [Auth::id()])->update(['is_send' => 0]);
        }
        else
        {
            return redirect('order');
        }
        Session::flash('success', 'Uspešno ste poslali Vašu porudžbenicu');
        return redirect()->back();
    }
}
