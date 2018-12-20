<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>北邮论坛专用搜索引擎</title>
<meta name="keywords" content="buptbill220站,方明" />
<meta name="description" content="方明搜索引擎" /><meta name="googlebot" content="all"><meta name="Baiduspider" content="all"><meta name="revisit-after" CONTENT="1 days" ><meta name="keywords" content="方明|bupt|buptbill220|个人站|技术|人生"><meta name="author" content="fangming.fm"><meta name="copyright" content="copyright @fangming"><meta name="reply-to" content="buptbill220@163.com"><meta http-equiv="Content-Language" Content="zh-CN,EN"><base target="_blank" />
<meta name="baidu-site-verification" content="76FF7ouPqi" /><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /><link rel="stylesheet" href="http://lovezxp.com/css/index.css"/>
<link rel="stylesheet" href="http://lovezxp.com/css/style.css"/>
<script type="text/javascript" src="http://lovezxp.com/js/jquery1.42.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<style>
.cont {text-align:center;position:absolute;left:30%;top:%50;bottom:50%;right:30%;width:40%;min-width:360px;verticle-align:middle;}
button, a.search { 
background: #f3f3f3;
border: none;
font-size: 20px;
color: #666;
font-weight: bold;
width: 35%;
height: 29px;
padding: 4px;
margin: 20px 6%;
float: left;
text-decoration: none;
}
input {
width: 100%;
height: 25px;
font-size: 14px;
}
.clear {
float: left;
clear: both;
}
div.text {
position: absolute;
top: 50px;
right: 20px;
width: 600px;
height: auto;
border: 1px #666 solid;
display: none;
color: #222;
}
</style>
</head>
<body>
<?php if(isset($type)):?>
      <h2>访问<?php echo $arrpv;?>次<span style="margin:5px;color: #999;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;当前位置: <?php echo $address;?></span><?php echo "共{$hits}条结果，查询时间：{$time}s";?></h2>
    <div style="text-align:left;float:left;width:100%;height:auto;padding: 20px 50px;">
        <div style='float:left;width:100%'>
            <h2>buptbill220@163.com</h2>
            <form method='GET' action='/'>
                <input name="text" style='width:420px;margin-bottom:20px;'/>
                <input name='type' type='hidden' value='<?php echo $type;?>'/>
            </form>
        </div>
        <?php foreach($data as $d) {
            if ($type == 'author') {
                echo "<div style='float:left;width:100%'>";
                echo "author: &nbsp;{$d['author']}&nbsp;&nbsp;<a href='{$d['url']}'>{$d['title']}</a>";
                echo "</div>";
            } else {
                echo "<div style='float:left;width:100%'>";
                echo "<a class='art' href='{$d['url']}' data='" . htmlentities($d['text']) . "'>" . substr($d['text'], 0, 100) . "</a>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <script>
        words = '<?php echo implode(' ', $words); ?>';
        $(function() {
                $("a.art").hover(function() {
                            data = $(this).attr('data');
                            res = data;
                            ws = words.split(' ');
                            for (w in ws) {
                                res = res.replace(new RegExp('(' + ws[w] + ')', 'gi'), '<span style="color:red;font-weight:bold;font-size:18px">$1</span>');
                            }
                            $("div.text").css('display', 'block');
                            $("div.text").html(res);
                        }, function() {
                            $("div.text").text("");
                            $("div.text").css('display', 'none');
                        })
                }
         )
    </script>
    <div class="text"></div>
    <div class="small_page" style="text-align:left;height:25px;padding-top:20px">
    <ul style="margin-top:50px;text-align:left;padding:20px 50px">
    <?php
        if( $tpage > 0 ){
            $pre = $p-1;$next = $p+1;
            if( $p != 1 ) 
                echo "<li><a href='/?type=$type&text=$text&p=$pre'>前一页</a></li>";
            $start = (intval(($p-1)/5))*5+1;
            for( $i = $start; $i <= $tpage && $i < $start+5 ; ++$i ){
                if( $i == $p ) echo "<li class='active'><a>$i</a></li>";
                else echo "<li><a href='/?type=$type&text=$text&p=$i'>$i</a></li>";
            }
            if( $i <= $tpage ){
                echo "<li class='disable'><a>...</a></li>";
                echo "<li><a href='/?type=$type&text=$text&p=$tpage'>$tpage</a></li>";
            }
            if( $p != $tpage )
                echo "<li><a href='/?type=$type&text=$text&p=$next'>后一页</a></li>";
        }
    ?>
    </ul>
    </div>
<?php else:?>
      <h2>访问<?php echo $arrpv;?>次<span style="margin:5px;color: #999;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;当前位置: <?php echo $address;?></span></h2>
<div class='cont'>
<h1 style='color:#4285f4;margin:10px;padding:15px;'>buptbill220@163.com</h1>
<input type='text' style='width:100%' />
<div class='clear'></div>
<a id='author' class='search' type='/?type=author'>按用户名/标题搜索</a><a id='article' class='search' type='/?type=article'>按内容搜索</a>
</div>
<script>
$(document).ready(function(){
        $("a").click(function()
            {
            text = $("input").attr('value');
            pref = $(this).attr('type');
            window.open(pref + '&text=' + encodeURI(text));
            })
    }
 )
</script>
<?php endif;?>
</body>
</html>
