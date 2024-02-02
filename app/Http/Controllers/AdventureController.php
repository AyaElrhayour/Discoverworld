<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use GuzzleHttp\Client;
use App\Models\Adventure;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdventureController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->get('https://restcountries.com/v3.1/all');
            $countriesData = $response->getBody()->getContents();
            $countriesData = json_decode($countriesData, true);
            $countries = array_column($countriesData, 'name', 'common');

            $destinations = $request->input('destinations');
            $orderBy = $request->input('order_by');

            $adventuresQuery = Adventure::with('images');

            if ($destinations) {
                $adventuresQuery->where('destinations', 'like', '%' . $destinations . '%');
            }

            // Add ordering based on the selected option
            if ($orderBy === 'latest') {
                $adventuresQuery->orderBy('created_at', 'desc');
            } elseif ($orderBy === 'earliest') {
                $adventuresQuery->orderBy('created_at', 'asc');
            } else {
                $adventuresQuery->latest();
            }

            $totalAdventures = Adventure::count();
            $totalUsers = User::count();

            $mostVisitedDestination = Adventure::select('destinations', DB::raw('count(*) as total'))
                ->groupBy('destinations')
                ->orderByDesc('total')
                ->first();

            $adventures = $adventuresQuery->simplePaginate(6);

            return view('adventures.index', compact('adventures', 'countries', 'totalAdventures', 'totalUsers', 'mostVisitedDestination'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch data.');
        }
    }





    public function show(Adventure $adventure)
    {
        return view('adventures.show', [
            'adventure' => $adventure
        ]);
    }

    public function create(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->get('https://restcountries.com/v3.1/all');
            $countriesData = $response->getBody()->getContents();
            $countriesData = json_decode($countriesData, true);
            $countries = array_column($countriesData, 'name', 'common');
            return view('adventures.create', ['countries' => $countries]);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to fetch countries data.');
        }
    }


    public function store(Request $request)
    {
        $adventure = new Adventure();
        $adventure->title = $request->title;
        $adventure->description = $request->description;
        $adventure->tips = $request->tips;
        $adventure->destinations = $request->destinations;
        $adventure->user_id = auth()->id();
        $adventure->save();


        $this->imageService->store($request->file('images'), $adventure);

        return redirect('/')->with('message', 'Adventure created successfully!');
    }




    public function edit(Adventure $adventure)
    {
        return view('adventures.edit', ['adventure' => $adventure]);
    }


    public function update(Request $request, Adventure $adventure)
    {

        //Check if the user is owner
        if ($adventure->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'description' => ' required',
            'tips' => ' required',
            'destinations' => 'required',

        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $adventure->update($formFields);

        return back()->with('message', 'adventure Updated Successfully!');
    }




    public function delete(Adventure $adventure)
    {

        //Check if the user is owner
        if ($adventure->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $adventure->delete($adventure);
        return redirect('/')->with('message', 'The Adventure Was Deleted');
    }


    public function manage()
    {
        return view('adventures.manage', ['adventures' => auth()->user()->adventures()->get()]);
    }
}
