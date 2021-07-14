@extends('common.admin-layout')
@section('title','用户管理')
@section('content')
        <!-- content start -->
            <!-- 用户上方区域，增删... -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">后台</strong> / <small>用户管理</small>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" data-am-modal="{target: '#add-user'}"
                                    class="am-btn am-btn-default">
                                <span class="am-icon-plus"></span> 新增
                            </button>
                            <button type="button" class="am-btn am-btn-default">
                                <span class="am-icon-trash-o"></span> 删除
                            </button>
                        </div>
                    </div>
                </div>

                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-form-group"><!-- 跳转到选中的option被选中的下标的value值 -->
                        <select data-am-selected="{btnSize: 'sm'}" onchange="location.href=this.options[this.selectedIndex].value" >
                            <option value=" ">所有类别</option>
                            <option value="/adm/user">所有用户</option>
                            <option value="/adm/user/admin">管理员</option>
                            <option value="/adm/user/normal">普通用户</option>
                        </select>
                    </div>
                </div>

                <div class="am-u-sm-12 am-u-md-3">
                    <form method="post" action="/adm/user/search">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" class="am-form-field" name="search">
                            <span class="am-input-group-btn"><button class="am-btn am-btn-default" type="submit">搜索</button></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 用户上方区域，增删...结束 -->

            <!-- 用户区域 -->
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" /></th>
                                <th class="table-id">ID</th>
                                <th class="table-type">类别</th>
                                <th class="table-author am-hide-sm-only">用户名</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $v)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>{{$v->id}}</td>
                                <td>{{($v->type==1)?"管理员":"普通用户"}}</td>
                                <td class="am-hide-sm-only">{{$v->username}}</td>
                                <td class="am-hide-sm-only">{{$v->updated_at}}</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <input type="hidden" value="{{$v->id}}" />
                                            <input type="hidden" value="{{$v->username}}" />
                                            <!--用户名隐藏  动态隐藏user.getid（）-->
                                            <button type="button" onclick="edit(this)"
                                                    class="am-btn am-btn-default am-btn-xs am-text-secondary">
                                                <span class="am-icon-pencil-square-o"></span> 修改密码
                                            </button>
                                            <button type="button" onclick="deleteone(this)"
                                                    class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                <span class="am-icon-trash-o"></span> 删除
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$users->links()}}
                    </form>
                </div>
            </div>
            <!-- 用户区域结束 -->
@endsection


@section('operation')
        <!--新增用户框-->
        <div class="am-popup" id="add-user">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">新增用户</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>

                <div class="am-popup-bd">
                    <form action="" class="am-form" id="fm-add-user">
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">用户名：</label>
                            <input type="text" id="username" minlength="1" placeholder="输入用户名（至少 1 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">密码：</label>
                            <input type="password" id="password1" minlength="6" placeholder="输入密码（至少 6 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">确认密码：</label>
                            <input type="password" id="password2" minlength="6" placeholder="确认确认密码（至少 6 个字符）"
                                   required />
                        </div>
                        <div class="am-form-group">
                            <label>用户类别： </label> <label class="am-radio-inline">
                                <input type="radio" value="0" name="type" required> 普通用户
                            </label> <label class="am-radio-inline">
                                <input type="radio" name="type" value="1"> 管理员
                            </label>
                        </div>

                        <button type="button" onclick="register()" class="am-btn am-btn-secondary" >提交</button>
                        <button class="am-btn am-btn-secondary" type="button"
                                onclick="$('#add-user').modal('close')">关闭</button>
                    </form>
                </div>
            </div>
        </div>

        <!--编辑用户框   data-validation-message="" 自定义提示-->
        <div class="am-popup" id="edit-user">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">编辑用户</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>

                <div class="am-popup-bd">
                    <form action="" class="am-form" id="fm-edit-user">
                        <div class="am-form-group">
                            <input type="hidden" name="id" id="edit-id" value="" />
                            <!--获取当前id，来获取数据-->
                            <label for="doc-vld-name-2-1">用户名：</label>
                            <input readonly="readonly" type="text" id="editusername" minlength="1" placeholder="输入用户名（至少 1 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">密码：</label>
                            <input type="password" id="editpassword1" minlength="6" data-validation-message="密码至少为6位" placeholder="输入密码（至少 6 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">确认密码：</label>
                            <input type="password" id="editpassword2" minlength="6" data-validation-message="密码至少为6位" placeholder="确认确认密码（至少 6 个字符）" required />
                        </div>

                        <button class="am-btn am-btn-secondary" type="button" onclick="edituser()">提交</button>
                        <button class="am-btn am-btn-secondary" type="button" onclick="$('#edit-user').modal('close')">关闭</button>
                    </form>
                </div>
            </div>
        </div>

        <!--删除用户框       <span></span>行标签-->
        <div class="am-modal am-modal-confirm" tabindex="-1" id="delete-user">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">删除用户</div>
                <div class="am-modal-bd">你，确定要删除<span id="confirm-username"></span> 这条记录吗？
                    <input type="hidden" id="delete-id" />
                    <input type="hidden" id="myname" value={{Auth::user()->username}}/>
                </div>
                <div class="am-modal-footer">
                    <span class="am-modal-btn" data-am-modal-cancel>取消</span> <span
                            class="am-modal-btn" data-am-modal-confirm onclick="deleteuser()">确定</span>
                </div>
            </div>
        </div>
@endsection