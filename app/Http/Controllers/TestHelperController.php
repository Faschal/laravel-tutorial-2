<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestHelperController extends Controller
{
    public function getFirstLastName()
    {
        return splitName("Mark Kenny");
    }
}
