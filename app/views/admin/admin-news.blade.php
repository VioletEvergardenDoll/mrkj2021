@extends('common.admin-layout')
@section('title','新闻管理')
@section('content')

            <!-- 用户上方区域，增删... -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">后台</strong> / <small>新闻管理</small>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" data-am-modal="{target: '#add-news'}"
                                    class="am-btn am-btn-default">
                                <span class="am-icon-plus"></span> 新增
                            </button>
                            <button type="button" class="am-btn am-btn-default" onclick="dellist1()">
                                <span class="am-icon-trash-o" ></span> 删除
                            </button>
                        </div>
                    </div>
                </div>


                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field" id="search1">
                        <span class="am-input-group-btn">
				<button class="am-btn am-btn-default"  type="button" onclick="search1()">搜索</button>
				</span>
                    </div>
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
                                <th class="table-type">标题</th>
                                <th class="table-type">内容</th>
                                <th class="table-author am-hide-sm-only">作者</th>
                                <th class="table-date am-hide-sm-only">修改日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($news as $v)
                                <tr>
                                    <td><input type="checkbox" name="newslist" value={{$v->id}}/></td>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->title}}</td>
                                    <td>{{$v->content}}</td>
                                    <td class="am-hide-sm-only">{{$v->publisher}}</td>
                                    <td class="am-hide-sm-only">{{$v->updated_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <input type="hidden" value={{$v->publisher}} />
                                                <input type="hidden" value={{$v->content}} />
                                                <input type="hidden" value={{$v->id}} />
                                                <input type="hidden" value={{$v->title}} />
                                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="edit1(this)"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" type="button" onclick="deleteone1(this)"><span class="am-icon-trash-o"></span> 删除</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$news->links()}}
                        <hr />
                        <p>注：.....</p>
                    </form>
                </div>
            <!-- 用户区域结束 -->
        <!-- content end   -->
@endsection

@section('operation')
        <!--新增新闻框-->
        <div class="am-popup" id="add-news">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">新增新闻</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>

                <div class="am-popup-bd">
                    <form action="" class="am-form" id="fm-add-news">
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">标题</label>
                            <input type="text" id="newstitle" minlength="3" placeholder="请输入新闻标题（至少 3 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">内容</label>
                            <input type="text" id="newscontent" minlength="6" placeholder="请输入新闻内容（至少 6 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">出版者</label>
                            <input type="text" id="newspublisher" minlength="1" placeholder="请输入发布者名称（至少1个字符）" required />
                        </div>
                        <button type="button" onclick="register1()" class="am-btn am-btn-secondary" >提交</button>
                        <button class="am-btn am-btn-secondary" type="button" onclick="$('#add-news').modal('close')">关闭</button>
                    </form>
                </div>
            </div>
        </div>

        <!--编辑新闻   data-validation-message="" 自定义提示-->
        <div class="am-popup" id="edit-news">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">编辑用户</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>

                <div class="am-popup-bd">
                    <form action="" class="am-form" id="fm-edit-news">
                        <div class="am-form-group">
                            <input type="hidden" name="" id="edits-id" value="" />
                            <label for="doc-vld-name-2-1">标题</label>
                            <input type="text" id="edittitle" minlength="3" placeholder="请输入新闻标题（至少 3 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">内容</label>
                            <input type="text" id="editcontent" minlength="6" placeholder="请输入新闻内容（至少 6 个字符）" required />
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2-1">出版者</label>
                            <input type="text" id="editpublisher" minlength="1" placeholder="请输入发布者名称（至少1个字符）" required />
                        </div>

                        <button class="am-btn am-btn-secondary" type="button" onclick="editnews()">提交</button>
                        <button class="am-btn am-btn-secondary" type="button" onclick="$('#edit-news').modal('close')">关闭</button>
                    </form>
                </div>
            </div>
        </div>

        <!--删除新闻框       <span></span>行标签-->
        <div class="am-modal am-modal-confirm" tabindex="-1" id="delete-news">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">删除新闻</div>
                <div class="am-modal-bd">你，确定要删除<span id="confirm-title"></span> 这条记录吗？
                    <input type="hidden" id="delete1-id" />
                </div>
                <div class="am-modal-footer">
                    <span class="am-modal-btn" data-am-modal-cancel>取消</span> <span
                            class="am-modal-btn" data-am-modal-confirm onclick="deletenews()">确定</span>
                </div>
            </div>
        </div>
@endsection