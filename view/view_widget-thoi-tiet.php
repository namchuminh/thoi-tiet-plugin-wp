<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $thanh_pho = get_option('thanh_pho');
    $nhiet_do = get_option('nhiet_do');
?>
<aside class="widget widget_block">
    <div class="is-layout-flow wp-block-group"><div class="wp-block-group__inner-container">
    <h2>Thời Tiết</h2>
    <div>
        <span>Bây giờ, <?php echo date('H:i:s d/m/Y '); ?></span>
        <div style="margin-top: 10px;">
            <span><?php echo ThoiTietAPI::getWeather($thanh_pho, $nhiet_do)["name"]; ?></span>
            <div>
               <img src="https://codefrog.tech/cp/wp/ts.png" alt="" width="60">
               <?php echo ThoiTietAPI::getWeather($thanh_pho, $nhiet_do)["main"]["temp"]; ?> 
               <?php if($nhiet_do == 'c'){ ?>
                    &deg;C
               <?php }else{ ?>
                    &deg;F
               <?php } ?>
               <img src='http://openweathermap.org/img/wn/<?php echo ThoiTietAPI::getWeather($thanh_pho, $nhiet_do)["weather"][0]["icon"]; ?>@2x.png' alt="">
            </div>
        </div>
    </div>
</aside>








