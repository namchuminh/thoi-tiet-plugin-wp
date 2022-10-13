<?php 
if ( !function_exists('add_action') ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class ThoiTietWidget extends WP_Widget{
	public function __construct(){
		parent::__construct(
			'thoi-tiet-widget', // Base ID
			esc_html__( 'Thời Tiết', 'thoi_tiet' ), // Name
			array( 'description' => esc_html__( 'Widget lấy thông tin thời tiết', 'thoi_tiet' ), ) // Args
		);
		add_action('widgets_init', function(){
			register_widget('ThoiTietWidget');
		});
	}

	public function form ($instance) {
		$title = (isset($instance['title'])  && !empty($instance['title'])) ? apply_filters('widget_title', $instance['title']) : __('Thời Tiết', 'thoi_tiet');
		require(THOITIET_PLUGIN_DIR. 'view/form_widget-thoi-tiet.php');
	}

	public function update($new_instance, $old_instance){
		$instance = [];
		$instance['title'] = (isset($new_instance['title'])  && !empty($new_instance['title'])) ? apply_filters('widget_title', $new_instance['title']) : __('Thời Tiết', 'thoi_tiet');
		update_option('thoi_tiet', $new_instance['title']);//cập nhật title mới hiển thị ngoài website
		return $instance;
	}

	public function widget($args, $instance) {
		require(THOITIET_PLUGIN_DIR. 'view/view_widget-thoi-tiet.php');
  	}
}

