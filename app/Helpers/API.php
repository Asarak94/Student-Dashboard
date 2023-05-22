<?php


namespace App\Helpers;


class API
{
    public static function createResponse($is_error, $message_code = null, $content = null, $custom_msg=null)
    {
        $result = [];

        if ($is_error) {
            $error_messages = config('api.error_messages');
            $result["errors"]["code"] = $message_code;
            $result["errors"]["title"] = $error_messages[$message_code];
            $result["errors"]["detail"] = $custom_msg;
        } else {
            $result["data"] = $content;
            if($content==null){
                $result["data"]["message"]=$custom_msg;
            }
        }

        return $result;
    }

    public static function errorsResponse($errors)
    {
        $error_data = [];
        foreach ($errors as $x => $x_value) {
            $data['source']['pointer'] = $x;
            foreach ($x_value as $value) {
                if (is_array($value)) {
                    $data['code'] = $value[0];
                    $data['title'] = config('shayInt.err_messages')[$value[0]];
                    $data['detail'] = $value[1];
                } else {
                    $data['code'] = explode("|", $value)[0];
                    $data['title'] = config('shayInt.err_messages')[explode("|", $value)[0]];
                    $data['detail'] = explode("|", $value)[1];
                }
            }
            $error_data[] = $data;
        }
        return ["errors" => $error_data];
    }
}