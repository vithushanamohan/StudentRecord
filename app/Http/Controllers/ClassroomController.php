<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms=Classroom::all();
        return view('classrooms.index',compact($classroom));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_name' => 'required',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classrooms=Classroom::find($id);
        return view('classrooms.show', compact('classrooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom=Classroom::find($id);
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'teacher_name' => 'required',
        ]);
        $classroom=Classroom::find($id);
        $classroom->update($request->all());
        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom=Classroom::find($id);

        $classroom->delete();
        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully');
    }
}
