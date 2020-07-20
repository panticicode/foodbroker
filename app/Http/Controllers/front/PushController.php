<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PushOrder;
use App\User;
use App\Models\CartItem;
use Auth;
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
        $carts = CartItem::all();
        $notify = User::whereIn('id', [1,2])->get();

        if(count($carts) > 0)
        {
            Notification::send($notify,new PushOrder);
            CartItem::whereIn('user_id', [Auth::id()])->delete();
        }
        else
        {
            return redirect('order');
        }
        return redirect()->back();
    }
}
