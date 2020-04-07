<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	function _initialize(){
	  //权限验证
	 // if(!session('admin_user')){
    	//	$this -> redirect('login/login');
    //	}
	  
	}
    public function index(){
   
	
       $this -> display();
    }
	public function console(){
	
		$this -> display();
	}
}