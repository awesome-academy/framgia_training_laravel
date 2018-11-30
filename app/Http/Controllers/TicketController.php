<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;  
use App\Http\Requests\TicketRequest;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTicket = Ticket::all();

        return view('admin.ticket.list', compact('listTicket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        //dd($request->all());
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        $ticket->slug = str_slug($request->title);
        $ticket->status = $request->status;
        $ticket->user_id = Auth::user()->id; //Id User logining
        $ticket->save();

        return redirect()->route('tickets.index')->with('thongbao', trans('message.create_success_t'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = ticket::findOrFail($id);

        return view('admin.ticket.show', compact('ticket'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = ticket::findOrFail($id);

        return view('admin.ticket.edit', compact('ticket'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        $ticket = Ticket::findorFail($id);
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        $ticket->slug = str_slug($request->title);
        $ticket->status = $request->status;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return redirect()->route('tickets.index')->with('thongbao', trans('message.setting_success_t'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ticket = ticket::destroy($id);

        return redirect()->route('tickets.index')->with('thongbao', trans('message.delete_t'));

    }
}
