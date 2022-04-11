<?php

namespace App\Http\Controllers\User;

use App\Models\Chat;
use App\Models\User;
use App\Models\ChatContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function chat($lang, $id)
    {

        // get chats fo loged in user by last message
        $chats = Chat::where("user_1", auth()->user()->id)->orWhere("user_2", auth()->user()->id)->get();
        $selectedchat = Chat::find($id);
        if ($selectedchat->status == 1) {
            $messages = ChatContent::where("chat_id", $id)->get();
            return view("front.chat.chat", compact("chats", "selectedchat"));
        } else {
            return redirect()->back()->with("fail", "این چت به دلیل تخلف توسط ادمین بسته شده و اکانت شما تحت برسی قرار گرفته.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat = Chat::find($request->chat_id);
        global $otherstatus;
        global $mystatus;
        //  find who is another contact
        if (auth()->user()->id == $chat->user_1) {
            $myadad = '1';
            $otheradad = '2';
            $otherstatus = 'user_' . $otheradad . '_status';
            $mystatus = 'user_' . $myadad . '_status';
        } else {
            $myadad = '2';
            $otheradad = '1';
            $otherstatus = 'user_' . $otheradad . '_status';
            $mystatus = 'user_' . $myadad . '_status';
        }

        if ($chat->status == 1) {
            $cotent = new ChatContent();
            $cotent->message = $request->message;
            $cotent->chat_id = $request->chat_id;
            $cotent->sender_id = auth()->user()->id;
            $cotent->receiver_id = $request->receiver_id;
            $cotent->save();
            $chat->save();
            return response()->json(["data" => "ok"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function chatstatus($id)
    {
        //
    }

    public function getmessages($id)
    {
        $selectedchat = Chat::where("id", $id)->with("messages")->first();
        if ($selectedchat->status == 1) {
            return response()->json(['selectedchat' => $selectedchat]);
        } else {
            return redirect()->route("moshaver.chat")->with("fail", "این چت به دلیل تخلف توسط ادمین بسته شده و اکانت شما تحت برسی قرار گرفته.");
        }
    }
    public function chatcheck($lang, $id)
    {

        $order = Order::find($id);
        $user = $order->user_id;
        $archive = $order->archive;
        $chat = Chat::where([["user_1", auth()->user()->id], ["user_2", $user]])->orWhere([["user_2", auth()->user()->id], ["user_1", $user]])->first();
        if ($chat == null) {
            $chat = new Chat();
            $chat->archive_id = $archive->id;
            $chat->user_1 = auth()->user()->id;
            $chat->user_2 = $user;
            $chat->save();
            return redirect()->route("user.chat.message", $chat->id);
        } else {
            return redirect()->route("user.chat.message", $chat->id);
        }
    }
}
