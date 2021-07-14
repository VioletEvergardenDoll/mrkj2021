function login() {// 前台判断用户名密码是否正确
	var username=document.getElementById('username');// 获取用户名
	var password=document.getElementById('password');
	$.ajax({
		data : {
			"username" : username.value,
			"password" : password.value
		},
		dataType : "json",// 从服务器返回的数据类型
		type : "post",// 提交请求
		url : "/login",// 提交请求到的地址
		header: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success : function(data) {
			if (data.status == 1) {
				alert("欢迎登陆，即将跳转到后台首页！");
				location.href = "/adm";
			} else if (data.status == 2) {
				alert("普通用户，欢迎您登陆，无权访问后台");
			} else if (data.status == 3) {
				alert("您输入的密码错误！");
			} else if (data.status == 4) {
				alert("您输入的用户名不存在哦！");
			} else {
				alert("未知错误！");
			}
		},// 请求成功,调用回调函数
	});
}
