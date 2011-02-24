﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html profile="http://gmpg.org/xfn/11">
	<head>
		<title>
			Register--Cybery Reader
		</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<script type="text/javascript" src="jquery.js"></script>
		<link rel="stylesheet" href="../../static/css/style_r.css" type="text/css" />
		<script type="text/javascript">
			$(document).ready(function(){
				$("p.remind").click(function(){
					$("#message").hide();
					$("#messagetext").show();
				});
				$("img.delete").click(function(){
					$("#message").hide();
					$("#messagetext").hide();
				});
			});
		</script>
	</head>

	<body>
		<div id="header">
			<img src="../../static/images/logo.png" class="logo" />
			<img src="../../static/images/see.png" class="logonote"/>
		</div>
		<?php if($this->tpl_vars["ismsg"]){ ?>
		<div id="message">
			<img src="../../static/images/butexit.gif" class="delete" /><p class="remind"><?php echo $this->tpl_vars["msg"]; ?></p>
		</div>
		
		<div id="messagetext">
			<img src="../../static/images/butexit.gif" class="delete" /><p class="message"><?php echo $this->tpl_vars["msg"]; ?></p>
		</div>
		<?php } ?>
		<div id="context">
				<img src="../../static/images/step_2.png" class="step" />
				<form method="post">
					<input class="name" type="text" name="username" value="请输入您的姓名"  onMouseOver="this.focus()" onMouseOut="if(this.value=='')this.value='请输入您的姓名';" onFocus="this.select()" onClick="if(this.value=='请输入您的姓名')this.value=''">
					<input class="password" type="text" name="password" value="请输入您的密码"  onMouseOver="this.focus()" onMouseOut="if(this.value=='')this.value='请输入您的密码';" onFocus="this.select()" onClick="if(this.value=='请输入您的密码')this.value=''">
				<!--添加提交按钮-->
				<input type="image" name = "step2" src="../../static/images/next.png" class = "command_1"/>
				<!--添加结束-->
				</form>
		</div>

	</body>
</html>
