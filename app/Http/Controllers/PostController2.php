<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return "The controller works perfectly with a passing variable in it ".$id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'We have creating a method using route resources ';
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
    public function show($id)
    {
        //
        return 'Something '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'You are editing a specific resource using resources '.$id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //here we have made a custom method in the controller that by default must return a view
    //in this method we have a parameter that is passed in the route and it is returning here with the view
    public function contact($name, $surname) {
        //return view('contact')->with('name', $name);
        //here we are using build in function compact to pass multiple variables in the view
        return view('contact', compact('name','surname'));
    }

    public function custom($name, $surname){
        return view('custom', compact('name', 'surname'));
    }

    //here we have a function that saves an array of people and returns it in the view
    public function people(){
        $people = ['Alexandr', 'Vasile', 'Ion'];
        return view('contact', compact('people'));
    }
}
