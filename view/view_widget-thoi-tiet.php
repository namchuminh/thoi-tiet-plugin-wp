<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $thanh_pho = get_option('thanh_pho');
    $nhiet_do = get_option('nhiet_do');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<aside id="<?php echo $args['widget_id']; ?>" >
    <h2 class="widgettitle"><?php echo get_option('thoi_tiet'); ?></h2>
    <div style="margin-bottom: 25px; background-color: #fcfdfd;border-radius: 9px;padding: 10px;padding-right: 10px;box-shadow: 0px 10px 10px -20px #080c21;">
        <span style="font-weight: bold; font-size: 14px; color: rgba(0,0,0,0.5);">Bây giờ, <?php echo date('H:i:s d/m/Y '); ?></span>
        <div style="margin-top: 10px;">
            <span style="font-size: 21px;font-weight: bold;text-transform: uppercase;margin-bottom: 10px;color: rgba(0,0,0,0.7);"><?php echo ThoiTietAPI::getWeather($thanh_pho, $nhiet_do)["name"]; ?></span>
            <div style="font-size: 20px;color: rgba(0,0,0,0.9);font-weight: 100;">
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








