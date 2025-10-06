<?php

namespace App\Helpers;

use App\Models\Otps;
use Carbon\Carbon;
use Exception;

class MailNotify
{
    public static function generate(string $identifier, string $type, int $length = 4, int $validity = 10): object
    {
        Otps::where('identifier', $identifier)->where('valid', true)->delete();
        switch ($type) {
            case "numeric":
                $pin = self::generateNumericToken($length);
                break;
            case "alpha_numeric":
                $pin = self::generateAlphanumericToken($length);
                break;
            default:
                throw new Exception("{$type} is not a supported type");
        }

        Otps::create([
            'identifier' => $identifier,
            'token' => $pin,
            'validity' => $validity,
            'valid' => false
        ]);

        return (object)[
            'status' => true,
            'pin' => $pin,
            'message' => 'OTP generated'
        ];
    }
    public static function formatPin($data, $length = 6)
    {
        $result = array();
        $rs = "";
        $count_rs = 0;
        foreach ($data as $key => $value) {
            if (count(explode('code_', $key)) == 2) {

                array_push($result, explode('code_', $key));
            }
        }
        $count_rs = count($result);
        for ($i = 1; $i <= $count_rs; $i++) {
            if ($i == 1) {
                $rs = $data['code_' . $i];
            } else {
                $rs .= $data['code_' . $i];
            }
        }
        return $rs;
    }
    public static function validate(string $identifier, string $token): array
    {
        $otp = Otps::where('identifier', $identifier)->where('token', $token)->first();
        if ($otp instanceof Otps) {
            if ($otp->valid == 0) {
                $now = Carbon::now();
                $validity = $otp->created_at->addMinutes($otp->validity);

                if (strtotime($validity) < strtotime($now)) {
                    $otp->update(['valid' => false]);
                    return [
                        'status' => false,
                        'message' => 'OTP Expired'
                    ];
                }

                $otp->update(['valid' => true]);
                return [
                    'status' => true,
                    'message' => 'OTP is valid'
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'OTP does not exist'
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'OTP does not exist'
            ];
        }
    }

    /**
     * @param int $length
     * @return string
     * @throws Exception
     */
    public static function generateNumericToken(int $length = 6): string
    {
        $i = 0;
        $token = "";

        while ($i < $length) {
            $token .= random_int(0, 9);
            $i++;
        }

        return $token;
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateAlphanumericToken(int $length = 4): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($characters), 0, $length);
    }
}
