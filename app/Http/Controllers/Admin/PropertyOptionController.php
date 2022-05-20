<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOptionRequest;
use App\Models\Property;
use App\Models\PropertyOption;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $propertyOptions = PropertyOption::paginate(10);
        return view('auth.property_options.index', compact('property','propertyOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        return view('auth.property_options.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyOptionRequest $request, Property $property)
    {
        $data = $request->validated();
        $data['property_id'] = $property->id;
        PropertyOption::create($data);
        return to_route('admin.property-options.index', $property);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PropertyOption $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.show', compact('property','propertyOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PropertyOption $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.form', compact('property','propertyOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PropertyOption $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyOptionRequest $request, Property $property, PropertyOption $propertyOption)
    {
        $data = $request->validated();
        PropertyOption::update($data);
        return to_route('admin.property-options.index', $property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PropertyOption $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property, PropertyOption $propertyOption)
    {
        $propertyOption->delete();
        return to_route('admin.property_options.index', $property);

    }
}
