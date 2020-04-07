<?php
namespace Home\Controller;
use Think\Controller;
class GameController extends Controller {
	function _initialize(){
	  //权限验证
	  if(!session('admin_user')){
    	//	$this -> redirect('login/login');
    	}
	  
	}
    public function index(){

       $this -> display();
    }
	public function pdk(){
		$type = "RunFast";


		// $tables  =M('goldenbeans_table','t_','D_CONFIG') ->where(array('f_game_name'=>$type))->select(); 
		
		// $this -> assign('tables',$tables);
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}
	public function qznn(){
		$type = "QZ_NN";
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}
	public function brnn(){
		$type = "BR_NN";
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}

	public function sbao(){
		$type = "ShaiZi";
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}
	//太上老君
	public function xiyou(){
		$type = "TWL";
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}
	//轮盘
	public function binguo(){
		$type = "LunPan";
		$item = M('game_controler','t_','D_CONFIG') ->where(array('f_room_type'=>$type)) -> find();
		$this -> assign('item',$item);
		$this -> assign('f_room_type',$type);
		$this -> display();
	}
	function add_qujian(){
		$jindou_shao_str = I('jindou_shao_str');
		$jindou_duo_str = I('jindou_duo_str');
		$fanli_str = I('fanli_str');
		$jindou_shao_str = rtrim($jindou_shao_str,',');
		$jindou_duo_str = rtrim($jindou_duo_str,',');
		$fanli_str = rtrim($fanli_str,',');
		$jindou_shao_arr = explode(',',$jindou_shao_str);
		$jindou_duo_arr = explode(',',$jindou_duo_str);
		$fanli_arr = explode(',',$fanli_str);
		$type = I('type');
		foreach($jindou_shao_arr as $k=>$v){
			$data['f_min_level'] = $v;
			$data['f_max_level'] = $jindou_duo_arr[$k];
			$data['f_proportion'] = $fanli_arr[$k];
			$data['f_game_name'] = $type;
			$data1[] = $data;
		}
		M('goldenbeans_table','t_','D_CONFIG') -> addAll($data1);
		echo '1';
		
	}
	function xiugai(){
		$int1 = I('int1',0);
		$int2 = I('int2',0);
		$int3 = I('int3',0);
		$int4 = I('int4',0);
		$int5 = I('int5',0);
		$int6 = I('int6',0);
		$int7 = I('int7',0);
		$int8 = I('int8',0);
		$int9 = I('int9',0);
		$int10 = I('int10',0);
		$type = I('type');


		$where['f_room_type'] = $type;
		$data['f_int1'] = $int1;
		$data['f_int2'] = $int2;
		$data['f_int3'] = $int3;
		$data['f_int4'] = $int4;
		$data['f_int5'] = $int5;
		$data['f_int6'] = $int6;
		$data['f_int7'] = $int7;
		$data['f_int8'] = $int8;
		$data['f_int9'] = $int9;
		$data['f_int10'] = $int10;
		M('game_controler','t_','D_CONFIG') ->where($where) -> save($data);
		echo '1';
	}



}