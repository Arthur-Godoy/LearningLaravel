<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

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
        $event->user_id = auth()->user()->id;
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
        $owner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show',['event' => $event],['owner' => $owner['name']]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events' => $events],['user' => $user]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Evento Deletado com Sucesso');
    }
}
