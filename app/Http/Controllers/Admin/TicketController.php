<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Comment;
use Auth;
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

        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $ticket = Ticket::create([
            'title' => $request->title,
            'content'=> $request->content,
            'slug'=> str_slug($request->title),
            'status'=> 1,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('admin.tickets.index');
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
        $comments = Comment::where('post_id', $id)->get();

        return view('ticket.show', compact('ticket', 'comments'));
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

        return view('ticket.edit', compact('ticket'));
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
        $ticket = Ticket::findOrFail($id)->update([
            'title' => $request->title,
            'content'=> $request->content,
            'slug'=> str_slug($request->title),
            'status'=> ($request->status)??0,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('admin.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        
        return redirect()->route('admin.tickets.index');
    }
}
