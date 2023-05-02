<?php
session_start();
if(isset($_SESSION['username'])) {
    // 用户已登录，执行相应操作
} else {
    // 用户未登录，重定向到登录页面
    header("Location: LoginSign.php");
}

// 用户已登录，可以继续加载当前页面
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/forum.css">
    <script src="./font_4013428_y9vkbi134e/iconfont.js"></script>
    <script src="js/fancywebsocket.js"></script>
    <title>论坛</title>
</head>
<body>
<div class="container">

    <!-- 发布想法 -->
    <div class="idea">
        <header class="ideaHeader">
            <span id="idea">发送想法</span>
        </header>
        <section class="section">
            <ul class="ideauls">
                <!--<li class="idealis">
                    <div class="headphoto">
                        <span class="photo-box">
                            <img src="./img/iconphoto.png" alt="">
                        </span>
                        <h1 class="ideaTitle">test</h1>
                    </div>
                    <p class="reply">
                        hello,hello,hello,hello
                    </p>
                    <p class="stern">
                        <span class="s1">版块：电子书籍</span>
                        <span class="s2">发表时间：2020-10-12 12：12：12</span>
                    </p>
                </li>-->
            </ul>
        </section>
        <div class="post">
            <input class="title" placeholder="请输入标题（1-50个字符）">
            所属版块：<select id="select1">
            <option>全站</option>
            <option>电子书籍</option>
            <option>青春文学</option>
            <option>网络文学</option>
            <option>历史典籍</option>
        </select>
            <textarea class="content"></textarea>
            <button class="btn">发布</button>
        </div>
    </div>
    <!-- 群组/贴吧 -->
    <div class="group">
        <!-- 群组列表-->
        <div class="chatTag">
            <ul class="TagUls">
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag1.jpg" alt=""></span>
                    <h4 class="TagName">三体吧</h4>
                </li>
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag2.jpg" alt=""></span>
                    <h4 class="TagName">cpp讨论组</h4>
                </li>
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag3.jpg" alt=""></span>
                    <h4 class="TagName">哲学讨论群</h4>
                </li>
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag4.jpg" alt=""></span>
                    <h4 class="TagName">新人作者群</h4>
                </li>
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag5.jpg" alt=""></span>
                    <h4 class="TagName">前端学习群</h4>
                </li>
                <li>
                    <span class="TagPhoto"><img src="./img/tagImg/tag6.jpg" alt=""></span>
                    <h4 class="TagName">力学讨论组</h4>
                </li>
            </ul>
        </div>
        <!-- 群组界面 -->
        <div class="chatFace">
            <div class="chatHeader">
                <h3 id="showGroupName">新人作者群-UnCo</h3>
                <div class="chatIcon">
                    <span><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-tupian1"></use>
                </svg></span>
                     <span><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-gerenzhongxin1"></use>
                </svg></span>
                    <span><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-xitonggonggao"></use>
                </svg></span>
                    <span><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-bangzhu"></use>
                </svg></span>
                    <span><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-lianjie"></use>
                </svg></span>
                </div>
            </div>
            <div class="chat_middle" id="chat_middle_item">
                <!-- 左边 -->
                <div class="chat_left clearfix">
                    <div class="chat_left_item_1 ">U</div>
                    <div class="chat_left_item_2">
                        <div class="chat_left_time">18:57</div>
                        <div class="chat_left_content">
                            今天吃点啥？
                        </div>
                    </div>
                </div>
                <!--右边 -->
                <!--<div class="chat_right">
                    <div class="chat_right_item_1 ">热巴</div>
                    <div class="chat_right_item_2 ">
                        <div class="chat_right_time">18:59</div>
                        <div class="chat_right_content">
                            最近八合里周年庆店，咱们去薅羊毛呀
                        </div>
                    </div>
                </div>-->
                <div class="chat_left clearfix">
                    <div class="chat_left_item_1 ">U</div>
                    <div class="chat_left_item_2">
                        <div class="chat_left_time">18:57</div>
                        <div class="chat_left_content">
                            今天吃点啥？
                        </div>
                    </div>
                </div>
            </div>
            <!-- line -->
            <div class="line"></div>
            <!-- foot -->
            <div class="chat_foot">
                <!-- context -->
                <textarea class="chat_context" id="chat_context_item" cols="30" rows="10" placeholder="请输入" ></textarea>
                <button class="chat_commit" id="button" type="button" onclick="start()">发送</button>
            </div>

        </div>
    </div>
    <!-- 聊天区域 -->
    <div class="chat">
        <div id="msg"></div>
    </div>
</div>
</body>



<script src="js/jquery-3.6.4.min.js"></script>
<script>
    /* 获取所有控件 tagUls li TagName */
    hs = document.querySelectorAll(".TagUls li");
    groupName = document.getElementById("showGroupName");

    /* 遍历 */
    for (var i=0; i<hs.length; i++){
        /* 绑定监听事件 */
        hs[i].addEventListener("click", function (){
            /*获取hs[i]文本*/
            groupName.textContent = this.textContent;
        });
    }


</script>
<script>
    $(document).ready(function(){
        $("#idea").click(function(){
            $(".idea .post").show();
        });

        $(".post .btn").click(function(){
            if($(".content").val() === "" || $(".title").val() === ""){
                $(".post").hide();
            }
            else {
                var $newLi=$("<li class='idealis'></li>");  //创建一个新的li节点元素
                var $divPhoto = $("<div class='headphoto'></div>")
                var $touImg=$("<span class='photo-box'><img src=./img/iconphoto.png></span>");  //创建头像节点
                var $title=$("<h1 class='ideaTitle'>"+$(".title").val()+"</h1>"); //设置标题节点
                var $newP=$("<p class='stern'></p>");  //创建一个新的p节点元素
                var $reply = $("<p class='reply'>"+$(".content").val()+"</p>");
                var myDate=new Date();
                var currentDate=myDate.getFullYear()+"-"+parseInt(myDate.getMonth()+1)+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes();
                $($newP).append("<span class='s1'>版块："+$(".post select").val()+"</span>");  //在p节点中插入版块；
                $($newP).append("<span class='s2'>发表时间："+currentDate+"</span>");     //在p节点中插入发布时间；
                $($divPhoto).append($touImg)//插入头像
                $($divPhoto).append($title);   //插入标题
                $($newLi).append($divPhoto);
                $($newLi).append($newP);    //插入版块、时间内容
                $($newLi).append($reply);

                $(".ideauls").prepend($newLi);
                $(".post .content").val("");
                $(".post .title").val("");
                $(".post").hide();
            }

        });
    })

</script>
<script>
    // 成功发送
    var send_message=document.getElementById("chat_middle_item");
    var domBtm=document.getElementById("button");

    // 时间函数
    function getDateTime(){
        var date=new Date();
        var hour=date.getHours();
        var mm=date.getMinutes();
        var time=hour+':'+mm;
        return time;
    }

    //创建一个函数，用于发送ajax请求   解析session 获取用户名
    function getUserName() {
        //创建一个变量，用于保存返回的值
        var result = undefined;
        //使用$.ajax()方法
        $.ajax({
            //设置请求的url，即php文件的路径
            url: "test.php",
            //设置请求的类型，即GET或POST
            type: "GET",
            //设置预期的服务器响应的数据类型，即text或json等
            dataType: "text",
            //设置请求是否异步处理，false表示同步
            async: false,
            //设置请求成功时的回调函数，即处理返回的数据
            success: function(data) {
                //把data赋值给result
                result = data;
            },
            //设置请求失败时的回调函数，即处理错误信息
            error: function(xhr, status, error) {
                //在控制台打印错误信息
                console.log(error);
            }
        });
        //返回result
        return result;
    }

    //  将消息框滚到底部
    const chatMiddle = document.getElementById('chat_middle_item');
    chatMiddle.scrollTop = chatMiddle.scrollHeight - chatMiddle.clientHeight;

    /* 自己的消息框 */
    function MeMsg(str){
        var ans='<div class="chat_right_item_1 clearfix">'+getUserName()+'</div>'+
            '<div class="chat_right_item_2">'+
            '<div class="chat_right_time clearfix">'+getDateTime()+'</div>'+
            '<div class="chat_right_content clearfix">'+str+'</div>'
            +'</div>';
        var oLi=document.createElement("div");
        oLi.setAttribute("class","chat_right");
        oLi.innerHTML=ans;
        send_message.append(oLi);
    }
    var message=document.getElementById("chat_context_item");
    domBtm.addEventListener("click",function(){
        var str=message.value;
        MeMsg(str);
        message.value="";
    });

    /* 其他消息框 */
    function OtherMsg(username, datetime, content){
        var recv='<div class="chat_left_item_1">'+username+'</div>'+
            '<div class="chat_left_item_2">'+
            '<div class="chat_left_time">'+datetime+'</div>'+
            '<div class="chat_left_content">'+ content +'</div>'
            +'</div>';
        var oLi=document.createElement("div");
        oLi.setAttribute("class","chat_left clearfix");
        oLi.innerHTML=recv;
        send_message.append(oLi);
    }



    /* websocket */
    // 创建 WebSocket 对象
    let Server;

    function log(message) {
        const { username, datetime, content } = message;
        if(username === getUserName()){
            MeMsg(content);    // 如果名字是自己的生成自己的消息框
        }else {
            OtherMsg(username, datetime, content); //不是自己的就生成对方的消息框
        }

    }
    //为了让服务端知道当前客户端的用户名和发送时间，客户端可以在发送消息时，将这些信息一并发送给服务端。
    function send(text) {
        const username = getUserName();
        const datetime = getDateTime();
        const message = `${username} ${datetime} ${text}`;
        Server.send('message', message);

    }

    function start() {
        var msg = document.getElementById('chat_context_item').value;
        send(msg);
    }

    $(document).ready(function() {
        console.log('Connecting...');
        Server = new FancyWebSocket('ws://127.0.0.1:9300');


        Server.bind('open', function() {
            console.log("Connected.");
            // 发送获取历史消息的请
            //this.Server.send('get_previous_messages', '');
        });

        Server.bind('close', function(data) {
            console.log("Disconnected.");
        });

        Server.bind('message', function(payload) {
            const message = JSON.parse(payload);
            log(message);
        });

        Server.connect();
    });

</script>

</html>