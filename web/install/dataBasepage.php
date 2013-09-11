
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> 创建数据库 </title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
      <link href="/assets/libs/gallery2/bootstrap/3.0.0/css/bootstrap.css?2" rel="stylesheet" />
    <link rel="stylesheet" media="screen" href="/assets/css/common.css?2" />
    <link rel="stylesheet" media="screen" href="/bundles/topxiaweb/css/web.css?2" />
    <!--[if lt IE 9]>
    <script src="/assets/libs/bootstrap/3.0.0/html5shiv.js?2"></script>
    <script src="/assets/libs/bootstrap/3.0.0/respond.min.js?2"></script>
  <![endif]-->

</head>

<body>

<div class="container" style="width:940px">
    
  <div class="es-row-wrap">

      <div class="row">

        <div class="col-lg-12">
          
            <div class="es-box">

             <div class="setup-wizard">
              <span class="pull-left text-primary" style="font-weight:900;font-size:250%">Edusoho</span>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <span class="text-success" style="font-weight:900;font-size:250%">安装向导</span>
            </div>
            <hr>

          <ul class="nav nav-pills nav-justified" style="font-weight:900;font-size:150%">
            <li class="disabled"><a style="color:green">1 环境检测</a></li>
            <li class="active disabled"><a>2 创建数据库</a></li>
            <li class="disabled"><a>3 初始化系统</a></li>
            <li class="disabled"><a>4 进入首页</a></li>
          </ul>
          <hr>
         <p class="text-info">注:数据库密码可以为空</p>
          <hr>
          <form class="form-horizontal" id="create-data-form" action="./createData.php" role="form" action="" method="post">

            <label> 数据库信息</label>
            <div class="form-group">
              <label for="dbhost" class="col-sm-2 control-label">数据库服务器：</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input" id="dbhost" name="dbhost" value="127.0.0.1" placeholder="数据库服务器地址，一般为127.0.0.1">
                <p class="help-block"><span class="text-danger"></span></p>
              </div>
            </div>

            <div class="form-group">
              <label for="dbuser" class="col-sm-2 control-label">数据库用户名：</label>
              <div class="col-sm-10">
                <input type="text" id="dbuser" name="dbuser" class="form-control input" value="root" placeholder="数据库用户名">
                <p class="help-block"><span class="text-danger"></span></p>
              </div>
            </div>

            <div class="form-group">
              <label for="dbpw" class="col-sm-2 control-label">数据库密码：</label>
              <div class="col-sm-10">
                <input type="password" class="form-control input" id="dbpw" name="dbpw">
                <p class="help-block"><span class="text-danger"></span></p>
              </div>
            </div>

            <div class="form-group">
              <label for="dbname" class="col-sm-2 control-label">数据库名：</label>
              <div class="col-sm-10">
                <input type="text" id="dbname" name="dbname" class="form-control input">
                <p class="help-block"><span class="text-danger"></span></p>
              </div>
            </div> 

            <div class="tac">
              <button type="submit" id="create-db" class="btn btn-primary btn-lg">创建数据库</button>
            </div>

          </form>

          </div>

        </div>

      </div>

  </div>

</div>
<script type="text/javascript">
  (function (btn) {
      function $(str) { return document.getElementById(str); }
      $(btn).onclick = function () {
          this.innerHTML = "正在创建数据库...";
          this.disabled = true;
          $("create-data-form").submit();
      }
  })("create-db");
</script>

</body>

</html>