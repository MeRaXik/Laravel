<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function show($id)
    {
        $person = People::find($id);
        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }
        return response()->json($person);
    }
    
    public function update(Request $request, $id)
    {
        $person = People::find($id);
        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }
        $person->name = $request->input('name');
        $person->phone_number = $request->input('phone_number');
        $person->street = $request->input('street');
        $person->city_country = $request->input('city_country');
        $person->save();
        return response()->json($person);
    }
    
    public function index()
    {
        $people = People::all();
        return response()->json($people);
    }
    
    public function store(Request $request)
    {
        $person = new People();
        $person->name = $request->input('name');
        $person->phone_number = $request->input('phone_number');
        $person->street = $request->input('street');
        $person->city_country = $request->input('city_country');
        $person->save();
        return response()->json($person, 201);
    }
    public function destroy($id)
    {
        $person = People::find($id);
        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }
        $person->delete();
        return response()->json(['message' => 'Person deleted']);
    }
    
};