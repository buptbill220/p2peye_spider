<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>邮币卡数据</title>
<meta name="keywords" content="buptbill220站,方明" />
<meta name="description" content="方明搜索引擎" /><meta name="googlebot" content="all"><meta name="Baiduspider" content="all"><meta name="revisit-after" CONTENT="1 days" ><meta name="keywords" content="方明|bupt|buptbill220|个人站|技术|人生"><meta name="author" content="fangming.fm"><meta name="copyright" content="copyright @fangming"><meta name="reply-to" content="buptbill220@163.com"><meta http-equiv="Content-Language" Content="zh-CN,EN"><base target="_blank" />
<meta name="baidu-site-verification" content="76FF7ouPqi" /><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<link rel="stylesheet" href="http://lovezxp.com:9000/ace/css/bootstrap.min.css" />
<script type="text/javascript" src="http://lovezxp.com:9000/ace/js/jquery.min.js"></script>
<script type="text/javascript" src="http://lovezxp.com:9000/ace/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<style>
table.my, table.my tr {background-color: #272727;color: white;}
.gold { color: yellow;}
.equal { color: white;}
.down { color: green;}
.up { color: red;}
</style>
</head>
<body>
      <h2>访问<?php echo $arrpv;?>次<span style="margin:5px;color: #999;font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;当前位置: <?php echo $address;?></span></h2>
      <div class="data"></div>
    <script>
        var tidx = (new Date()).valueOf();
         var tfunc = function pullData(url) {
             var t = (new Date()).valueOf();
             var u = url;
             if (url == '/ybk') {
                 u = url + '?tidx=' + tidx + '&t=' + t;
                 tidx = tidx + 1;
             }
             $.ajax({
                 type: 'GET',
                 url: u,
                 async: true,
                 success: function(data) {
                    if (url == '/ybk') {
                        var table = data[0]['indexHtml'] + data[0]['dataHtml'] + data[0]['stockHtml'];
                        res = table.replace(/<table/g, '<table class="table table-bordered my"');
                        $('div.data').html(res);
                    } else {
                        var stockData = data['data'];
                        res = stockData[0];
                        $('div.data').html(res);
                    }
                 }
             });
        }
        tfunc('/ybk');
        setInterval("tfunc('/ybk')", 5000);
    </script>
</body>
</html>
