<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录注册</title>
    <link rel="stylesheet" href="css/LoginSign.css">
    <script src="./font_4013428_y9vkbi134e/iconfont.js"></script>

</head>

<?php
$error = array();
$input_error = "";

function hint($input_error) {
    echo '<style>.errorHint {display: block;};</style>';
    echo '<script>setTimeout(function() {document.querySelector(".errorHint").style.display = "none";}, 1500);</script>';
}

/* 注册 */
if (isset($_POST["SignIn"])) {
    $sname = trim($_POST["s_name"]);
    $semail = trim($_POST["s_email"]);
    $sphone = trim($_POST["s_phone"]);
    $spwd = trim($_POST["s_pwd"]);
    $spwd2 = trim($_POST["s_pwd2"]);

    if(empty($sname) || empty($semail) || empty($spwd) || empty($spwd2) || empty($sphone)){
        $error[] = "输入不能为空";
    }
    if(!preg_match("/^[a-zA-Z0-9]*$/",$sname)){
        $error[] = "只允许输入数字字母";
    }
    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$semail)){
        $error[] = "邮箱格式错误";
    }
    if(!preg_match('/^\d{11}$/', $sphone)){
        $error[] = "正确输入11位数字电话格式";
    }
    if (!preg_match('/^[a-zA-Z\d]{6,10}$/', $spwd)){
        $error[] = "密码由字母数字组成，6-10位";
    }
    if($spwd != $spwd2){
        $error[] = "两次密码错误";
    }
    // 遍历数组，显示每个错误信息
    for ($i=0; $i<count($error); $i++){
            if ($error[$i] != ""){
                $input_error = $error[$i];
                hint($input_error);
                break;
            }
    }

    // 定义数据库连接参数
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    /* 创建数据库连接 */
    $conn = new mysqli ($servername, $username, $password, $dbname);
    // 检查数据库连接
    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }
    // 防止 SQL 注入
    $sname = mysqli_real_escape_string ($conn, $sname);  /* 姓名*/
    $semail = mysqli_real_escape_string ($conn, $semail); /* 邮箱 */
    $sphone = mysqli_real_escape_string ($conn, $sphone); /* 电话 */
    $spwd = mysqli_real_escape_string ($conn, $spwd);   /* 密码 */
    // 构造 SQL 语句
    $sql = "INSERT INTO users (L_name, L_email, L_phone, L_pwd) VALUES ('$sname', '$semail', '$sphone', '$spwd')";
    // 执行 SQL 语句
    if ($conn->query ($sql) === TRUE) {
        //  新记录插入成功
        //  跳转页面
        Header('Location:func.php');
    }
    else {
        /* 失败*/
echo "Error: " . $sql . "<br>" . $conn->error;
}
// 关闭数据库连接
$conn->close();
}

/* 登录表单 */
if(isset($_GET["submit"])){
    /* 登录验证 */
    $lname = trim($_GET["l_name"]);
    $lpwd = trim($_GET["l_pwd"]);

    if(empty($lname) || empty($lpwd)){
        $input_error = "输入不能为空";
        hint($input_error);
    }
    if(!preg_match("/^[a-zA-Z0-9]*$/",$lname)){
        $input_error = "只允许输入数字字母";
        hint($input_error);
    }
    if(!preg_match('/^[a-zA-Z\d]{6,10}$/', $lpwd)){
        $input_error = "密码由字母数字组成，6-10位";
        hint($input_error);
    }
    session_start();
    $_SESSION['username'] = $lname;    //  session 存放用户名
    //连接数据库
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "bookstore";
    $conn = new mysqli($servername, $username, $password, $dbname);

    //检查连接
    if($conn->connect_error){
        die("连接失败：" . $conn->connect_error);
    }

    //防止SQL注入
    $lname = mysqli_real_escape_string($conn, $lname);
    $lpwd = mysqli_real_escape_string($conn, $lpwd);

    //构造SQL查询语句
    $sql = "SELECT * FROM users WHERE L_name='$lname' AND L_pwd='$lpwd'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        //登录成功，跳转到func.php页面
        header("Location: func.php");
        exit;
    } else {
        //登录失败，提示错误信息
        $input_error = "用户名或密码错误";
        hint($input_error);
    }

    //关闭数据库连接
    $conn->close();
    
}
?>


<body>
<div class="errorHint">
    <?php echo $input_error;?>
</div>

<div class="shell">
    <div class="container a-container" id="a-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="a-form">
            <h2 class="form_title title">创建账号</h2>
            <div class="form_icons">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-weixin"></use>
                </svg>
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-youxiang"></use>
                </svg>
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-yonghu"></use>
                </svg>
            </div>
            <span class="form_span">注册您的专属账号</span>
            <input type="text" class="form_input" placeholder="Name" name="s_name">
            <input type="text" class="form_input" placeholder="Email" name="s_email">
            <input type="text" class="form_input" placeholder="phone" name="s_phone">
            <input type="password" class="form_input" placeholder="密码" name="s_pwd">
            <input type="password" class="form_input" placeholder="确认密码" name="s_pwd2">
            <button class="form_button button submit" type="submit" name="SignIn">SIGN UP</button>
        </form>
    </div>

    <div class="container b-container" id="b-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="form" id="b-form">
            <h2 class="form_title title">登入账号</h2>
            <div class="form_icons">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-weixin"></use>
                </svg>
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-youxiang"></use>
                </svg>
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-yonghu"></use>
                </svg>
            </div>
            <span class="form_span">选择登录方式</span>
            <input type="text" class="form_input" placeholder="Name/Email/phone" name="l_name">
            <input type="password" class="form_input" placeholder="Password" name="l_pwd">
            <a class="form_link">忘记密码？</a>
            <button class="form_button button submit" type="submit" name="submit">Login</button>
        </form>
    </div>

    <div class="switch" id="switch-cnt">
        <div class="switch_circle"></div>
        <div class="switch_circle switch_circle-t"></div>
        <div class="switch_container" id="switch-c1">
            <h2 class="switch_title title" style="letter-spacing: 0;">Welcome Back！</h2>
            <p class="switch_description description">已经有账号了嘛，去登入账号吧！！！</p>
            <button class="switch_button button switch-btn">Login</button>
        </div>

        <div class="switch_container is-hidden" id="switch-c2">
            <h2 class="switch_title title" style="letter-spacing: 0;">Hello Friend！</h2>
            <p class="switch_description description">去注册一个账号，加入书友吧！</p>
            <button class="switch_button button switch-btn">SIGN UP</button>
        </div>
    </div>
</div>
</body>
<script>
    let switchCtn = document.querySelector("#switch-cnt");
    let switchC1 = document.querySelector("#switch-c1");
    let switchC2 = document.querySelector("#switch-c2");
    let switchCircle = document.querySelectorAll(".switch_circle");
    let switchBtn = document.querySelectorAll(".switch-btn");
    let aContainer = document.querySelector("#a-container");
    let bContainer = document.querySelector("#b-container");

    let changeForm = (e) => {
        // 修改类名
        switchCtn.classList.add("is-gx");
        setTimeout(function () {
            switchCtn.classList.remove("is-gx");
        }, 1500)
        switchCtn.classList.toggle("is-txr");
        switchCircle[0].classList.toggle("is-txr");
        switchCircle[1].classList.toggle("is-txr");

        switchC1.classList.toggle("is-hidden");
        switchC2.classList.toggle("is-hidden");
        aContainer.classList.toggle("is-txl");
        bContainer.classList.toggle("is-txl");
        bContainer.classList.toggle("is-z");
    }
    // 点击切换
    let shell = (e) => {
        for (var i = 0; i < switchBtn.length; i++)
            switchBtn[i].addEventListener("click", changeForm)
    }
    window.addEventListener("load", shell);

</script>
</html>
