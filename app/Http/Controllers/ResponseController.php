<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function __construct()
    {
    }

    public function validationErrorsToString($errArray)
    {
        $valArr = array();

        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }

        if (!empty($valArr)) {
            $errStrFinal = implode('<br />', $valArr);
        }

        return $errStrFinal;
    }
}
