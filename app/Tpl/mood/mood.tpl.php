<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>碎言碎语-方明buptbill220站</title>
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
    </div>
    <!--header end-->
    <!--content start-->
    <div id="say">
     <div class="weizi">
           <div class="wz_text">&nbsp;&nbsp;&nbsp;&nbsp;<h1>碎言碎语</h1></div>
           </div>
           <?php foreach ($mood as $m): ?>
          <ul class="say_box">
                     <div class="sy">
                         <p><?php echo $m['sub_title'];?></p>
                     </div>
                  <span class="dateview" style="line-height:18px"><?php echo $m['modify_time'];?></span>
          </ul>
          <?php endforeach;?>
          <div class="small_page" style="height:25px;margin-left:-200px">
            <ul>
            <?php   
            if( $tpage > 0 ){
                $pre = $pid-1;$next = $pid+1;
                if( $pid != 1 ) 
                    echo "<li><a href='mood?pid=$pre'>前一页</a></li>";
                $start = (intval(($pid-1)/5))*5+1;
                for( $i = $start; $i <= $tpage && $i < $start+5 ; ++$i ){
                    if( $i == $pid ) echo "<li class='active'><a>$i</a></li>";
                    else echo "<li><a href='mood?pid=$i'>$i</a></li>";
                }
                if( $i <= $tpage ){
                    echo "<li class='disable'><a>...</a></li>";
                    echo "<li><a href='mood?&pid=$tpage'>$tpage</a></li>";
                }
                if( $pid != $tpage )
                    echo "<li><a href='mood?pid=$next'>后一页</a></li>";
            }
            ?>
            </ul>
            </div>
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
