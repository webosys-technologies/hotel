
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>" target="_blank"><?php echo SITE_NAME; ?></a>.</strong> All rights
    reserved. <strong>Powered by <a href="http://codeaspire.in/" target="_blank">CodeAspire</a></strong>
</footer>
</div>
<!-- ./wrapper -->
<?php
if (isset($inclusions['js'])) {
    foreach ($inclusions['js'] as $script) {
        echo "<script type='text/javascript' src='" . base_url($script . '.js') . "'></script>\n";
    }
}
?>
<?php
if (isset($inclusions['page_script'])) {
    foreach ($inclusions['page_script'] as $script) {
        echo "<script type='text/javascript' src='" . base_url('assets/page_scripts/' . $script) . "'></script>\n";
    }
}
?>

<script type="text/javascript">
    $body = $("body");
    $(document).ready(function () {
        setTimeout(function () {
            $('.<?php echo TOGGLE_CLOSE_CLASS; ?>').slideToggle();
        }, 7000);

        $body.animate({
            top: -200
        }, 1500);

    });

    $(document).on({
        ajaxStart: function () {
            $body.addClass("loading");
        },
        ajaxStop: function () {
            $body.removeClass("loading");
        }
    });

    $(document).ready(function(){
        $('.Commissions').click(function(){
            $('#Commissions-modal').modal('show');
        });

        $('#post-commission').click(function(){
            var amount = $('#com_amount').val();
            $('#com_amount').closest('div').removeClass('has-error');
            if(amount == '') {
                $('#com_amount').closest('div').addClass('has-error');
            }else{
                if(parseFloat(amount) <= 0 ){
                 $('#com_amount').closest('div').addClass('has-error');
             }else{
                $.ajax({
                    url: "<?php echo base_url('admin/settings/commissions'); ?>",
                        data: {amount:amount},                        // Setting the data attribute of ajax with file_data
                        type: 'post',
                        dataType: 'JSON',
                        success:function(res){
                            if(res.error == 'true') {
                                $('#com-msg').html(res.message);
                            } else {
                                $('#com-msg').html(res.message);
                                window.setTimeout(function() {
                                    $('#com_amount').closest('div').removeClass('has-error');
                                    $('#Commissions-modal').modal('hide');
                                }, 1000);
                            }
                        }
                    });
            }
        }
    });
    });
</script>
</body>
</html>
