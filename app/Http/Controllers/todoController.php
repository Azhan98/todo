<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\todos;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = todos::all();
        return view('todo', ['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $todos = new todos;
        $todos->task = $request->task;
        $todos->msg = $request->msg;
        $todos->save();
        return redirect(route('index')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $todos = todos::all();
        return view('todo', ['todos'=>$todos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = todos::find($id);
        return view('update', ['todos'=>$todos]);
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
        $todos = todos::find($id);
        $todos->task = $request->task;
        $todos->msg = $request->msg;
        $todos->save();
        return redirect(route('index')); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todos = todos::find($id);
        $todos->delete($id);
        return redirect(route('index'));
    }
}
