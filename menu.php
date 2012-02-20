<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript">

$(function(){
	$('.dropdown').mouseenter(function(){
		$('.sublinks').stop(false, true).hide();
	
		var submenu = $(this).parent().next();

		submenu.css({
			position:'absolute',
			top: $(this).offset().top + $(this).height() + 'px',
			left: $(this).offset().left + 'px',
			zIndex:1000
		});
		
		submenu.stop().slideDown(300);
		
		submenu.mouseleave(function(){
			$(this).slideUp(300);
		});
	});
});
</script>
		<style type="text/css" title="currentStyle">
			@import " ./css/main.css";
		</style>
<style type="text/css">

/* CSS For Dropdown Menu Start */
#container_menu ul
{
  list-style:none;
  padding:0px;
  margin:0px
}

#container_menu ul li
{
  display:inline;
  float:left;
}

#container_menu ul li a
{
  color:#ffffff;
  background:#990E00;
  margin-right:5px;
  font-weight:bold;
  font-size:12px;
  font-family:verdana;
  text-decoration:none;
  display:block;
  width:100px;
  height:25px;
  line-height:25px;
  text-align:center;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border: 1px solid #560E00;
}

#container_menu ul li a:hover
{
  color:#cccccc;
  background:#560E00;
  font-weight:bold;
  text-decoration:none;
  display:block;
  width:100px;
  text-align:center;
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border: 1px solid #000000;
}

#container_menu ul li.sublinks a
{
  color:#000000;
  background:#f6f6f6;
  border-bottom:1px solid #cccccc;
  font-weight:normal;
  text-decoration:none;
  display:block;
  width:100px;
  text-align:center;
  margin-top:2px;
}

#container_menu ul li.sublinks a:hover
{
  color:#000000;
  background:#FFEFC6;
  font-weight:normal;
  text-decoration:none;
  display:block;
  width:100px;
  text-align:center;
}

#container_menu ul li.sublinks
{
	display:none;
}

/* CSS For Dropdown Menu End */



#container_menu
{
  margin:0 auto;
	
}
.bot_20px
{
	margin-bottom:40px;
}
.clear
{
  clear:both;
}

.left
{
  float:left;
}

.right
{
  float:right;
}
</style>

<div id="container_menu">
	
	<!-- First Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">支付明细</a></li>
		
		<li class="sublinks">
			<a href="./addDetail.php">添加明细</a>
			<a href="./editDetail.php">修改明细</a>
			<a href="./listall.php">查看全部</a>
			<a href="upload.php?action=detail">从Excel导入</a>
			<a href="#">Link 5</a>
		</li>
		
	</ul>
	<!-- First Menu End -->

	<!-- Second Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">工时管理</a></li>
		
		<li class="sublinks">
			<a href="./Working.php?action=working">添加工时</a>
			<a href="#">Link 2</a>
			<a href="./Working.php?action=listworking">查看全部</a>
			<a href="upload.php?action=workingtime">从Excel导入</a>
			<a href="#">Link 5</a>
		</li>
		
	</ul>
	<!-- Second Menu End -->

	<!-- Third Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">监考管理</a></li>
		
		<li class="sublinks">
			<a href="./class.php?action=addclass">添加监考课程</a>
			<a href="./class.php?action=addteacher">添加监考老师</a>
			<a href="./class.php?action=listclass">批量添加监考费用</a>
			<a href="#">Link 4</a>
			<a href="#">Link 5</a>
		</li>
		
	</ul>
	<!-- Third Menu End -->
	
	<!-- Third Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">打印管理</a></li>
		
		<li class="sublinks">
			<a href="print.php">劳务用工结算单</a>
			<a href="print.php">费用报销单</a>
			<a href="#">Link 3</a>
			<a href="#">Link 4</a>
			<a href="#">Link 5</a>
		</li>
		
	</ul>
	<!-- Third Menu End -->

	<!-- Fourth Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">数据导入</a></li>
		
		<li class="sublinks">
			<a href="./dataimport.php?action=addteachers">批量添加教师</a>
			<a href="./dataimport.php?action=addcourses">批量添加监考课程</a>
			<a href="./importexcel.php"></a>
			<a href="report.php">明细报表</a>
			<a href="#">Link 5</a>
		</li>
		
	</ul>
	<!-- Fourth Menu End -->

	<!-- Fifth Menu Start -->
	<ul>
		<li><a href="#" class="dropdown">系统设置</a></li>
		
		<li class="sublinks">
			<a href="system.php?action=modifypass">修改密码</a>
			<a href="system.php?action=adduser">添加用户</a>
			<a href="system.php?action=addrole">添加角色</a>
			<a href="loginout.php">退出</a>
		</li>
		
	</ul>
	<!-- Fifth Menu End -->
	<!-- Back to iShift link -->
	<br><br>
	</div>
	

