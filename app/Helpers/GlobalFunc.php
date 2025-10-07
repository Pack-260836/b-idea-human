<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GlobalFunc
{
    public static function getNewId()
    {
        return Str::uuid()->toString();
    }
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
    public static function pathImage($location)
    {
        $imagePathStorage = public_path("assets/images/" . $location .  "/");
        $imagePathDB = "/assets/images/" . $location . "/";
        //! ตรวจสอบและสร้างโฟลเดอร์ถ้ายังไม่มี
        if (!File::exists($imagePathStorage)) {
            File::makeDirectory($imagePathStorage, 0777, true, true);
        }
        return [$imagePathStorage, $imagePathDB];
    }
    public static function uploadImg($request, $db, $input_name, $location)
    {
        $body = [];
        if ($request->hasFile($input_name)) {
            $image = $request->file($input_name);
            if ($image) {
                list($imagePathStorage, $imagePathDB) = self::pathImage($location);
                //! ค้นหาและลบไฟล์เก่าที่ชื่อขึ้นต้นด้วย $db
                $oldFiles = glob($imagePathStorage .  $db . '.*');
                foreach ($oldFiles as $oldFile) {
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
                //! ตั้งชื่อใหม่
                $new_img_name = $db . '.' . $image->getClientOriginalExtension();
                //! ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
                $image->move($imagePathStorage, $new_img_name);
                //! กำหนดพาธไฟล์ที่บันทึกในฐานข้อมูล
                $body[$input_name] = $imagePathDB . $new_img_name;
            }
        } else {
            unset($body[$input_name]);
        }
        return $body;
    }
}
