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
    public function index(Request $request)
    {
        $query = Event::with(['category', 'country', 'city', 'district', 'images']);

        // Filter by category
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by city
        if ($request->has('city_id') && !empty($request->city_id)) {
            $query->where('city_id', $request->city_id);
        }

        // Get paginated results
        $events = $query->paginate(9);

        // Get all categories and cities for filter dropdowns
        $categories = Category::all();
        $cities = City::all();

        return view('Events.index', compact('events', 'categories', 'cities'));
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
        $event = Event::with(['category','country','city','district','images','user'])->find($id);

        $similarEvents = Event::with(['images'])
            ->where('category_id', $event->category_id)
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('Events.show', compact('event', 'similarEvents'));
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
