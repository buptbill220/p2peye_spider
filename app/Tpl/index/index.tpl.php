<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>方明buptbill220站</title>
<meta name="keywords" content="buptbill220站,方明" />
<meta name="description" content="方明个人博客" /><meta name="googlebot" content="all"><meta name="Baiduspider" content="all"><meta name="revisit-after" CONTENT="1 days" ><meta name="keywords" content="方明|bupt|buptbill220|个人站|技术|人生"><meta name="author" content="fangming.fm"><meta name="copyright" content="copyright @fangming"><meta name="reply-to" content="buptbill220@163.com"><meta http-equiv="Content-Language" Content="zh-CN,EN"><base target="_parent" />
<meta name="baidu-site-verification" content="76FF7ouPqi" /><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /><link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
    <!--header start-->
    <div id="header">
      <h1>方明buptbill220站-访问<?php echo $arrpv;?>次<span style="margin:5px;color: #999;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;当前位置: <?php echo $address;?></span></h1>
      <p>青春是打开了,就合不上的书。人生是踏上了，就回不了头的路，爱情是扔出了，就收不回的赌注。</p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <ul>
         <li><a href="index">首页</a></li>
         <li><a href="about">关于我</a></li>
         <li><a href="mood">碎言碎语</a></li>
         <li><a href="diary">人生感悟</a></li>
         <li><a href="photo">美图</a></li>
         <li><a href="learn">学无止境</a></li>
         <li><a href="message">留言</a></li>
         <div class="clear"></div>
        </ul>
      </div>
       <!--nav end-->
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="c_left">
           <div class="s_tuijian">
           <h2>文章<span>推荐</span></h2>
           </div>
          <div class="content_text">
           <?php foreach ($art as $a):?>
           <!--wz-->
           <div class="wz">
            <h3><a href="art?aid=<?php echo $a['id'];?>" title="<?php echo $a['title'];?>"><?php echo $a['title'];?></a></h3>
             <dl>
               <dt><img src="<?php echo $pics[rand(0, $pn-1)];?>" width="200"  height="123" alt=""></dt>
               <dd>
                 <p class="dd_text_1"><?php echo $a['sub_title'];?></p>
               <p class="dd_text_2">
               <span class="left author">明神</span><span class="left sj">时间:<?php echo substr($a['modify_time'], 0, 10);?></span>
               <span class="left fl">赞数:<a><?php echo $a['love'];?></a></span><span class="left yd"><a href="art?aid=<?php echo $a['id'];?>" title="阅读全文">瞅瞅</a>
               </span>
                <div class="clear"></div>
               </p>
               </dd>
               <div class="clear"></div>
             </dl>
            </div>
           <!--wz end-->
           <?php endforeach;?> 
           </div>
         </div>
         <!--left end-->
         <!--right-->
         <div class="right" id="c_right">
          <div class="s_about">
          <h2>个人简介</h2>
           <img src="images/my.png" width="230" height="230" alt="博主"/>
           <p>博主：buptbill220</p>
           <p>职业：阿里巴巴-c++研发</p>
           <p>简介：青春无悔</p>
           <p>邮箱：buptbill220@163.com</p>
           <p>
           <div class="clear"></div>
           </p>
          </div>
           <div class="link">
            <h2>友情链接</h2>
            <p><a href="http://bbs.byr.cn/" target="_blank">北邮人社区</a></p>
            <p><a href="http://www.newsmth.net/" target="_blank">水木社区</a></p>
            <p><a href="https://www.infoq.com/" target="_blank">infoq</a></p>
            <p><a href="http://zhihu.com." target="_blank">知乎</a></p><p><a href="http://neuralnetworksanddeeplearning.com" target="_blank">神经网络深度学习</a></p>
           </div>
         </div>
         <!--right end-->
         <div class="clear"></div>
    </div>
    <!--content end-->
    <!--footer start-->
    <div id="footer">
     <p>powered by: <a href="" target="_blank">buptbill220@163.com</a> 2016/04/15</p>
    </div>
    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="js/nav.js"></script>
</body>
</html>
