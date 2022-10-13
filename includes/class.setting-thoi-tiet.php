<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class ThoiTietSetting {

	public function __construct() {
		//Add Menu
		add_action('admin_menu', function() {
			add_submenu_page(
				'options-general.php', //địa chỉ trang gốc
				'Cài Đặt Thời Tiết',
				'Thời Tiết',
				'manage_options', //quyền 
				'thoi_tiet',
				[$this, 'create_page'] //chỉ định phương thức callback
			);
		});
	}

	public function create_page() {
		require(THOITIET_PLUGIN_DIR . 'view/view_setting-thoi-tiet.php');
	}

}

