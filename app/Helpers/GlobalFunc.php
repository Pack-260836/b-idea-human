<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class GlobalFunc
{
    public static function validateCheck($request, $rules, $messages)
    {
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $message = array();
            $str = "";
            foreach ($errors as $key => $items) {
                foreach ($items as $key => $item) {
                    $str = $key + 1;
                    $str .= ".";
                    $str .= $item;
                    array_push($message, $str);
                }
            }
            $str = "";
            foreach ($message as $key => $item) {
                if ($key == 0) {
                    $str =   ($key + 1) . "." . explode(".", $item)[1];
                    $str .=   "\n ";
                } else {
                    $str .=   ($key + 1) . "." . explode(".", $item)[1];
                    $str .=   "\n";
                }
            }
            return [
                'data' => null,
                'message' => $str,
                'success' => false,
            ];
        }
    }
}
