<?php


class NewsController extends BaseController
{
    /*
     * csrf过滤器
     */
    public function __construct()
    {
        $this->beforeFilter('auth',array('except'=>array('login','Dologin')));
    }

    /**
     * @return mixed后台首页
     */

    public function getIndex()
    {
        $news=News::paginate(3);
        return View::make("admin.admin-news")->with("news",$news);
    }

    public function postAddNews(){
        $title=$_POST["title"];
        $publisher=$_POST["publisher"];
        $content=$_POST["content"];
        $a=DB::table('news')->where('title',$title)->get();
        $news=new News();
        $news->title=$title;
        $news->publisher=$publisher;
        $news->content=$content;
        if($a) {
            $data = array("status" => false);//用户已存在
        }else {
            $news->save();
            $data = array("status"=>true);//将User成功添加到数据库
        }
        return json_encode($data);
    }

    public function postEditNews(){
        $id=$_POST["id"];
        $title=$_POST["title"];
        $publisher=$_POST["publisher"];
        $content=$_POST["content"];
        $news=News::find($id);
        $news->title=$title;
        $news->publisher=$publisher;
        $news->content=$content;
        $news->save();
        $data = array("status"=>true);
        return json_encode($data);
    }

    public function postDeleteNews()
    {
        $id=$_POST["id"];
        $news=News::find($id);
        $news->delete();
        $data = array("status"=>true);
        return json_encode($data);
    }
}