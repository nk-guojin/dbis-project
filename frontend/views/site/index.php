<?php


/**
 * Team: "小组"小组
 * Coding by 2012516
 * This is the index of frontend site
 */

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '“小组”小组互联网数据库';
?>
<div class="site-index" >
    <div class="row">
    <style> 
    
    .carousel .item {
  height: 600px;
  background-color: #777;
}
@import url(https://fonts.googleapis.com/css?family=Raleway:400,900);

body{
  font-family: 'Raleway', sans-serif;
  color: #333;
}

header h1{
  text-align: center;
  font-weight: bold;
  margin-top: 0;
}
  
 header p{
   text-align: center;
   margin-bottom: 0;
 }

.hexa{
  border: 0px;
  float: left;
  text-align: center;
  height: 35px;
  width: 60px;
  font-size: 22px;
  background: #f0f0f0;
  color: #3c3c3c;
  position: relative;
  margin-top: 15px;
}

.hexa:before{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-bottom: 15px solid #f0f0f0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  top: -15px;
}

.hexa:after{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  border-top: 15px solid #f0f0f0;
  bottom: -15px;
}

.timeline {
  position: relative;
  padding: 0;
  width: 100%;
  margin-top: 20px;
  list-style-type: none;
}

.timeline:before {
  position: absolute;
  left: 50%;
  top: 0;
  content: ' ';
  display: block;
  width: 2px;
  height: 100%;
  margin-left: -1px;
  background: rgb(213,213,213);
  background: -moz-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
  background: -webkit-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -o-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -ms-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: linear-gradient(to bottom, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  z-index: 5;
}

.timeline li {
  padding: 2em 0;
}

.timeline .hexa{
  width: 16px;
  height: 10px;
  position: absolute;
  background: #A066D3;
  z-index: 5;
  left: 0;
  right: 0;
  margin-left:auto;
  margin-right:auto;
  top: -30px;
  margin-top: 0;
}

.timeline .hexa:before {
  border-bottom: 4px solid #A066D3;
  border-left-width: 8px;
  border-right-width: 8px;
  top: -4px;
}

.timeline .hexa:after {
  border-left-width: 8px;
  border-right-width: 8px;
  border-top: 4px solid #A066D3;
  bottom: -4px;
}

.direction-l,
.direction-r {
  float: none;
  width: 100%;
  text-align: center;
}

.flag-wrapper {
  text-align: center;
  position: relative;
}

.flag {
  position: relative;
  display: inline;
  background: rgb(255,255,255);
  font-weight: 600;
  z-index: 15;
  padding: 6px 10px;
  text-align: left;
  border-radius: 5px;
}

.direction-l .flag:after,
.direction-r .flag:after {
  content: "";
  position: absolute;
  left: 50%;
  top: -15px;
  height: 0;
  width: 0;
  margin-left: -8px;
  border: solid transparent;
  border-bottom-color: rgb(255,255,255);
  border-width: 8px;
  pointer-events: none;
}

.direction-l .flag {
  -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.direction-r .flag {
  -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.time-wrapper {
  display: block;
  position: relative;
  margin: 4px 0 0 0;
  z-index: 14;
  line-height: 1em;
  vertical-align: middle;
  color: #fff;
}

.direction-l .time-wrapper {
  float: none;
}

.direction-r .time-wrapper {
  float: none;
}

.time {
  background: #A066D3;
  display: inline-block;
  padding: 8px;
}

.desc {
  position: relative;
  margin: 1em 0 0 0;
  padding: 1em;
  background: rgb(254,254,254);
  -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
  -moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
  box-shadow: 0 0 1px rgba(0,0,0,0.20);
  z-index: 15;
}

.direction-l .desc,
.direction-r .desc {
  position: relative;
  margin: 1em 1em 0 1em;
  padding: 1em;
  z-index: 15;
}

@media(min-width: 768px){
  .timeline {
    width: 660px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .timeline li:after {
    content: "";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
  }
  
  .timeline .hexa {
    left: -28px;
    right: auto;
    top: 8px;
  }

  .timeline .direction-l .hexa {
    left: auto;
    right: -28px;
  }

  .direction-l {
    position: relative;
    width: 310px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 310px;
    float: right;
    text-align: left;
  }

  .flag-wrapper {
    display: inline-block;
  }
  
  .flag {
    font-size: 18px;
  }

  .direction-l .flag:after {
    left: auto;
    right: -16px;
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-left-color: rgb(254,254,254);
    border-width: 8px;
  }

  .direction-r .flag:after {
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-right-color: rgb(254,254,254);
    border-width: 8px;
    left: -8px;
  }

  .time-wrapper {
    display: inline;
    vertical-align: middle;
    margin: 0;
  }

  .direction-l .time-wrapper {
    float: left;
  }

  .direction-r .time-wrapper {
    float: right;
  }

  .time {
    padding: 5px 10px;
  }

  .direction-r .desc {
    margin: 1em 0 0 0.75em;
  }
}

@media(min-width: 992px){
  .timeline {
    width: 800px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .direction-l {
    position: relative;
    width: 380px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 380px;
    float: right;
    text-align: left;
  }

  .bgr{
    background:#fff;
    padding:1px;
    color:#000;
  }
}
    </style> 
    <link href="css/style.css" rel = "stylesheet" >
    <!--改成滑动-->
        <!-- Carousel
    ================================================== -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/nk3.png" alt="First slide" width="1200px" height="600px">
      <div class="carousel-caption">
          <p style="font-size:50px;color:white">“小组”小组DBIS设计作业</p>
          <p >组长：郭谨</p>
          <p >组员：陈睿颖、赵一名、林雨豪</p>
      </div>
    </div>
    <div class="item">
      <img src="images/ew2.png" alt="Second slide"  width="1200px" height="600px" >
      <div class="carousel-caption">
          <p style="font-size:60px;color:white">俄乌战争</p>
          <p>&emsp;&emsp;当地时间2022年2月24日，俄罗斯总统普京在对俄罗斯民众发表的特别讲话中宣布，
            他决定在顿巴斯地区开展特别军事行动。普京表示，俄罗斯没有“侵略”乌克兰的计划，
            俄方致力于缓解乌克兰局势。鉴于北约的不断东扩，俄罗斯的安全环境不断恶化，
            俄罗斯不得已做出这个决定。随着俄罗斯总统普京对乌克兰宣战，俄乌战争正式拉开序幕，
            局势瞬息万变。乌克兰总统泽连斯基表示，乌克兰全境将进入战时状态。</p>
      </div>
    </div>
    <div class="item">
      <img src="images/ew.png" alt="Third slide" width="1200px" height="600px">
      <div class="carousel-caption">
          <p style="font-size:50px;color:white">反对战争，珍视和平</p>
          <p>本网站旨在分享俄乌战争真实新闻，提供访问者合理交流的平台，请理性发声。</p>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <!--div class="bgimg"></div-->
    
<body background="images/nk.png" style=" background-repeat:no-repeat ;background-position:center;background-size:auto auto;
background-attachment: fixed;opacity:1">

<div class="jumbotron">
  <h1><span class="bgr">“小组”小组互联网数据库</span></h1>
  <p><span class="bgr">&emsp;&emsp;俄乌战争是2014年2月20日起俄罗斯与乌克兰之间爆发的一场旷日持久的混合战争，
            前期以低强度战争及代理人战争形式进行。
            2022年2月24日，俄白联盟以“非军事化、去纳粹化”为由全面入侵乌克兰，
            冲突当日起正式白热化为全面战争，并迅速发展为第二次世界大战以来欧洲最大规模的战争。
            冲突至今仍未得到缓解，俄乌形势也因多方势力的参与更加复杂化，本站点将聚焦于该冲突，提供与该冲突相关的内容信息。</span></p>
</div>

<div>
<div class="jumbotron">
  <h1><span class="bgr">俄乌冲突重要事件回顾</span></h1>
</div>

<ul class="timeline">
  <!-- Item 1 -->
  <li>
    <div class="direction-l">
      <div class="flag-wrapper">
        <span class="hexa"></span>
        <span class="flag"></span>
        <span class="time-wrapper"><span class="time">Feb.21 2022</span></span>
      </div>
      <div class="desc">普京签署关于承认“顿涅茨克人民共和国”和关于承认“卢甘斯克人民共和国”的命令，以及俄罗斯分别与这两个“共和国”的友好合作互助条约。</div>
    </div>
  </li>

  <!-- Item 2 -->
  <li>
    <div class="direction-l">
      <div class="flag-wrapper">
        <span class="hexa"></span>
        <span class="flag"></span>
        <span class="time-wrapper"><span class="time">Feb.23 2022</span></span>
      </div>
      <div class="desc">乌克兰议会批准在全国实施紧急状态.</div>
    </div>
  </li>

  <!-- Item 3 -->
  <li>
    <div class="direction-l">
      <div class="flag-wrapper">
        <span class="hexa"></span>
        <span class="flag"></span>
        <span class="time-wrapper"><span class="time">Feb.24 2022</span></span>
      </div>
      <div class="desc">俄罗斯总统普京发表电视讲话称，决定在顿巴斯地区发起特别军事行动。乌克兰总统泽连斯基2月24日宣布，乌克兰全国进入战时状态，并于当天晚些时候宣布与俄罗斯断交</div>
    </div>
  </li>

  <!-- Item 4 -->
  <li>
    <div class="direction-r">
      <div class="flag-wrapper">
        <span class="hexa"></span>
        <span class="flag"></span>
        <span class="time-wrapper"><span class="time">最新进展</span></span>
      </div>
      <div class="desc">美知名记者爆料“北溪”事件系美政府策划 俄方抨击西方欲“悄然结案”</div>
    </div>
  </li>
</ul>

</div>
    <div class="body-content">
    <style> 
    .col-lg-4{ float:left;width:33%;height: 30%;}         

    </style> 
        <div class="row">
            <div class="col-lg-4">
                <h2><span class="bgr">简介<span></h2>

                <p><span class="bgr">&emsp;&emsp;俄乌冲突的规模之大，持续时间之久出乎世界人民意料。
                    无论战争的最终受害者永远是人民，本着热爱和平，期待战争结束，
                    两国人民重新生活安定的理念，我们建立此网站，搜集并展示与俄乌冲突相关的内容资料，
                    力求将真实情况展现给访问者，建立访问者之间交流的平台，让该事件得到更加广泛、全面的关注。<span></p>
            </div>

            <div class="col-lg-4">
                <h2><span class="bgr">分工简介<span></h2>

                <p><span class="bgr">郭谨 组长、前端功能
                <p> <span class="bgr">林雨豪 后台评论管理和管理员功能、前台主页设计
                <p><span class="bgr">赵一名 创建网站原型、文章增删查改功能
                <p><span class="bgr">陈睿颖 文章增删查改功能
                <span></p>
            </div>

            <div class="col-lg-4">
                <h2><span class="bgr">小组作业链接<span></h2>

                <a href="https://github.com/nk-guojin/dbis-project">小组作业的github仓库链接</a>
            </div>
        </div>

    </div>
</div>
