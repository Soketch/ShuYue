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
    <title>PLAN计划</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="css/plan.css">
    <script src="font_4013428_y9vkbi134e/iconfont.js"></script>
    <link rel="stylesheet" href="./font_4013428_y9vkbi134e/iconfont.css">
    <script src="./js/echarts.js"></script>
    <script src="js/plans.js" defer></script>
</head>
<body>
    <div class="layout">
        <!-- 左侧 -->
        <div class="sidebar">
            <div class="cale">
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker"> 四月 </span>
                        <div class="year-picker" id="year-picker">
                            <span class="year-change" id="pre-year">
                              <pre><</pre>
                            </span>
                            <span id="year">2020 </span>
                            <span class="year-change" id="next-year">
                              <pre>></pre>
                            </span>
                        </div>
                    </div>

                    <div class="calendar-body">
                        <div class="calendar-week-days">
                            <div>周日</div>
                            <div>周一</div>
                            <div>周二</div>
                            <div>周三</div>
                            <div>周四</div>
                            <div>周五</div>
                            <div>周六</div>
                        </div>
                        <div class="calendar-days">
                        </div>
                    </div>
                    <div class="calendar-footer">
                    </div>
                    <div class="date-time-formate">
                        <div class="day-text-formate">TODAY</div>
                        <div class="date-time-value">
                            <div class="time-formate">02:51:20</div>
                            <div class="date-formate">24 - 04 - 2023</div>
                        </div>
                    </div>
                    <div class="month-list"></div>
                </div>
                <div class="task">
                    <div class="tagBar">今日计划</div>
                    <div class="rightBar">
                        <span><img src="./img/porject/hotbook6.jpg" alt=""></span>
                        <span><img src="./img/porject/hotbook4.jpg" alt=""></span>
                    </div>
                </div>
                <div class="task">
                    <div class="tagBar">正在进行</div>
                    <div class="rightBar">
                        <div class="p-tag-box">
                            <p>《龙族Ⅲ》--13(黑月之潮)</p>
                            <p class="jind"></p>
                        </div>
                    </div>
                </div>
                <div class="task">
                    <div class="tagBar">已经完成</div>
                    <div class="rightBar">
                        <div class="p-tag-box">
                            <p>《三体·黑暗森林》</p>
                            <p class="jind2"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右侧 -->
        <div class="main">
            <!-- 头部区域-->
            <div class="main-header">
                <h1>PLAN</h1>
                <h2></h2>
            </div>
            <!-- 内容区域 -->
            <div class="content">
                <!-- 第一部分 -->
                <div class="content-title">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-fsux_tubiao_bingtu"></use>
                    </svg>  <!-- 字体图标 -->
                    <h3>chart</h3>
                </div>
                <!-- 图表 -->
                <ul>
                    <li>
                        <h4 class="chartTitle">最近半年阅读时间</h4>
                        <div class="chart1"></div>
                    </li>
                    <li>
                        <h4 class="chartTitle">最近阅读图书种类</h4>
                        <div class="chart2"></div>
                    </li>
                    <li>
                        <h4 class="chartTitle">看过最多的作者</h4>
                        <div class="chart3"></div>
                    </li>
                </ul>


                <!-- 第二部分 -->
                <div class="content-title">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-fsux_tubiao_qipaotu"></use>
                    </svg>  <!-- 字体图标 -->
                    <h3>message</h3>
                </div>
                <!-- 信息 -->
                <div class="msgBox">
                    <span>
                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-a-ziyuan16"></use>
                            </svg>累计阅读次数：<em>263</em>次</p>

                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-shijian2"></use>
                            </svg>累计阅读时间：<em>439</em>h</p>
                    </span>
                    <span>
                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-tushu"></use>
                            </svg>你已经读过<em>168</em>本书</p>
                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-tushu"></use>
                            </svg>你目前读完<em>127</em>本书</p>
                    </span>
                    <span>
                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-shijian2"></use>
                            </svg>最长在线阅读时间<em>8</em>h</p>
                        <p><svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-a-ziyuan40"></use>
                            </svg>最长论坛活跃时间<em>4.5</em>h</p>
                    </span>
                </div>

                <!-- 第三部分 热力图 -->
                <div class="content-title lastTitle">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-fsux_tubiao_relitu"></use>
                    </svg>  <!-- 字体图标 -->
                    <h3>heat</h3>
                </div>
                <!-- 信息 -->
                <div class="TChart">
                    <div class="chartbox"></div>
                </div>
            </div>

        </div>
    </div>
    <script>

        /* 柱状图 */
        let lis1 = document.querySelector("li:nth-child(1) .chart1");
        const chart1 = echarts.init(lis1);
        const option={
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'cross',
                    crossStyle: {
                        color: '#999'
                    }
                }
            },
            legend: {
                data: ['Precipitation', 'Temperature']
            },
            xAxis: [
                {
                    type: 'category',
                    data: ['一月', '二月', '三月', '四月', '五月', '六月'],
                    axisPointer: {
                        type: 'shadow'
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    min: 0,
                    max: 30,
                    interval: 15,
                    axisLabel: {
                        formatter: '{value}'
                    }
                },
                {
                    type: 'value',
                    name: 'read/H',
                    min: 0,
                    max: 100,
                    interval: 10,
                    axisLabel: {
                        formatter: '{value} h'
                    }
                }
            ],
            series: [
                {
                    name: 'T',
                    type: 'bar',
                    tooltip: {
                        valueFormatter: function (value) {
                            return value + ' day';
                        }
                    },
                    data: [
                        28, 22, 21, 26, 15, 21
                    ]
                },
                {
                    name:'H',
                    type: 'line',
                    yAxisIndex: 1,
                    tooltip: {
                        valueFormatter: function (value) {
                            return value + ' h';
                        }
                    },
                    data: [22.0, 25.2, 17.3, 34.5, 36.3, 20.2]
                }
            ]
        };
        chart1.setOption(option);

        /* 扇形图 */
        let lis2 = document.querySelector("li:nth-child(2) .chart2");
        const chart2 = echarts.init(lis2);
        const option2 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}:({d}%)"
            },
            legend: {
                //图例  标注各种颜色代表的模块
                orient: "horizontal", //图例的显示方式  默认横向显示 horizontal  vertical
                bottom: 10, //控制图例出现的距离  默认左上角
                //  left: "90%", //控制图例的位置
                itemWidth: 16, //图例颜色块的宽度和高度
                itemHeight: 16,
                icon:"circle", // 图例前的图标为圆点
                itemGap: 20,//图例之间的间距
                borderWidth: 0,                // 图例边框线宽
                left: 'left'
            },
            series: [
                {
                    name: '种类',
                    type: 'pie',
                    radius: '50%',
                    data: [
                        { value: 38, name: '文学理论' },
                        { value: 35, name: '逻辑学' },
                        { value: 22, name: '期刊' },
                        { value: 44, name: '科幻小说' },
                        { value: 30, name: '纪实小说' }
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        chart2.setOption(option2);

        /* 雷达图 */
        let lis3 = document.querySelector("li:nth-child(3) .chart3");
        const chart3 = echarts.init(lis3);
        const option3 = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    bottom:5,
                },

                radar: {
                    name: {
                        textStyle: {
                            color: '#fff',
                            backgroundColor: '#999',
                            borderRadius: 3,
                            padding: [3, 5]
                        }
                    },
                    splitNumber: 5,

                    splitArea: {
                        areaStyle: {
                            color: ['#fd9900',
                                '#fd6600',
                                '#ffc971',
                                '#82c0cc',
                                'rgba(9,124,34,.6)'],
                            shadowColor: 'rgba(123, 167, 198, 0.7)',
                            shadowBlur: 10
                        }
                    },
                    indicator: [
                        { name: '余华', max: 100},
                        { name: '韩寒', max: 100},
                        { name: '王小波', max: 100},
                        { name: '当年明月', max: 100},
                        { name: '刘慈欣', max: 100},
                        { name: '易中天', max: 100}
                    ]
                },
                series: [{
                    name:"比例",
                    type: 'radar',
                    lineStyle: {
                        width: 3,
                        color: 'rgba(33,33,33,.6)'
                    },
                    data: [
                        {
                            value: [78, 63, 80, 64, 90, 60],
                        },
                        {
                            value: [75, 53, 72, 70, 81, 40],
                            lineStyle: {
                                type: 'dashed'
                            }
                        }

                    ]
                }]
            };
        chart3.setOption(option3);

        /* 热力图 */
        let lis4 = document.querySelector(".chartbox");
        const chart4 = echarts.init(lis4, null, {locale:"ZH"});
        function getVirtualData(year) {
            const date = +echarts.time.parse(year + '-01-01');
            const end = +echarts.time.parse(+year + 1 + '-01-01');
            const dayTime = 3600 * 24 * 1000;
            const data = [];
            for (let time = date; time < end; time += dayTime) {
                data.push([
                    echarts.time.format(time, '{yyyy}-{MM}-{dd}', false),
                    Math.floor(Math.random() * 80)
                ]);
            }
            return data;
        }
        const option4 = {
            title: {
                top: 30,
                left: 'center',
                /*text: '热度表'*/
            },
            tooltip: {
                formatter: '{a} <br/>{b} : {c}'
            },
            visualMap: {
                min: 0,
                max: 100,
                type: 'piecewise',
                inRange:{
                    color: ['rgb(220,233,200)','rgb(123,201,111)', 'rgb(25,98,35)']
                },
                orient: 'horizontal',
                left: 'center',
                top: 65
            },
            calendar: {
                top: 120,
                left: 30,
                right: 30,
                cellSize: ['auto', 13],
                range: '2022',
                itemStyle: {
                    borderWidth: 0.5
                },
                yearLabel: { show: false }
            },
            series: {
                name: '阅读热力值',
                type: 'heatmap',
                coordinateSystem: 'calendar',
                data: getVirtualData('2022')
            }
        };
        chart4.setOption(option4);
    </script>


</body>
</html>