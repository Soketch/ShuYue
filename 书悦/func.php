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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>书悦</title>
    <link rel="stylesheet" href="./css/func.css">
    <script src="./font_4013428_y9vkbi134e/iconfont.js"></script>
    <link rel="stylesheet" href="./swiper/swiper-bundle.min.css">
    <script type="text/javascript" src="./swiper/swiper-bundle.min.js"></script>
</head>
<body>
<!--头部 header 热榜区域-->
<header class="header">
    <form action="*" class="searchform">
        <input type="search-input" type="text" name="search_keyword" placeholder="《白银时代》">
        <button type="button" name="search" id="search_btn" onclick="window.location.href='./search.php?search_keyword=' + document.querySelector('input[name=search_keyword]').value;">搜索</button>

    </form>
</header>

<!--侧边 nav 导航栏-->
<div class="navbar">
    <input type="checkbox" id="checkbox">
    <label for="checkbox">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-mulu" style="font-size: 1.2em;"></use>
        </svg>
    </label>
    <ul>
        <li>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-icon-test1"></use>
            </svg>
            <span>欢迎您登陆！</span>
        </li>
        <li>
            <!--不做跳转，防止点击给页面刷新 -->
            <a href="bookrack.php">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-shu"></use>
                </svg>
                <span>书架</span>
            </a>
        </li>
        <li>
            <a href="./forum.php" id="comment">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-jiaoliu"></use>
                </svg>
                <span>论坛</span>
            </a>
        </li>
        <li>
            <a href="./plan.php">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-tianjiajihua"></use>
                </svg>
                <span>制定计划</span>
            </a>
        </li>
        <li>
            <a href="./interest.php" id="likes">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-yonghu"></use>
                </svg>
                <span>个人中心</span>
            </a>
        </li>
        <li>
            <a href="./logout.php" id="exitFunc">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-tuichu"></use>
                </svg>
                <span>退出</span>
            </a>
        </li>
    </ul>
</div>

<!--主内容区 main -->
<main class="main">
    <!--今日推荐-->
    <h4 class="htitle">今日推荐</h4>
    <div class="NowReCom swiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook1.jpg" alt="活着">
                </div>
                <div class="bookMsg">
                    <h3>《活着》</h3>
                    <p> 作者:余华</p>
                    <p> 上架时间:2019/09</p>
                    <p> 评分:⭐⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook2.jpg" alt="">
                </div>
                <div class="bookMsg">
                    <h3>《断舍离》</h3>
                    <p> 作者:山下英子</p>
                    <p> 上架时间:2019/04</p>
                    <p> 评分:⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook3.jpg" alt="">
                </div>
                <div class="bookMsg">
                    <h3>《黄金时代》</h3>
                    <p> 作者:王小波</p>
                    <p> 上架时间:2019/10</p>
                    <p> 评分:⭐⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook4.jpg" alt="活着">
                </div>
                <div class="bookMsg">
                    <h3>《美顺与长生》</h3>
                    <p> 作者:毛建军</p>
                    <p> 上架时间:2018/08</p>
                    <p> 评分:⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook5.jpg" alt="">
                </div>
                <div class="bookMsg">
                    <h3>《东奔西走》</h3>
                    <p> 作者:十月老肥</p>
                    <p> 上架时间:2022/07</p>
                    <p> 评分:⭐⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook6.jpg" alt="">
                </div>
                <div class="bookMsg">
                    <h3>《龙族》</h3>
                    <p> 作者:江南</p>
                    <p> 上架时间:2022/02</p>
                    <p> 评分:⭐⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook7.jpg" alt="">
                </div>
                <div class="bookMsg">
                    <h3>《孔乙己》</h3>
                    <p> 作者:鲁迅</p>
                    <p> 上架时间:2011/05</p>
                    <p> 评分:⭐⭐⭐⭐⭐</p>
                    <button class="button">借阅</button>
                </div>
                <em>
                    <img src="./img/hot.png" alt="hot" class="hotImg">
                </em>
            </div>
        </div>

        <!-- 如果需要导航按钮 -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <!-- 广告区域 -->
    <div class="advert ad1 swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide advertImg"></div>
            <div class="swiper-slide advertImg2"></div>
            <div class="swiper-slide advertImg5"></div>
            <div class="swiper-slide advertImg6"></div>
            <div class="swiper-slide advertImg7"></div>
        </div>
    </div>

    <!--继续阅读-->
    <h4 class="htitle">继续阅读</h4>
    <div class="GotoRead swiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/hotbook7.jpg" alt="">
                </div>
                <div class="readPlan">
                    <h3>《孔乙己》</h3>
                    <span class="planText1">进度:</span><span class="planText2">65%</span>
                    <div class="myProgress">
                        <div class="myBar">
                        </div>
                    </div>
                    <button class="button">继续阅读</button>
                </div>

            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/planbook1.jpg" alt="">
                </div>
                <div class="readPlan">
                    <h3>《数学实验》</h3>
                    <span class="planText1">进度:</span><span class="planText2">70%</span>
                    <div class="myProgress">
                        <div class="myBar">
                        </div>
                    </div>
                    <button class="button">继续阅读</button>
                </div>

            </div>
            <div class="card swiper-slide">
                <div class="img-box">
                    <img src="./img/porject/planbook2.jpg" alt="">
                </div>
                <div class="readPlan">
                    <h3>《近代物理实验》</h3>
                    <span class="planText1">进度:</span><span class="planText2">100%</span>
                    <div class="myProgress">
                        <div class="myBar">
                        </div>
                    </div>
                    <button class="button">继续阅读</button>
                </div>

            </div>
        </div>
    </div>
    <!-- 广告区域 -->
    <div class="advert swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide advertImg3"></div>
            <div class="swiper-slide advertImg4"></div>
        </div>
    </div>

    <!--前沿艺术-->
    <h4 class="htitle">前沿艺术</h4>
    <div class="FrontierArt swiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="card-imgArt">
                    <img src="./img/porject/art1.jpg" alt="">
                    <span class="VIP-box">VIP精选</span>  <!--顶部-->
                    <span class="bot-box">电子书</span>  <!--底部-->
                    <div class="artTitle">
                        <h4>《极简西方艺术史》</h4>
                    </div>
                </div>

            </div>
            <div class="card swiper-slide">
                <div class="card-imgArt">
                    <img src="./img/porject/art2.jpg" alt="">
                    <span class="VIP-box">VIP精选</span>  <!--顶部-->
                    <span class="bot-box">电子书</span>  <!--底部-->
                    <div class="artTitle">
                        <h4>《人生的智慧》</h4>
                    </div>
                </div>

            </div>
            <div class="card swiper-slide">
                <div class="card-imgArt">
                    <img src="./img/porject/art3.jpg" alt="">
                    <span class="VIP-box">VIP精选</span>  <!--顶部-->
                    <span class="bot-box">严选专栏</span>  <!--底部-->
                    <div class="artTitle">
                        <h4>《时光出租屋》</h4>
                    </div>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card-imgArt">
                    <img src="./img/porject/art4.jpg" alt="">
                    <span class="VIP-box">VIP精选</span>  <!--顶部-->
                    <span class="bot-box">课程</span>  <!--底部-->
                    <div class="artTitle">
                        <h4>朗朗钢琴课</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!--右侧边rsider 备案 介绍 -->
<div class="rsider">
    <div class="siderTop">
        <h4>Introduction Information</h4>
        <p>高效阅读</p><br>
        <p>知识分享</p><br>
        <p>兴趣通识</p><br>
        <p>活跃社区</p><br>
        <br>
        <hr>
        <br>
        <p>卡片式的阅读</p><br>
        <p>书籍交换活动</p><br>
        <p>增加你与别人的共同语言</p><br>
        <p>更多Idea</p><br>
        <br>
        <hr>
        <br>
        <p>无障碍服务</p><br>
        <p>违法内容举报</p><br>
        <p>乱象举报入口</p><br>
        <p>服务热线：400-60020-xxx1</p><br>
        <p>联系我们 © 2023 书悦</p><br>
    </div>

</div>

</body>

<script type="text/javascript" src="./js/func.js"></script>
<script>



    <!-- Initialize Swiper -->
    var swiper = new Swiper(".NowReCom", {
        slidesPerView: 4,
        spaceBetween: 20,
        freeMode: true,
        loop: true, // 循环模式选项

        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var swiper = new Swiper(".GotoRead", {
        slidesPerView: 4,
        spaceBetween: 20,
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

    });

    var swiper = new Swiper(".FrontierArt", {
        slidesPerView: 4,
        spaceBetween: 20,
        freeMode : true, //根据惯性滑动可能不止一格且不会贴合
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

    });

    var swiper = new Swiper(".ad1", {
        slidesPerView: 1,
        spaceBetween: 0,
        freeMode: true,
        loop: true,
        autoplay : {
            delay : 900, //自动切换的时间间隔，单位ms
            disableOnInteraction : false //用户操作swiper之后，是否禁止autoplay
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    var swiper = new Swiper(".advert", {
        slidesPerView: 1,
        spaceBetween: 0,
        freeMode: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

</script>

</html>
