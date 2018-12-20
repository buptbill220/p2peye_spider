<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo $art['title'];?>-方明buptbill220站</title>
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
         <li><a style="background:none" href="index">首页</a></li>
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
         <div class="left" id="news" style="width:100%">
           <div class="weizi" style="width:100%">
           <div class="wz_text">&nbsp;&nbsp;&nbsp;&nbsp;<span>文章内容</span></div>
           </div>
           <div class="news_content" style="width:100%;padding:0">
                  <div class="news_top" style="width:100%;padding:0">
                    <h1><?php echo $art['title'];?></h1>
                    <p>
                      <span class="left sj">时间:<?php echo substr($art['modify_time'], 0, 10);?></span><span class="left fl">浏览:<?php echo $art['read'];?></span><span class="left fl" id='dz'><a href="javascript:dz(<?php echo $art['id'];?>)">点赞</a>:<?php echo $art['love'];?></span>
                      <span class="left author">明神</span>
                    </p>
                    <div class="clear"></div>
                  </div>
                    <div class="news_text" style="min-height: 241px;width:98%;padding:5px 1%;">
                    <?php echo $art['content'];?>
                    </div>
           </div>
     
         </div>
         <!--end left -->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
    <!--footer-->
    <div id="footer">
     <p>powered by: <a href="" target="_blank">buptbill220@163.com</a> 2016/04/15</p>
    </div>
    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="js/nav.js"></script>
    <script>
        function dz(id) {
            $.post(
                    'art/dz',
                    {aid: id},
                    function(data) {
                        data = $.trim(data);
                        if (data == 'error') {
                            alert('参数错误');
                            return ;
                        }
                        if (data == 'error1') {
                            alert('未知错误');
                            return ;
                        }
                        if (data == 'error2') {
                            alert('你已经点过赞');
                            return ;
                        }
                        $('#dz').text('点赞:' + data);
                    }
                  )
        }
    </script>
</body>
</html>


