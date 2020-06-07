<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('id', 'desc')->get();

        return view('backend.pages.districts.index')->with('districts', $districts);
    }

    public function create()
    {
        $divisionse = Division::orderBy('id', 'desc')->get();
        return view('backend.pages.districts.create', compact('divisionse'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
       ]);

        $district = new District;

        $district->name = $request->name;
        $district->division_id = $request->division_id;

        $district->save();

        session()->flash('message', 'District created Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.districts.create');

    }

    public function edit($id)
    {
        $divisionse = Division::orderBy('id', 'desc')->get();
        $district = District::find($id);
        return view('backend.pages.districts.edit', compact('district', 'divisionse'));
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
       ]);

        $district = District::find($id);

        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();



        session()->flash('message', 'district Updated Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.districts.index');

    }

    public function delete($id)
    {

        $district = District::find($id);

        if(!is_null($district)){

            $district->delete();

            session()->flash('message', 'Category Delete Successfully');
            session()->flash('type', 'success');

            return redirect()->back();
      }

    }
}
