<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>学无止境-方明buptbill220站</title>
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
         <div class="left" id="learn">
           <div class="weizi">
           <div class="wz_text">&nbsp;&nbsp;&nbsp;&nbsp;<h1>学无止境</h1></div>
           </div>
           <div class="l_content">
           <?php foreach ($learn as $l):?>
              <!--wz-->
           <div class="wz">
            <h3><a href="art?aid=<?php echo $l['id'];?>" title="<?php echo $l['title'];?>"><?php echo $l['title'];?></a></h3>
             <dl>
               <dt><img src="<?php echo $pics[rand(0, $pn-1)];?>" width="200"  height="123" alt=""></dt>
               <dd>
                 <p class="dd_text_1"><?php echo $l['sub_title'];?></p>
               <p class="dd_text_2">
               <span class="left author">明神</span><span class="left sj">时间:<?php echo substr($l['modify_time'], 0, 10);?></span>
               <span class="left fl">热度:<a><?php echo $l['read'];?></a></span><span class="left yd"><a href="art?aid=<?php echo $l['id'];?>" title="阅读全文">瞅瞅</a>
               </span>
                <div class="clear"></div>
               </p>
               </dd>
               <div class="clear"></div>
             </dl>
            </div>
           <!--wz end-->
           <?php endforeach;?>
            <div class="small_page" style="height:25px;">
            <ul>
            <?php   
            if( $tpage > 0 ){
                $pre = $pid-1;$next = $pid+1;
                if( $pid != 1 ) 
                    echo "<li><a href='learn?pid=$pre'>前一页</a></li>";
                $start = (intval(($pid-1)/5))*5+1;
                for( $i = $start; $i <= $tpage && $i < $start+5 ; ++$i ){
                    if( $i == $pid ) echo "<li class='active'><a>$i</a></li>";
                    else echo "<li><a href='learn?pid=$i'>$i</a></li>";
                }
                if( $i <= $tpage ){
                    echo "<li class='disable'><a>...</a></li>";
                    echo "<li><a href='learn?&pid=$tpage'>$tpage</a></li>";
                }
                if( $pid != $tpage )
                    echo "<li><a href='learn?pid=$next'>后一页</a></li>";
            }
            ?>
            </ul>
            </div>
           </div>
         </div>
         <!--end left -->
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
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
    <!--footer-->
    <div id="footer">
     <p>powered by: buptbill220@163.com 2016/04/15</p>
    </div>
    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="js/nav.js"></script>
</body>
</html>

