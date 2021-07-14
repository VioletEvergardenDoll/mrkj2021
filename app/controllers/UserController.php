<?php


class UserController extends BaseController
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
    public function adminIndex()
    {
        return View::make('admin.admin-index');
    }

    public function getIndex()
    {
        $users = User::paginate(5);
        return View::make('admin.admin-user')->with('users',$users);
    }

    /**
     * 添加用户
     */

    public function postAddUser(){
        $username=$_POST["name"];
        $password=$_POST["pwd"];
        $type=$_POST["type"];
        $a=DB::table('users')->where('username',$username)->get();
        $user=new User();
        $user->username=$username;
        $user->password=Hash::make($password);
        $user->type=$type;
        if($a){
            $data = array("status" => false);//用户已存在
        }else {
            $user->save();
            $data = array("status" => true);//将User成功添加到数据库
        }
        return json_encode($data);
    }

    public function postEditUser(){
        $id=$_POST["id"];
        $password=$_POST["pwd"];
        $user=User::find($id);
        $user->password=Hash::make($password);
        $user->save();
        $data = array("status"=>true);
        return json_encode($data);
    }

    public function postDeleteUser()
    {
        $id=$_POST["id"];
        $user=User::find($id);
        $user->delete();
        $data = array("status"=>true);
        return json_encode($data);
    }

    public function Login(){
        return View::make("admin.login");
    }

    public function DoLogin(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $a=DB::table('users')->where('username',$username)->first();
        if($a->type==1)
        {
            if(Auth::attempt(array('username'=>$username,'password'=>$password))) {
                $data = array("status" => 1);
            }else{
                $data = array("status"=>3);
            }
        }elseif ($a->type==0){
            $data = array("status"=>2);
        }else{
            $data = array("status"=>4);
        }
        return json_encode($data);
    }

    public function Logout(){
        Auth::logout();
        return Redirect::to('/login');
    }

    public function getAdmin(){
        $users=User::where("type",1)->paginate(5);;
        return View::make("admin.admin-user")->with("users",$users);
    }

    public function getNormal(){
        $users=User::where("type",0)->paginate(5);
        return View::make("admin.admin-user")->with("users",$users);
    }

    public function postSearch()
    {
        $search=Input::get('search');
        $users=User::where('username','like','%'.$search.'%')->paginate(5);
        if($users->count()>0)
        {
            return View::make('admin.admin-user')->with('users',$users);
        }else{
            return Redirect::to('/adm/user');
        }
    }
}