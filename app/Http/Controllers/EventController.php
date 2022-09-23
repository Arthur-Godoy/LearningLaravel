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
        $user = auth()->user();
        $isSub = false;

        $userEvents = $user ? $user->eventAsSubscriber->toArray() : [];

        foreach($userEvents as $userEvent){
            if($userEvent['id'] == $id){
                $isSub = true;
                break;
            }
        }
        return view('events.show',['event' => $event, 'owner' => $owner['name'], 'isSub' => $isSub]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        $eventAsSubscriber = $user->eventAsSubscriber;

        return view('events.dashboard', ['events' => $events, 'eventAsSubscriber' => $eventAsSubscriber, 'user' => $user]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Evento Deletado com Sucesso');
    }

    public function joinEvent($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $userEvents = $user ? $user->eventAsSubscriber->toArray() : [];
        $isSub = false;

        foreach($userEvents as $userEvent){
            if($userEvent['id'] == $id){
                $isSub = true;
                break;
            }
        }

        if($isSub){
            return redirect('/dashboard')->with('msg', 'Você já está inscrito nesse evento');
        }else{
            $user->eventAsSubscriber()->attach($id);
        }

        return redirect('/dashboard')->with('msg', 'sua presença foi confirmada no '.$event->title);
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request) {
        $event = Event::findOrFail($request->id);
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $file=$request->file('image');
            $file->move(public_path('assets/events'), $event->image);
        }

        $data['image'] = $event->image;

        if(is_null($request->items) == 0){
            $data['items'] = $event->items;
        }

        $event->update($data);
        return redirect('/')->with('msg', 'Editado com Sucesso');
    }

    public function leaveEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        $user->eventAsSubscriber()->detach($id);

        return redirect('/dashboard')->with('msg', 'Você se desinscreveu do Evento '.$event->title);
    }
}
