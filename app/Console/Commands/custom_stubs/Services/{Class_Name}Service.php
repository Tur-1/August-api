<?php

namespace {namespace};
 
use {ModulePath}\Repository\{Model}Repository;



class {Class_Name}Service
{
    private ${modelVariable}Repository;

    public function __construct({Model}Repository ${modelVariable}Repository)
    {
        $this->{modelVariable}Repository = ${modelVariable}Repository;
    }
    public function getAll($records = 12)
    {
        return $this->{modelVariable}Repository->getAll($records);
    }
    public function create{Model}($validatedRequest)
    {
        return $this->{modelVariable}Repository->create{Model}($validatedRequest);
    }
    public function show{Model}($id)
    {
        return $this->{modelVariable}Repository->get{Model}($id);
    }
    public function update{Model}($validatedRequest, $id)
    {
        return $this->{modelVariable}Repository->update{Model}($validatedRequest, $id);
    }
    public function delete{Model}($id)
    {
        return $this->{modelVariable}Repository->delete{Model}($id);
    }
}