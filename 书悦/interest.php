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
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User.Info</title>
    <!-- 引入网站图标（favicon）网页标签最左 -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="./css/user.css">
</head>

<body>
<!--
  - #MAIN
-->
<main>

    <!--
      - #SIDEBAR
    -->
    <aside class="sidebar" data-sidebar>

        <div class="sidebar-info">

            <figure class="avatar-box">
                <img src="./img/photo.png" alt="mads" width="80">                                <!-- 待修改为自定义头像 -->
            </figure>

            <div class="info-content">
                <h1 class="name" title="masquerade">User Name</h1>

                <p class="title">your @email</p>
            </div>

            <button class="info_more-btn" data-sidebar-btn>
                <span>Show Contacts</span>
                <ion-icon name="chevron-down"></ion-icon>
            </button>

        </div>

        <div class="sidebar-info_more">

            <div class="separator"></div>

            <ul class="contacts-list">

                <li class="contact-item">

                    <div class="icon-box">
                        <ion-icon name="logo-wechat"></ion-icon>
                    </div>

                    <div class="contact-info">
                        <p class="contact-title">联系</p>
                        <a href="#" class="contact-link">WeChat-Name</a>                         <!-- 待修改为微信添加好友链接 -->
                    </div>

                </li>

                <li class="contact-item">

                    <div class="icon-box">
                        <ion-icon name="phone-portrait-outline"></ion-icon>
                    </div>

                    <div class="contact-info">
                        <p class="contact-title">手机</p>

                        <a href="tel:+12345678901" class="contact-link">xxxxxxxxxxxx</a>         <!-- 我希望这里放上微信公众号或者博客 -->
                    </div>

                </li>

                <li class="contact-item">

                    <div class="icon-box">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>

                    <div class="contact-info">
                        <p class="contact-title">生日</p>

                        <time datetime="1997-05-11">May 11, 1997</time>
                    </div>

                </li>

                <li class="contact-item">

                    <div class="icon-box">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>

                    <div class="contact-info">
                        <p class="contact-title">所在城市</p>

                        <address>四川.成都</address>
                    </div>

                </li>

            </ul>

            <div class="separator"></div>

            <ul class="social-list">
                <li class="social-item">
                    <a href="https://t.me/tgmasquerade" class="social-link">
                        <ion-icon name="paper-plane"></ion-icon>
                    </a>
                </li>
                <li class="social-item">
                    <a href="https://www.facebook.com/profile.php?id=100015023348678&mibextid=LQQJ4d" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li class="social-item">
                    <a href="https://twitter.com/masqueradelzd" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li class="social-item">
                    <a href="#" class="social-link">
                        <ion-icon name="logo-tiktok"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </aside>



    <!--
      - #main-content
    -->
    <div class="main-content">

        <!--
          - #NAVBAR
        -->
        <nav class="navbar">
            <ul class="navbar-list">

                <li class="navbar-item">
                    <button class="navbar-link  active" data-nav-link>关于</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>邮件</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>收藏</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>记录</button>
                </li>

                <li class="navbar-item">
                    <button class="navbar-link" data-nav-link>设置</button>
                </li>

            </ul>
        </nav>

        <!--
          关于
        -->
        <article class="about  active" data-page="关于">

            <header>
                <h2 class="h2 article-title">info</h2>
            </header>

            <section class="about-text">
                <p>
                    简介-请用一句话介绍你自己......
                </p>

                <p>
                    Dear User<br/>
                </p>
            </section>

            <!-- 爱好-->
            <section class="service">

                <h3 class="h3 service-title">爱好</h3>

                <ul class="service-list">

                    <li class="service-item">
                        <div class="service-icon-box">
                            <img src="./img/icon-design.svg" alt="" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">讨论有趣的话题</h4>
                            <p class="service-item-text">
                                总有一些思考和疑问希望与人交流分享，很高兴能够与你一同去探讨它们。<br />
                            </p>
                        </div>

                    </li>

                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="./img/icon-design.svg" alt="" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">惬意的享受阅读</h4>

                            <p class="service-item-text">
                                就像乘着一只小船，在知识的海洋中荡漾，那种自由自在的惬意，阅读给人生带来的愉悦。
                            </p>
                        </div>

                    </li>

                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="./img/icon-design.svg" alt="" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">思考未知的荒原</h4>

                            <p class="service-item-text">
                                到底是荒原难以诞生并积累真正的知识，还是知识不断被铲除而形成了知识的荒原？
                            </p>
                        </div>

                    </li>

                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="./img/icon-design.svg" alt="" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">学习培养自己</h4>

                            <p class="service-item-text">
                                获得新的知识、技能和经验，可以提高自己的认知能力、创新能力和竞争力，实现自我价值和人生价值的最大化。
                            </p>
                        </div>
                    </li>

                </ul>
            </section>

            <!-- 标签 -->
            <section class="clients">

                <h3 class="h3 clients-title">标签</h3>

                <ul class="clients-list has-scrollbar">

                    <li class="clients-item">
                        <a href="javascript:void(0);">
                            <img src="./img/user/grade5.png" alt="client logo">
                        </a>
                    </li>

                    <li class="clients-item">
                        <a href="javascript:void(0);">
                            <img src="./img/user/grade4.png" alt="client logo">
                        </a>
                    </li>

                    <li class="clients-item">
                        <a href="javascript:void(0);">
                            <img src="./img/user/grade2.png" alt="client logo">
                        </a>
                    </li>

                    <li class="clients-item">
                        <a href="javascript:void(0);">
                            <img src="./img/user/grade1.png" alt="client logo">
                        </a>
                    </li>

                    <li class="clients-item">
                        <a href="javascript:void(0);">
                            <img src="./img/user/grade3.png" alt="client logo">
                        </a>
                    </li>
                </ul>
            </section>


            <!-- 心情笔记 -->
            <section class="testimonials">

                <h3 class="h3 testimonials-title">心情笔记</h3>

                <ul class="testimonials-list has-scrollbar">

                    <li class="testimonials-item">
                        <div class="content-card" data-testimonials-item>

                            <figure class="testimonials-avatar-box">
                                <img src="./img/user/telme.png" alt="zhimochangge" width="60" data-testimonials-avatar>
                            </figure>

                            <h4 class="h4 testimonials-item-title" data-testimonials-title>黑天鹅</h4>
                            <p data-testimonials-time hidden>时间：2023-04-24</p>
                            <div class="testimonials-text" data-testimonials-text>
                                <p>
                                    我们很容易忘记我们活着本身就是极大的运气，一个可能性微小的事件，一个极大的偶然。
                                    我有时惊异于为什么人们会因为一顿不好吃的饭、一杯冷咖啡、一次社交挫折或粗鲁的接待而伤心一天或者感到愤怒。
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="testimonials-item">
                        <div class="content-card" data-testimonials-item>

                            <figure class="testimonials-avatar-box">
                                <img src="./img/user/telme2.png" alt="Jessica miller" width="60" data-testimonials-avatar>
                            </figure>

                            <h4 class="h4 testimonials-item-title" data-testimonials-title>窄门（月）</h4>
                            <p data-testimonials-time hidden>时间：2023-03-24</p>
                            <div class="testimonials-text" data-testimonials-text>
                                <p>
                                    你给我写信时，通过你，我看到世间万物；如今少了你，我看到的世间万物，都觉着是从你那里窃取来的。
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="testimonials-item">
                        <div class="content-card" data-testimonials-item>

                            <figure class="testimonials-avatar-box">
                                <img src="./img/user/telme3.png" alt="Emily evans" width="60" data-testimonials-avatar>
                            </figure>

                            <h4 class="h4 testimonials-item-title" data-testimonials-title></h4>
                            <p data-testimonials-time hidden>时间：2023-04-24</p>
                            <div class="testimonials-text" data-testimonials-text>
                                <p>

                                </p>
                            </div>
                        </div>
                    </li>
                    <!-- 添加笔记 -->
                </ul>

            </section>


            <!--
              - 心情笔记 弹窗
            -->
            <!-- 这是一个包含模态框内容的容器 -->
            <div class="modal-container" data-modal-container>

                <!-- 这是模态框弹出时会出现的半透明背景 -->
                <div class="overlay" data-overlay></div>

                <!-- 这是模态框的主体，包含了标题、内容和关闭按钮等元素 -->
                <section class="testimonials-modal">

                    <!-- 这是关闭按钮，点击后可以关闭模态框 -->
                    <button class="modal-close-btn" data-modal-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                    <!-- 这是模态框中的图像和引用图标 -->
                    <div class="modal-img-wrapper">
                        <figure class="modal-avatar-box">
                            <img src="./img/user/telme.png" alt="Daniel lewis" width="80" data-modal-img>
                        </figure>
                    </div>

                    <!-- 这是模态框中的内容，包含了标题、时间和文本等元素 -->
                    <div class="modal-content">

                        <h4 class="h3 modal-title" data-modal-title>test</h4>

                        <p data-modal-time>test-time</p>

                        <div data-modal-text>
                            <p>
                                this is test
                            </p>
                        </div>
                        <!-- <iframe  href="https://www.example.com" style="width: 95%; height: 80%; display: none;" data-modal-web></iframe> -->
                        <!-- 上面是预备小窗口显示网站的代码 -->
                    </div>

                </section>

            </div>



        </article>



        <!-- 第二个界面———— 邮件 -->

        <article class="contact" data-page="邮件">

            <header>
                <h2 class="h2 article-title">Info</h2>
            </header>

            <section class="mapbox" data-mapbox>
                <figure>
                    <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199666.5651251294!2d-121.58334177520186!3d38.56165006739519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ac672b28397f9%3A0x921f6aaa74197fdb!2sSacramento%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1647608789441!5m2!1sen!2sbd"
                            width="400" height="300" loading="lazy"></iframe>
                </figure>
            </section>

            <section class="contact-form">

                <h3 class="h3 form-title">Contact Form</h3>

                <form action="#" class="form" data-form>

                    <div class="input-wrapper">
                        <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input>

                        <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input>
                    </div>

                    <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>

                    <button class="form-btn" type="submit" disabled data-form-btn>
                        <ion-icon name="paper-plane"></ion-icon>
                        <span>Send Message</span>
                    </button>

                </form>

            </section>

        </article>


        <!-- 第三个界面板块———— 收藏 -->

        <article class="portfolio" data-page="收藏">

            <header>
                <h2 class="h2 article-title">Info</h2>
            </header>

            <section class="projects">

                <ul class="filter-list">

                    <li class="filter-item">
                        <button class="active" data-filter-btn>All</button>
                    </li>

                    <li class="filter-item">
                        <button data-filter-btn>特别喜欢</button>
                    </li>

                    <li class="filter-item">
                        <button data-filter-btn>必看</button>
                    </li>

                    <li class="filter-item">
                        <button data-filter-btn>个人</button>
                    </li>

                </ul>

                <div class="filter-select-box">

                    <button class="filter-select" data-select>

                        <div class="select-value" data-selecct-value>Select category</div>

                        <div class="select-icon">
                            <ion-icon name="chevron-down"></ion-icon>
                        </div>

                    </button>

                    <ul class="select-list">

                        <li class="select-item">
                            <button data-select-item>All</button>
                        </li>

                        <li class="select-item">
                            <button data-select-item>特别喜欢</button>
                        </li>

                        <li class="select-item">
                            <button data-select-item>必看</button>
                        </li>

                        <li class="select-item">
                            <button data-select-item>个人</button>
                        </li>

                    </ul>

                </div>

                <ul class="project-list">

                    <li class="project-item  active" data-filter-item data-category="个人">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                                <img src="./img/user/likes.webp" alt="finance" loading="lazy">
                            </figure>

                            <h3 class="project-title">心理课程</h3>

                            <p class="project-category">个人</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="个人">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes5.webp" alt="orizon" loading="lazy">
                            </figure>

                            <h3 class="project-title">小说</h3>

                            <p class="project-category">个人</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="特别喜欢">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes2.webp" alt="fundo" loading="lazy">
                            </figure>

                            <h3 class="project-title">创维</h3>

                            <p class="project-category">特别喜欢</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="必看">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes3.webp" alt="brawlhalla" loading="lazy">
                            </figure>

                            <h3 class="project-title">课程</h3>

                            <p class="project-category">必看</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="特别喜欢">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/like6.webp" alt="dsm." loading="lazy">
                            </figure>

                            <h3 class="project-title">小说</h3>

                            <p class="project-category">特别喜欢</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="特别喜欢">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes4.webp" alt="metaspark" loading="lazy">
                            </figure>

                            <h3 class="project-title">课程</h3>

                            <p class="project-category">特别喜欢</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="个人">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes5.webp" alt="summary" loading="lazy">
                            </figure>

                            <h3 class="project-title">小说</h3>

                            <p class="project-category">个人</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="必看">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/like6.webp" alt="task manager" loading="lazy">
                            </figure>

                            <h3 class="project-title">小说</h3>

                            <p class="project-category">必看</p>

                        </a>
                    </li>

                    <li class="project-item  active" data-filter-item data-category="个人">
                        <a href="javascript:void(0);">

                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>

                                <img src="./img/user/likes7.webp" alt="arrival" loading="lazy">
                            </figure>

                            <h3 class="project-title">课程</h3>

                            <p class="project-category">个人</p>

                        </a>
                    </li>

                </ul>

            </section>

        </article>





        <!-- 第三个界面———— 记录 -->

        <article class="blog" data-page="记录">

            <header>
                <h2 class="h2 article-title">Info</h2>
            </header>

            <section class="blog-posts">

                <ul class="blog-posts-list">

                    <li class="blog-post-item">
                        <a href="#">

                            <figure class="blog-banner-box">
                                <img src="./img/user/readNote3.png" alt="Design conferences in 2022" loading="lazy">
                            </figure>

                            <div class="blog-content">

                                <div class="blog-meta">
                                    <p class="blog-category">Note1</p>

                                    <span class="dot"></span>

                                    <time datetime="2022-02-23">2022-10-16</time>
                                </div>

                                <h3 class="h3 blog-item-title">记录笔记</h3>

                                <p class="blog-text">
                                    beatae - vitae - test
                                </p>

                            </div>

                        </a>
                    </li>

                    <li class="blog-post-item">
                        <a href="#">

                            <figure class="blog-banner-box">
                                <img src="./img/user/readNote2.jpg" alt="Best fonts every designer" loading="lazy">
                            </figure>

                            <div class="blog-content">

                                <div class="blog-meta">
                                    <p class="blog-category">Note2</p>

                                    <span class="dot"></span>

                                    <time datetime="2022-02-23">2023-2-12</time>
                                </div>

                                <h3 class="h3 blog-item-title">记录笔记</h3>

                                <p class="blog-text">
                                    Sed - test
                                </p>

                            </div>

                        </a>
                    </li>

                    <li class="blog-post-item">
                        <a href="#">

                            <figure class="blog-banner-box">
                                <img src="./img/user/readNote.webp" alt="" loading="lazy">
                            </figure>

                            <div class="blog-content">

                                <div class="blog-meta">
                                    <p class="blog-category">Note1</p>

                                    <span class="dot"></span>

                                    <time datetime="2022-02-23">2022-11-03</time>
                                </div>

                                <h3 class="h3 blog-item-title">记录笔记</h3>

                                <p class="blog-text">
                                    test
                                </p>

                            </div>

                        </a>
                    </li>

                    <li class="blog-post-item">
                        <a href="#">

                            <figure class="blog-banner-box">
                                <img src="./img/user/readNote.webp" alt="UI interactions of the week" loading="lazy">
                            </figure>

                            <div class="blog-content">

                                <div class="blog-meta">
                                    <p class="blog-category">Note</p>

                                    <span class="dot"></span>

                                    <time datetime="2022-02-23">2023-4-1</time>
                                </div>

                                <h3 class="h3 blog-item-title">记录笔记</h3>

                                <p class="blog-text">
                                    admin - test
                                </p>

                            </div>

                        </a>
                    </li>

                    <li class="blog-post-item">
                        <a href="#">

                            <figure class="blog-banner-box">
                                <img src="./img/user/readNote2.jpg" alt="The forgotten art of spacing" loading="lazy">
                            </figure>

                            <div class="blog-content">

                                <div class="blog-meta">
                                    <p class="blog-category">Note</p>

                                    <span class="dot"></span>

                                    <time datetime="2022-02-23">2023-4-28</time>
                                </div>

                                <h3 class="h3 blog-item-title">记录笔记</h3>

                                <p class="blog-text">
                                    test
                                </p>

                            </div>

                        </a>
                    </li>

                </ul>

            </section>

        </article>


        <!-- 第二个界面板块———— 设置 -->

        <article class="resume" data-page="设置">

            <header>
                <h2 class="h2 article-title">Info</h2>
            </header>

            <section class="timeline">

                <form action="#" method="post" class="smart-green">
                    <h1>setting user message
                        <span>设置您的信息</span>
                    </h1>
                    <label>
                        <span>用户名 :</span>
                        <input id="name" type="text" name="name" class="error" placeholder="请输入新账号"/>
                        <div class="error-msg"></div>
                    </label>

                    <label>
                        <span>邮箱 :</span>
                        <input id="email" type="email" value="" name="email" placeholder="请输入邮箱"/>
                        <div class="error-msg"></div>
                    </label>

                    <label>
                        <span>位置 :</span>
                        <input id="address" type="text" value="" name="address" placeholder="请输入地址"/>
                        <div class="error-msg"></div>
                    </label>

                    <label>
                        <span>简介 :</span>
                        <textarea id="message" name="message" maxlength="20" placeholder="输入一段话介绍你自己"></textarea>
                        <div class="error-msg"></div>
                    </label>
                    <label>
                        <span>上传头像 :</span>
                        <input id="photo" type="file" value=""  name="user_photo">
                        <div class="error-msg"></div>
                    </label>
                    <div class="success-msg"></div>
                    <label>
                        <span> </span>
                        <input type="submit" class="button" value="提交"/>
                    </label>
                </form>

            </section>

        </article>

    </div>

</main>

<!--
  - custom js link
-->
<script src="./js/user.js"></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
