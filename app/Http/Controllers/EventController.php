<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {

        $search = request('search');
        ($search) ?
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get()
        :
            $events = Event::all();
        ;

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->name;
        $event->city = $request->city;
        $event->private= $request->privacy;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('assets/events'), $filename);
            $event->image = $filename;
        }

        $event->save();
        return redirect('/')->with('msg', 'Evento Criado com Sucesso');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show',['event' => $event]);
    }
}
