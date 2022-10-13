<?php
/**
Plugin Name: Thời Tiết
Plugin URI: https://laptrinhtudau.com
Description: Plugin dùng để lấy ra thông tin dự báo thời tiết toàn cầu cho các website sử dụng wordpress
Author: Chu Minh Nam
Version: 1.0
Author URI: https://laptrinhtudau.com
*/

if ( !function_exists('add_action') ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

//Khai báo các hằng số cho plugin
define('THOITIET_VERSION', '1.0' );
define('THOITIET_MINIMUM_WP_VERSION', '5.0' );
define('THOITIET_PLUGIN_URL', plugin_dir_url(__FILE__));
define('THOITIET_PLUGIN_DIR', plugin_dir_path (__FILE__));
define('APPID', '8a2211b25a92ea4867bf4278e5ce980f');
define('BASE_URL', get_bloginfo('url'));
define('THANH_PHO', 'Hanoi');
define('NHIET_DO', 'c');

//Nhập các file cần thiết trong thư mục includes
require_once(THOITIET_PLUGIN_DIR. 'includes/class.setting-thoi-tiet.php');
require_once(THOITIET_PLUGIN_DIR. 'includes/class.api-thoi-tiet.php');
require_once(THOITIET_PLUGIN_DIR. 'includes/class.widget-thoi-tiet.php');
require_once(THOITIET_PLUGIN_DIR. 'includes/action_form_setting.php');

//Khởi tạo các lớp Widget và Setting của plugin
$thoi_tiet_widget = new ThoiTietWidget();
$thoi_tiet_setting = new ThoiTietSetting();

//Khi plugin được cài đặt sẽ thực hiện set giá trị mặc định vào bảng wp_options
register_activation_hook( __FILE__, function(){
    add_option('thanh_pho',THANH_PHO,'','yes'); //chèn dữ liệu vào wb_options
    add_option('nhiet_do',NHIET_DO,'','yes');
    add_option('thoi_tiet', "Thời Tiết");
});


