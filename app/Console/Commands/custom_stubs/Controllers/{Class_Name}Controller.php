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

 
    public function index(Request $request)
    {
       return  $this->{modelVariable}Service->getAll();
    }

   
    public function store{Model}(Store{Model}Request $request)
    {
        $validatedRequest = $request->validated();

        $this->{modelVariable}Service->create{Model}($validatedRequest);
        
        return response()->success([
            'message' => '{Model} has been created successfully'
        ]);
    }

    
    public function show{Model}($id)
    {
        ${modelVariable} =  $this->{modelVariable}Service->show{Model}($id);

        return response()->success([
            '{modelVariable}' => ${modelVariable}
        ]);
    }

 
    public function update{Model}(Update{Model}Request $request, $id)
    {
        $validatedRequest = $request->validated();

       ${modelVariable} =  $this->{modelVariable}Service->update{Model}($validatedRequest, $id);

       return response()->success([
           'message' => '{Model} has been updated successfully',
           '{modelVariable}' => ${modelVariable},
       ]);
    }

   
    public function destroy{Model}($id)
    {
        
        $this->{modelVariable}Service->delete{Model}($id);

        return response()->success([
            'message' => '{Model} has been deleted successfully',
        ]);
    }
}