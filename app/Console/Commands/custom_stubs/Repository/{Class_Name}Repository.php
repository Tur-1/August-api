<?php

namespace {namespace};

use {ModulePath}\Models\{Model};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class {Class_Name}Repository
{
    private ${modelVariable};

    public function __construct({Model} ${modelVariable})
    {
        $this->{modelVariable} =${modelVariable};
    }
    public function getAll($records)
    {
        return $this->{modelVariable}->paginate($records);
    }
    public function create{Model}($validatedRequest)
    {
        return $this->{modelVariable}->create($validatedRequest);
    }
    public function get{Model}($id)
    {
        return $this->{modelVariable}->find($id);
    }
    public function update{Model}($validatedRequest, $id)
    {
        ${modelVariable} = $this->get{Model}($id);
        ${modelVariable}->update($validatedRequest);
        return  ${modelVariable};
    }
    public function delete{Model}($id)
    {
        return $this->{modelVariable}->where('id', $id)->delete();
    }
}