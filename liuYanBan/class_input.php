<?php
class input {
    function post($word) {
        if ($word == "") {
            return false;
        }
        //定义禁止使用的用户
        $name = ["李星","王瑶"];
        //循环禁止使用的关键字，user一一与它对比
        foreach ($name as $key => $value) {
            if ($word == $value) {
                return false;
            }
        }
        return true;
    }
}

class codeinput {
    function check($code) {
        if ($code == "") {
            return false;
        }

        //判断输入验证码是否正确

        if (isset($code)) {
            session_start();

            if (strtolower($code) == $_SESSION["authcode"]) {
                return true;
            } else {
                return false;
            }
            exit();
        }
    }
}

?>