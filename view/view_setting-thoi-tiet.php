<div class="wrap tp-app">
    <h2>Cài đặt thông tin thời tiết</h2>
    <form name="post" action="<?php echo plugins_url('thoi-tiet/includes/action_form_setting.php'); ?>" method="post" id="post" >
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="city">Tên Thành Phố: <br>(viết không dấu)</label></th>
                    <td>
                        <input type="text" id="city" placeholder="Nhập tên thành phố" class="regular-text" name="city" value="<?php echo get_option('thanh_pho');?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nhiệt độ: </th>

                    <td id="search-selected">
                        <select name="temp" id="temp">
                            <?php if(get_option('nhiet_do') == "c"){ ?>
                                <option value="c" selected>&deg;C</option>
                                <option value="f">&deg;F</option>
                            <?php }else{ ?>
                                <option value="c" >&deg;C</option>
                                <option value="f" selected>&deg;F</option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="alignleft">
            <button class="button button-primary button-large" id="btnSave" type="submit">Save Changes</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    const URL = window.location.href.split('wp-admin')[0]
    $(document).ready(function() {
        $("#btnSave").click(function(e){
            e.preventDefault()
            var temp = $('#temp').find(":selected").val()
            var city = $('#city').val()
            $.post(URL + 'wp-content/plugins/thoi-tiet/includes/action_form_setting.php', {temp: temp, city: city}, function(result){
                alert(result)
            });
        })
    });
</script>
