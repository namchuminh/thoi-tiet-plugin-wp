<?php 
require($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');//nhập file wp-load.php để sử dụng hàm update_option()

if(isset($_POST['city'])){
	if(empty($_POST['city'])){
		$_POST['city'] = "Hanoi";
	}
    update_option('thanh_pho',$_POST['city'],'','yes'); //cập nhật thông tin thành phố vào bảng wp_options
    update_option('nhiet_do',$_POST['temp'],'','yes');
    echo "Cập Nhật Thành Công!";
}
