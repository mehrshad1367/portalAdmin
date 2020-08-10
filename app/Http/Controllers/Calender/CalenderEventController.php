<?php

namespace App\Http\Controllers\Calender;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;


class CalenderEventController extends Controller
{
    public function show()
    {
        $events = Event::all();
//        $events = $events->toArray();

        return view('calender.index', compact('events'));
    }

    public function index()
    {
        if(request()->ajax())
        {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
            return Response::json($data);
        }
        $events = Event::all();
        $events = $events->toArray();

        return view('calender.index',compact('events'));
//        return response()->json(array(
//            'success' => true,
//            'data' => $events
//        ));
    }

    public function create(Request $request)
    {
        $insertArr=[
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
        ];

        $event = Event::Insert($insertArr);
        return Response::json($event);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
