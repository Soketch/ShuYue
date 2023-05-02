<?php
    //phpinfo();
    // php.ini  location: D:\ProgramIDE\Php\wampserver\bin\php\php8.0.26\php.ini
    // API PORT D:\ProgramIDE\Php\wampserver\bin\php\php8.0.26\php.ini

    session_start();
    // 获取用户名
    function returnName(){
        return $_SESSION['username'];
    }
    //调用函数，并输出结果
    echo returnName();
?>