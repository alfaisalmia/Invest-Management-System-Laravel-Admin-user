<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use Illuminate\Support\Carbon;



class TicketController extends Controller
{
    public function supportTicket()
    {
        if (Auth::id() == null) {
            abort(404);
        }
        $page_title = "Support Ticketss";
        $general_setting  = GeneralSetting::first();
        $supports = SupportTicket::where('user_id', Auth::id())->latest()->paginate(15);
        $empty_message = 'No Data Found!';
        return view('user.support_ticket', compact('supports', 'page_title', 'empty_message', 'general_setting'));
    }

    public function openSupportTicket()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $page_title = "Support Tickets";
        $general_setting  = GeneralSetting::first();
        $user = Auth::user();
        return view('user.support_create', compact('page_title', 'user', 'general_setting'));
    }

    public function storeSupportTicket(Request $request)
    {



        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);

        $ticket = new SupportTicket();
        $ticket->user_id = Auth::id();
        $random = rand(100000, 999999);
        $ticket->ticket = $random;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();


        $message = new SupportMessage();
        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'ticket created successfully!'];
        return redirect()->route('user.ticket')->withNotify($notify);
    }

    public function viewTicket($ticket)
    {
        $page_title = "Support Tickets";
        $my_ticket = SupportTicket::where('ticket', $ticket)->latest()->first();
        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->latest()->get();
        $user = auth()->user();
        $general_setting  = GeneralSetting::first();
        if (auth()->user()) {
            return view('user.support_view', compact('my_ticket', 'messages', 'page_title', 'user','general_setting'));
        } else {
            return back();
        }
    }

    public function replyTicket(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $message = new SupportMessage();

        if ($request->replayTicket == 1) {
            $this->validate($request, [
                'message' => 'required',
            ]);

            $ticket->status = 2;
            $ticket->last_reply = Carbon::now();
            $ticket->save();

            $message->supportticket_id = $ticket->id;
            $message->message = $request->message;
            $message->save();
            $notify[] = ['success', 'Support ticket replied successfully!'];
        } elseif ($request->replayTicket == 2) {
            $ticket->status = 3;
            $ticket->last_reply = Carbon::now();
            $ticket->save();
            $notify[] = ['success', 'Support ticket closed successfully!'];
        }
        return back()->withNotify($notify);

    }
}
