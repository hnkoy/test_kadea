<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Model;

interface BaseContract{
    function toAdd(array $inputs);
    function toUpdate(array $inputs, $id):Model;
    function toDelete($id):Model;
    function toGetAll($n=50);
    function toGetById($id):Model|null;
}
