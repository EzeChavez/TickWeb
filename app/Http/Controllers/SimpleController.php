<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleController extends Controller
{
    public function showSimpleView($id)
    {
        return view('simple_view', ['id' => $id]);
    }
}
