<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Requests\TicketRequest;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('admin.ticket.index', compact('tickets'));
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
    public function store(Request $request)
    {
        $tickets = new Ticket;
        $tickets->title = $request->title;
        $tickets->content = $request->content;
        $tickets->slug = str_slug($request->title);
        $tickets->status = $request->status;
        $tickets->user_id = Auth::user()->id; //Id User logining
        $tickets->save();

        return redirect('/tickets/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return  view('admin.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.ticket.edit')->with(compact('ticket'));
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
        $ticket = Ticket::findOrFail($id);
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        $ticket->slug = str_slug($request->title);
        $ticket->status = $request->status;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return redirect('tickets')->with('success', 'New support ticket has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tickets = Ticket::findOrFail($id);
        $tickets->delete($id);

        return redirect()->route('tickets.index');
    }
}
