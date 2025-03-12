<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\City;
use App\Models\District;

use Illuminate\Http\Request;
use App\Models\Event;
class EventsController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $countries=Country::all();
        $cities=City::all();
        $districts=District::all();
        $events = Event::with(['category','country','city','district','images'])->get();
        return view('Events.index', compact('events','categories','countries','cities','districts'));
    }

    public function create()
    {
        // return view('Events.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $event = Event::with(['category','country','city','district','images'])->find($id);
        return view('Events.show', compact('event'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function filterEvents(Request $request)
    {
    
        // Convert request parameters to integers before using them in the query
        $countryId = (int) $request->input('country_id');
        $cityId = (int) $request->input('city_id');
        $districtId = (int) $request->input('district_id');
        $categoryId = (int) $request->input('category_id');

        $events = Event::where('country_id', $countryId)->where('city_id', $cityId)->where('district_id', $districtId)->where('category_id', $categoryId)->with(['category','country','city','district','images'])->get();

        // $events = $query->get();
    
        // Return events as JSON or HTML (depending on your response structure)
        return response()->json([
            'html' => view('events.partials.event_list', compact('events'))->render(),
        ]);
    }
}
