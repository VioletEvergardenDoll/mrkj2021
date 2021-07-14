//val是表单控件才有的方法，html是其他的方法
$(function() {// 新增用户验证信息
	$("#fm-add-news").validator(
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

	$("#fm-edit-news").validator(
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




//news
function register1() {
	var title = $("#newstitle").val();
	if (title == "") {
		alert("标题不能为空！");
		$("#newstitle").focus();// 光标位置
		return;
	}
	var con = $("#newscontent").val();
	if (con == "") {
		alert("内容不能为空！");
		$("#newscontent").focus();
		return;
	}
	
	var pub = $("#newspublisher").val();
	if (pub == "") {
		alert("出版者不能为空！");
		$("#newspublisher").focus();
		return;
	}
	
	$.ajax({
		data : {
			"title" : title,
			"content" : con,
			"publisher" : pub
		},
		dataType : "json",
		type : "post",
		url : "/adm/news/add-news",
		success : function(data) {
			if (!data.status ) {
				alert("标题已存在！");
			} else if (data.status) {
				alert("添加成功！");
				$("#add-news").modal("close");
				location.href = "/adm/news";
			}  else {
				alert("未知错误！");
			}
		}
	});
}

function editnews() {
	var id = $("#edits-id").val();// 获取修改密码的id
	var title = $("#edittitle").val();
	if (title == "") {
		alert("标题不能为空！");
		$("#edittitle").focus();
		return;
	}
	var con = $("#editcontent").val();
	if (con == "") {
		alert("内容不能为空！");
		$("#editcontent").focus();
		return;
	}
	var pub = $("#editpublisher").val();
	if (pub == "") {
		alert("出版者不能为空！");
		$("#editpublisher").focus();
		return;
	}
	$.ajax({
		data : {
			"id" : id,
			"title" : title,
			"content":con,
			"publisher":pub
		},
		dataType : "json",
		type : "post",
		url : "/adm/news/edit-news",
		success : function(data) {
			if (!data.status) {
				alert("修改成功！");
				location.href = "/adm/news";
			} else {
				alert("未知错误！");
			}
		}
	});

}

function edit1(obj) {// 编辑用户，获取当前用户名和id,显示当前用户名，id放到隐藏域中,隐藏域传值用
	// readonly="readonly"只读
	var title =$(obj).prev().val();
	var id = $(obj).prev().prev().val();// 获取当前用户的id
	var con = $(obj).prev().prev().prev().val();
	var pub = $(obj).prev().prev().prev().prev().val();
	// prev()。prev()找到前一个隐藏域的前一个隐藏域（id隐藏域）
	$("#edit-news").find("#edittitle").val(title);// 从编辑层中找id是username的孩子,再将它的值传给username
	$("#edit-news").find("#edits-id").val(id);
	$("#edit-news").find("#editcontent").val(con);
	$("#edit-news").find("#editpublisher").val(pub);
	$("#edit-news").modal();// 显示popup框
}

function deleteone1(obj) {// 删除用户
	var title = $(obj).prev().prev().val();// 获取元素值，要删除的，当前记录的用户名
	var id = $(obj).prev().prev().prev().val();// 表单控件才有val()方法
	$("#confirm-title").html(title);
	$("#delete-news").find("#delete1-id").val(id);
	$("#delete-news").modal(
			{
				relatedTarget : obj,
				onConfirm : function() {
					var $link = $(this.relatedTarget).prev("button");
					var msg = $link.length ? "您要删除的ID是" + $("#delete1-id").val()
							: "您没有选中删除项";
					alert(msg);
					$.ajax({
						data:{"id":id},
						dataType:"json",
						type:"post",
						url:"/adm/news/delete-news",
						success: function(data) {
							if (data.status) {
								alert("删除成功！");
								location.href = "/adm/news";
							} else {
								alert("未知错误！");
							} 
						}
					});
				},
				onCancel : function() {
					alert("算逑，不删了");
				}
			});
}

function search1() {
	var content = $("#search1").val();
	alert(content);
	location.href="searchnews?content="+content;
}