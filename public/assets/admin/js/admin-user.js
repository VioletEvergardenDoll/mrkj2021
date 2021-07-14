//val是表单控件才有的方法，html是其他的方法
$(function() {// 新增用户验证信息
	$("#fm-add-user").validator(
			{
				onValid : function(validity) {
					$(validity.field).closest('.am-form-group').find(
							'.am-alert').hide();
				},

				onInValid : function(validity) {
					var $field = $(validity.field);
					var $group = $field.closest('.am-form-group');
					var $alert = $group.find('.am-alert');
					// 使用自定义的提示信息 或 插件内置的提示信息
					var msg = $field.data('validationMessage')
							|| this.getValidationMessage(validity);

					if (!$alert.length) {
						$alert = $(
								'<div class="am-alert am-alert-danger"></div>')
								.hide().appendTo($group);
					}

					$alert.html(msg).show();
				}
			});

	$("#fm-edit-user").validator(
			{// 编辑（修改密码）用户验证信息
				onValid : function(validity) {
					$(validity.field).closest('.am-form-group').find(
							'.am-alert').hide();
				},

				onInValid : function(validity) {
					var $field = $(validity.field);
					var $group = $field.closest('.am-form-group');
					var $alert = $group.find('.am-alert');
					// 使用自定义的提示信息 或 插件内置的提示信息
					var msg = $field.data('validationMessage')
							|| this.getValidationMessage(validity);

					if (!$alert.length) {
						$alert = $(
								'<div class="am-alert am-alert-danger"></div>')
								.hide().appendTo($group);
					}

					$alert.html(msg).show();
				}
			});
});

function edit(obj) {// 编辑用户，获取当前用户名和id,显示当前用户名，id放到隐藏域中,隐藏域传值用
	// readonly="readonly"只读
	var username = $(obj).prev().val(); // 获取当前用户的用户名 prev()找到前一个隐藏域（用户名隐藏域）
	var id = $(obj).prev().prev().val();// 获取当前用户的id
	// prev()。prev()找到前一个隐藏域的前一个隐藏域（id隐藏域）
	$("#edit-user").find("#editusername").val(username);// 从编辑层中找id是username的孩子,再将它的值传给username
	$("#edit-user").find("#edit-id").val(id);
	$("#edit-user").modal();// 显示popup框
}

function deleteone(obj) {// 删除用户
	var username = $(obj).prev().prev().val();// 获取元素值，要删除的，当前记录的用户名
	var id = $(obj).prev().prev().prev().val();// 表单控件才有val()方法
	var myname=$("#myname").val();//登录的用户名
	$("#confirm-username").html(username);
	$("#delete-user").find("#delete-id").val(id);
	if(username==myname){
		//
		alert("不能删除当前登录用户");
		return;
	}
	$("#delete-user").modal(
		{
			relatedTarget : obj,
			onConfirm : function() {
				var $link = $(this.relatedTarget).prev("button");
				var msg = $link.length ? "您要删除的ID是" + $("#delete-id").val()
					: "您没有选中删除项";
				alert(msg);
				$.ajax({
					data:{"id":id},
					dataType:"json",
					type:"post",
					url:"/adm/user/delete-user",
					success: function(data) {
						if (data.status == 1) {
							alert("删除成功！");
							location.href = "/adm/user";
						} else if (data.status == 2) {
							alert("删除失败！");
						}
					}
				});
			},
			onCancel : function() {
				alert("算逑，不删了");
			}
		});
}

function register() {
	var name = $("#username").val();
	if (name == "") {
		alert("用户名不能为空！");
		$("#username").focus();// 光标位置
		return;
	}
	var pwd = $("#password1").val();
	if (pwd == "") {
		alert("密码不能为空！");
		$("#password1").focus();
		return;
	}
	var pwd1 = $("#password2").val();
	if (pwd1 == "") {
		alert("确认密码不能为空！");
		$("#password2").focus();
		return;
	}
	if (pwd != pwd1) {
		alert("两次输入的密码不一致,请重新输入！");
		$("#password1").focus();
		return;
	}
	var type = 2;
	var types = document.getElementsByName("type");// 加s得到数组
	for (var i = 0; i < types.length; i++) {
		if (types[i].checked) {// 被选中了，把值给type，type为选中按钮的值
			type = types[i].value;
			break;
		}
	}

	if (type != "0" && type != "1") {
		alert("请选择用户类别！");
		return;
	}
	$.ajax({
		data : {
			"name" : name,
			"pwd" : pwd,
			"type" : type
		},
		dataType : "json",
		type : "post",
		url : "/adm/user/add-user",
		success : function(data) {
			if (!data.status) {
				alert("用户名已存在！");
			} else if (data.status) {
				alert("添加成功！");
				$("#add-user").modal("close");
				location.href = "/adm/user";
			}else {
				alert("未知错误！");
			}
		}
	});
}

function edituser() {
	var id = $("#edit-id").val();// 获取修改密码的id
	var name = $("#editusername").val();
	var pwd = $("#editpassword1").val();
	if (pwd == "") {
		alert("密码不能为空！");
		$("#editpassword1").focus();
		return;
	}
	var pwd1 = $("#editpassword2").val();
	if (pwd1 == "") {
		alert("确认密码不能为空！");
		$("#editpassword2").focus();
		return;
	}
	if (pwd != pwd1) {
		alert("两次输入的密码不一致,请重新输入！");
		$("#editpassword1").focus();
		return;
	}
	$.ajax({
		data : {
			"id" : id,
			"pwd" : pwd
		},
		dataType : "json",
		type : "post",
		url : "/adm/user/edit-user",
		success : function(data) {
			if (data.status == 1) {
				alert("修改成功！");
				location.href = "/adm/user";
			} else if (data.status == 2) {
				alert("修改失败！");
			} else {
				alert("未知错误！");
			}
		}
	});
}
