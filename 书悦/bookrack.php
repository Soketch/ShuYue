<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>书架</title>
    <link rel="stylesheet" href="./css/bookrack.css">
    <script src="./js/bookrack.js"></script>
</head>
<body>
    <div class="container">
        <!-- 榜单-分类 -->
        <div class="classify">
            <ul class="classifyUls">
                <li><h2 class="sorts">🏅TOP10/总榜</h2></li>
                <li><h2 class="sorts">🏆TOP10/飙升榜</h2></li>
                <li><h2 class="sorts">🏆TOP10/新书榜</h2></li>
                <li><h2 class="sorts">历史</h2></li>
                <li><h2 class="sorts">小说</h2></li>
                <li><h2 class="sorts">艺术</h2></li>
                <li><h2 class="sorts">哲学</h2></li>
                <li><h2 class="sorts">文学</h2></li>
                <li><h2 class="sorts">计算机</h2></li>
            </ul>
        </div>-

        <!-- 书-main -->
        <div class="main">
            <div class="mainHead">
                <p class="PTitle">
                    <span class="title">🏅TOP10/总榜</span>
                </p>

                <div class="allKinds">
                </div>

            </div>
            <ul class="items">
                <li class="bookListItem">
                    <div class="itemCon">
                        <p class="itemIndex">1</p>
                        <div class="itemImg">
                            <img class="imgBox" src="./img/porject/hotbook3.jpg" alt="">
                        </div>
                        <div class="itemMsg">
                            <h4 class="bookName">《黄金时代》</h4>
                            <p class="author">王小波</p>
                            <p class="message">十万年前，地球上至少有6种不同的人，为何今日世界只剩下我们自己？从茹毛饮血的猿人，到月球上出现人类的脚印，人类如何一步步走出洞穴、走出非洲、奔向太空，从兽欲到物欲，从兽性到人性，人类真的了解自己吗？这些一直困扰着人类的问题，终于在数十万年的追问中，逐渐浮现出清晰的脉络。+人类的过去、现在、未来～从上帝视角，完整俯瞰十万年来，人类文明演变的进程312425346
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            
        </div>
    </div>

    <script>
        const historys = ["全部","地理历史","历史小说","史学著作","世界史","中国史","典籍","历史文化"];  /* 历史 */
        const letters = ["全部","古典文学","纪实文学","民间文学","散文诗歌","世界名著","外国文学"];  /* 文学 */
        const arts = ["全部","雕塑","绘画","鉴赏","民艺","设计","工艺","理论"];   /* 艺术 */
        const fiction = ["全部","情感小说","社会小说","青春文学","科幻经典","战争军旅","恐怖惊悚","武侠经典","优质网文","悬疑推理","影视原著"];  /* 小说 */
        const computers = ["全部","编程设计","软件学习","计算机综合","人工智能","图像视频","数据库"];  /* 计算机 */
        const philosophy = ["全部","东方哲学","伦理学","逻辑学","马克思哲学","西方哲学","哲学著作","哲学读物"]; /* 哲学*/

        /* 初始化控件 */
        let items = document.querySelector(".items");
        // 获取.classifyUls所有的 li 和 mainHead 的 span元素
        let lis = document.querySelectorAll (".classifyUls li");
        let span = document.querySelector (".PTitle span");

        /* 给mainHead 中的 allKinds下面细分种类   kind */
        /* 获取控件 */
        let allKinds = document.querySelector(".allKinds");

        /* 增加li个数 -- 根据数据数目 */
        function addList(temp){
            for(var i =0; i<temp; i++){
                /* 给ul添加子元素li */
                let li = document.createElement("li");
                /* 绑定类名 */
                li.className = "bookListItem";
                items.appendChild(li);

                /* 给li添加子元素div.itemCon*/
                let itemCon = document.createElement("div")
                itemCon.className = "itemCon";
                li.appendChild(itemCon);

                /* 给div.itemCon 添加子元素 p.itemIndex  div.itemImg  div.itemMsg  */
                let p_index = document.createElement("p");
                p_index.className = "itemIndex";
                itemCon.appendChild(p_index);

                let itemImg = document.createElement("div");
                itemImg.className = "itemImg";
                itemCon.appendChild(itemImg);


                let itemMsg = document.createElement("div");
                itemMsg.className = "itemMsg";
                itemCon.appendChild(itemMsg);

                /* itemImg 添加图片 */
                let img = document.createElement("img");
                img.className = "imgBox";
                itemImg.appendChild(img);

                /* 给 itemMsg 添加子元素 h4.bookName  p.author  p.message */
                let bookName = document.createElement("h4");
                bookName.className = "bookName";
                itemMsg.appendChild(bookName);

                let author = document.createElement("p");
                author.className = "author";
                itemMsg.appendChild(author);

                let message = document.createElement("p");
                message.className = "message";
                itemMsg.appendChild(message);
            }
        }


        /* 给左侧榜单分类 添加种类 div.kind 标签  */
        function addClassName(array){
           allKinds.innerHTML = "";
           /* allKinds.removeChild(); */
            /* kind.remove();*/
            /* 根据数组长度创建 */
            for (var i=0; i<array.length; i++){
                let kind = document.createElement("div");
                kind.className = "kind";
                allKinds.appendChild(kind);
                kind.textContent = array[i];
            }
        }


        addList(40);

        /* 给左侧分类allKinds 控件添加点击事件 */
        for (var i = 0; i < lis.length; i++) {

            // 为每一个li元素添加一个点击事件监听器
            lis [i].addEventListener ("click", function () {
                // 获取当前li元素的子元素h2的文本内容
                var text = this.querySelector ("h2").textContent;
                // 赋值给span元素
                span.textContent = text;

                switch (text){
                    case "历史":
                        addClassName(historys);
                        break;
                    case "文学":
                        addClassName(letters);
                        break;
                    case "小说":
                        addClassName(fiction);
                        break;
                    case "艺术":
                        addClassName(arts);
                        break;
                    case "哲学":
                        addClassName(philosophy);
                        break;
                    case "计算机":
                        addClassName(computers);
                        break;
                    default:
                        allKinds.innerHTML = "";
                }
            });
        }
    </script>
</body>
</html>