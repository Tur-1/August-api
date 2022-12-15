<?php

namespace {namespace};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use {ModulePath}\Requests\Store{Model}Request;
use {ModulePath}\Requests\Update{Model}Request;
use {ModulePath}\Services\{Model}Service;


class {Class_Name}Controller extends Controller
{


    private ${modelVariable}Service;

    public function __construct({Model}Service ${modelVariable}Service)
    {
        $this->{modelVariable}Service = ${modelVariable}Service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request)
    {
       return  $this->{modelVariable}Service->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store{Model}(Store{Model}Request $request)
    {
        $validatedReqeust = $request->validated();

        $this->{modelVariable}Service->create{Model}($validatedReqeust);
        
        return response()->success([
            'message' => 'has been created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show{Model}($id)
    {
        ${modelVariable} =  $this->{modelVariable}Service->show{Model}($id);

        return response()->success([
            '{modelVariable}'=>${modelVariable}
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update{Model}(Update{Model}Request $request, $id)
    {
       $validatedReqeust = $request->validated();

       ${modelVariable} =  $this->{modelVariable}Service->update{Model}($validatedReqeust, $id);

       return response()->success([
           'message' => ' has been updated successfully',
           '{modelVariable}' => ${modelVariable},
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy{Model}($id)
    {
        
        $this->{modelVariable}Service->delete{Model}($id);

        return response()->success([
            'message' => ' has been deleted successfully',
        ]);
    }
}