/* 进度条 */
var bookArr = new Array(65,70,100)
var progress = document.querySelectorAll(".myBar");
for (var i=0; i<progress.length; i++){
    progress[i].style.width = bookArr[i]+"%";
}


/* 评论区显示 */
var comment = document.getElementById("comment");
var publicChat = document.getElementById("publicChat");
var m_flag = true;
comment.onclick = function (){
    if(!m_flag){
        publicChat.style.display = "block";
        m_flag = true;
    }
    else {
        publicChat.style.display = "none";
        m_flag = false;
    }
}


/* 公共频道 聊天区域 */
/* 添加 ul li 评论留言盒子 */
let uls = document.getElementById("uls");
function addList(temp) {
    for (var i=0; i<temp; i++){
        /* ul添加子元素li */
        let li = document.createElement("li");
        li.className = "uls-lis-style";
        uls.appendChild(li);
        /* 给li 添加子元素 */
        let h4 = document.createElement("h4");
        h4.className = "chat-name";
        li.appendChild(h4);
        let p = document.createElement("p");
        p.className = "chat-p";
        li.appendChild(p);
        let div = document.createElement("div");
        div.className = "chat-date";
        li.appendChild(div);
    }
}

/*addList(15);*/


