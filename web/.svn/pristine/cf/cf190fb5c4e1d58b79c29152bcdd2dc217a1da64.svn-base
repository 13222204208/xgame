<?php
namespace Home\Controller;
use Think\Controller;
class HoutaiController extends Controller {
	function _initialize() {
		//权限验证
		if (!session('admin_user')) {
		//	$this -> redirect('login/login');
		}

	}
	function ceshi(){
		$a = 1;
		$b = 1;
		$b = $b << 4;
		$c = $b | $a;
		dump($c);
		echo $c;
	}
	public function index() {
		$this -> display();
	}
	function user_list(){
		$user = M('account_guest','t_','D_ACCOUNT') -> select();
		foreach($user as $k=>$v){
			$data['f_account_id'] = $v['f_account_id'];
			
		}
		//dump($user);
		$this -> assign('con',$user);
		$this -> display();
		
	}
	function userlist(){
		$user = M('account_guest','t_','D_ACCOUNT') -> select();
		foreach($user as $k=>$v){
			$account_king = 1;
			$account_id = $v['f_account_id'];
			$account_id = $account_id << 4;
			$account_id = $account_id | $account_king;
			$data['f_role_id'] = $account_id;
			$con = M('player','t_','D_PLAYER') -> where($data) -> limit(1) -> select();
			$user[$k]['f_nick_name'] = $con[0]['f_nick_name'];
			$user[$k]['f_account_id'] = $account_id;
			$user[$k]['f_level'] = $con[0]['f_level'];
			$user[$k]['f_money'] = $con[0]['f_money'];
			$user[$k]['f_game_time'] = $con[0]['f_game_time'];
			$user[$k]['f_last_login_time'] = $con[0]['f_last_login_time'];
			$user[$k]['f_last_offline_time'] = $con[0]['f_last_offline_time'];
			$user[$k]['f_xima'] = $con[0]['f_xima'];
			$user[$k]['f_savemoney'] = $con[0]['f_savemoney'];
		}
		
		$data['code'] = 0;
		$data['count'] = count($user);
		$data['data'] = $user;
		$this -> ajaxReturn($data); 
	}

	function add_gonghuo() {
		if ($_POST) {
			$data = M('gonghuoshang') -> create();
			$data['add_time'] = time();

			M('gonghuoshang') -> add($data);
			$this -> redirect('houtai/gh_list');
		} else {
			$this -> display();
		}
	}

	function gh_list() {
		$con = M('gonghuoshang') -> select();
		$dianyuan = M('dianyuan') -> select();
		
		$this -> assign('dianyuan', $dianyuan);
		$this -> assign('con', $con);
		$this -> display();
	}

	function add_dianyuan() {
		if ($_POST) {
			$data = M('dianyuan') -> create();
			$data['add_time'] = time();

			M('dianyuan') -> add($data);
			$this -> redirect('houtai/dy_list');
		} else {
			$this -> display();
		}
	}

	function dy_list() {
		$con = M('dianyuan') -> select();
		$this -> assign('con', $con);
		$this -> display();
	}

	function order_list() {
		$time = I('time');
		$time_arr = explode(' - ', $time);
		if (!empty($time)) {
			$con = M('order') -> order('add_time desc') -> select();
			foreach ($con as $k => $v) {
				$time1 = date('Y-m-d', $v['add_time']);
				$qian = $time_arr[0];
				$hou = $time_arr[1];
				if ($qian == $hou) {
					if ($time1 !== $qian) {
						unset($con[$k]);
					}
				} else {
					if ($time1 < $qian || $time1 > $hou) {
						unset($con[$k]);
					}
				}
			}
			$this -> assign('time', $time);
		} else {
			$con = M('order') -> order('add_time desc') -> select();
		}

		$this -> assign('con', $con);
		$this -> display();
	}
	function youjian(){
		$fasong = date('Y-m-d H:i:s');
		$xiaohui = date('Y-m-d H:i:s',strtotime('+14 day'));
		$this -> assign('fasong', $fasong);
		$this -> assign('xiaohui', $xiaohui);
		$this -> display();
	}
	

	function order_list_down() {
		$time = I('time');
		$time_arr = explode(' - ', $time);
		if (!empty($time)) {
			$con = M('order') -> field('mingcheng,chicun,yanse,cj_huohao,zj_huohao,danjia,shoujia,num,user,add_time') -> order('add_time desc') -> select();
			foreach ($con as $k => $v) {
				$time1 = date('Y-m-d', $v['add_time']);
				$qian = $time_arr[0];
				$hou = $time_arr[1];
				if ($qian == $hou) {
					if ($time1 !== $qian) {
						unset($con[$k]);
					}
				} else {
					if ($time1 < $qian || $time1 > $hou) {
						unset($con[$k]);
					}
				}
			}
			$this -> assign('time', $time);
		} else {
			$con = M('order') -> field('mingcheng,chicun,yanse,cj_huohao,zj_huohao,danjia,shoujia,num,user,add_time') -> order('add_time desc') -> select();
		}
		foreach ($con as $k => $v) {
			$con[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
		}
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		$filename = "订单下载";
		$headArr = array("名称", "尺寸", "颜色", "厂家货号", "自己货号", "进价", "售价", "数量", "店员", "添加时间");
		$this -> getExcel($filename, $headArr, $con);
	}

	function getExcel($fileName, $headArr, $data) {

		//对数据进行检验
		if (empty($data) || !is_array($data)) {
			die("data must be a array");
		}
		//检查文件名
		if (empty($fileName)) {
			exit ;
		}
		$date = date("Y_m_d", time());
		$fileName .= "_{$date}.xls";
		//创建PHPExcel对象，注意，不能少了\
		$objPHPExcel = new \PHPExcel();
		$objProps = $objPHPExcel -> getProperties();

		//设置表头
		$key = ord("A");
		foreach ($headArr as $v) {
			$colum = chr($key);
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($colum . '1', $v);
			$key += 1;
		}
		$column = 2;
		$objActSheet = $objPHPExcel -> getActiveSheet();
		foreach ($data as $key => $rows) {//行写入
			$span = ord("A");

			foreach ($rows as $keyName => $value) {// 列写入
				$j = chr($span);
				$objActSheet -> setCellValue($j . $column, $value);
				$span++;
			}
			$column++;
		}
		$fileName = iconv("utf-8", "gb2312", $fileName);
		//重命名表
		// $objPHPExcel->getActiveSheet()->setTitle('test');
		//设置活动单指数到第一个表,所以Excel打开这是第一个表
		$objPHPExcel -> setActiveSheetIndex(0);
		ob_end_clean();
		ob_start();
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename=\"$fileName\"");
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter -> save('php://output');
		//文件通过浏览器下载
		exit ;

	}

	function kh_search() {
		if ($_POST) {
			$phone = I('phone');
			$data['phone'] = $phone;
			$con = M('order') -> where($data) -> select();
			$this -> assign('con', $con);
			$this -> assign('phone', $phone);
		}
		$this -> display();

	}

	function goods_list() {
		$con = M('goods') -> order('add_time desc') -> select();

		$this -> assign('con', $con);
		$this -> display();
	}

	function gh_edit() {
		if ($_POST) {
			$data = M('gonghuoshang') -> create();
			M('gonghuoshang') -> save($data);
			$this -> success('修改成功');

		} else {
			$id = I('id');
			$where['id'] = $id;
			$con = M('gonghuoshang') -> where($where) -> select();
			$this -> assign('con', $con);
			$this -> display();
		}

	}
	function ywjl(){
		$yue = I('yue');
		$yue = str_replace('-','',$yue);
		$yue = substr($yue,2);
		$biao = 'money_dot_'.$yue;
		$biao1 = 't_money_dot_'.$yue;
		//dump($biao1);
		$where['TABLE_SCHEMA'] = 'd_logs';
		$where['TABLE_NAME'] = $biao1;
		$count = M('','TABLES','D_A') -> where($where) -> count();
		if($count == '1'){
		    $con = M($biao,'t_','D_LOGS') -> select();
		    foreach($con as $k=>$v){
		    	$data['dot_id'] = $v['f_oper_dot'];
		    	$game = M('dot','t_','D_LOGS') -> where($data) -> select();
				$account_king = 1;
				$account_id = $v['f_role_id'];
				$account_id = $account_id >> 4;
				$account_id = $account_id | $account_king;
				
				
		    	$data1['f_account_id'] = $account_id;
		    	$zhanghao = M('account_guest','t_','D_ACCOUNT') -> where($data1) -> getField('f_username');
		    	$con[$k]['f_username'] = $zhanghao;
		    	$con[$k]['game_name'] = $game[0]['name'];
		    	if($game[0]['type'] == '总押'){
		    		$con[$k]['zongya'] = $v['f_oper_count'];
		    		$con[$k]['zongde'] = 0;
		    	}
		    	if($game[0]['type'] == '总得'){
		    		$con[$k]['zongde'] = $v['f_oper_count'];
		    		$con[$k]['zongya'] = 0;
		    	}
		    	$con[$k]['note'] = $game[0]['note'];
		    }
		}else{
		   // echo '表不存在';
		}
		//$con = M($biao,'t_','D_LOGS') -> select();
		/*
		$con = M('money_dot_191109','t_','D_LOGS') -> select();
		foreach($con as $k=>$v){
			$data['dot_id'] = $v['f_oper_dot'];
			$game = M('dot','t_','D_LOGS') -> where($data) -> select();
			$data1['f_account_id'] = $v['f_role_id'];
			$zhanghao = M('account_guest','t_','D_ACCOUNT') -> where($data1) -> getField('f_username');
			$con[$k]['f_username'] = $zhanghao;
			$con[$k]['game_name'] = $game[0]['name'];
			if($game[0]['type'] == '总押'){
				$con[$k]['zongya'] = $v['f_oper_count'];
				$con[$k]['zongde'] = 0;
			}
			if($game[0]['type'] == '总得'){
				$con[$k]['zongde'] = $v['f_oper_count'];
				$con[$k]['zongya'] = 0;
			}
			$con[$k]['note'] = $game[0]['note'];
		}
		*/
		$this -> assign('con', $con);
		$this -> display();
	}
	function del_gh() {
		$data['id'] = I('id');
		M('gonghuoshang') -> where($data) -> delete();

		echo '1';
	}

	function dy_edit() {
		if ($_POST) {
			$data = M('dianyuan') -> create();
			M('dianyuan') -> save($data);
			$this -> success('修改成功');

		} else {
			$id = I('id');
			$where['id'] = $id;
			$con = M('dianyuan') -> where($where) -> select();
			$this -> assign('con', $con);
			$this -> display();
		}

	}

	function del_dy() {
		$data['id'] = I('id');
		M('dianyuan') -> where($data) -> delete();

		echo '1';
	}

	function lishi() {
		$data['id'] = I('id');
		$gh = M('gonghuoshang') -> where($data) -> getField('mingcheng');

		$where['gonghuoshang'] = $gh;
		$con = M('goods') -> field('mingcheng,chicun,yanse,cj_huohao,zj_huohao,danjia,sum(num),gonghuoshang,add_time') -> where($where) -> group('zj_huohao') -> order('add_time desc') -> select();
		foreach ($con as $k => $v) {
			$map['zj_huohao'] = $v['zj_huohao'];
			$yishou = M('order') -> where($map) -> sum('num');
			$shengyu = $v['sum(num)'] - $yishou;
			$con[$k]['yishou'] = $yishou;
			$con[$k]['shengyu'] = $shengyu;
		}

		$this -> assign('con', $con);
		$this -> display();
	}

	function xiaoshou() {
		$data['id'] = I('id');
		$dy = M('dianyuan') -> where($data) -> getField('mingcheng');

		$where['user'] = $dy;
		$con = M('order') -> where($where) -> order('add_time desc') -> select();
		$this -> assign('con', $con);
		$this -> display();
	}

	function goods_edit() {
		if ($_POST) {
			$data = M('goods') -> create();
			$upload = new \Think\Upload();
			// 实例化上传类
			$upload -> maxSize = 33145728;
			// 设置附件上传大小
			$upload -> exts = array('jpg', 'jpeg', 'png');
			// 设置附件上传类型
			$upload -> rootPath = './Uploads/';
			// 设置附件上传根目录
			$upload -> savePath = 'img/';
			// 设置附件上传（子）目录
			// 上传文件
			$info = $upload -> upload();
			$info = $info["photo"];
			
			if (!$info) {// 上传错误提示错误信息
				//$this -> error($upload -> getError());
			}
			if ($info !== null) {
				$path1 = '/Uploads/' . $info['savepath'] . $info['savename'];
				$data['photo'] = $path1;
			} else {
				$where['id'] = $data['id'];
				$path = M('goods') -> where($where) -> limit(1) -> select();
				
				$path1 = $path[0]['photo'];
				$data['photo'] = $path1;
			}

			M('goods') -> save($data);

			$this -> success('修改成功','Houtai/goods_list');
			$this -> redirect('Houtai/goods_list');
		} else {
			$id = I('id');
			$where['id'] = $id;
			$con = M('goods') -> where($where) -> select();

			$gh = M('gonghuoshang') -> select();
			$this -> assign('gh', $gh);
			$this -> assign('con', $con);
			$this -> display();
		}

	}

	function goods_del() {
		$id = I('id');
		$where['id'] = $id;
		$con = M('goods') -> where($where) -> delete();
		echo '1';
	}

	function c_mima(){
		if($_POST){
			M('admin') -> save(M('admin') -> create());
			$this -> success('修改成功');
		} else {
			$id = 1;
			$where['id'] = $id;
			$con = M('admin') -> where($where) -> select();
			$this -> assign('con', $con);
			$this -> display();
		}
	}
	function logout() {
		session('admin_user', null);
		$this -> redirect('login/login');
	}

}
