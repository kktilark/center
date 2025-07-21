<?php
/**
 * 기본레이아웃
 *
 * @copyright ⓒ 2016, NHN godo: Corp.
 * @link http://www.godo.co.kr
 * @author Shin Donggyu <artherot@godo.co.kr>
 */

include UserFilePath::adminSkin('head.php');
?>
<body class="<?php echo $adminBodyClass; ?> layout-basic">

<div id="container-wrap" class="container-fluid">
    <div id="container" class="row">
        <div id="header" class="col-xs-12">
            <?php include($layoutHeader); ?>
            <div id="panel_popupPanel"></div>
            <div id="panel_kakaoAlrim_modal"></div>
        </div>

        <div id="content-wrap">
            <div id="menu">
                <?php include($layoutMenu); ?>
            </div>
            <div id="content" class="row">
                <div class="col-xs-12">
                    <?php include($layoutContent); ?>

                    <?php include($layoutHelp); ?>
                </div>
            </div>
        </div>
        <div id="footer" class="col-xs-12">
            <?php include($layoutFooter); ?>
        </div>
    </div>
</div>
<!--<div id="gnbTopAnchor">
    <a href="#top"><img src="<?=PATH_ADMIN_GD_SHARE?>img/btn_gnb_top.png"></a>
</div>-->
<div class="gnbAnchor_wrap">
    <?php if(gd_is_provider() == false) { ?>
    <span class="btn_goseller js-popover" data-html="true" data-content="고도몰 동영상 가이드" data-placement="left"><img src="../admin/gd_share/img/icon_movie_guide.svg" alt="고도몰 동영상 가이드"/></span>
    <span class="btn_setting"><img src="../admin/gd_share/img/icon_setting_guide.svg" alt="따라하기 버튼"/></span>
    <?php } ?>
    <div id="gnbAnchor">
        <div class="scrollTop" style="display:none; margin-bottom:5px;">
            <a href="#top"><img src="<?=PATH_ADMIN_GD_SHARE?>img/icon_scroll_top.svg"></a>
        </div>
        <div class="scrollDown" style="display:block; margin-bottom:5px">
            <a href="#down"><img src="<?=PATH_ADMIN_GD_SHARE?>img/icon_scroll_down.svg"></a>
        </div>
    </div>
</div>
<iframe name="ifrmProcess" src="/blank.php" width="100%" height="200" class="<?=App::isDevelopment() === true ? 'display-block' : 'display-none'?>"></iframe>
<script type="text/javascript">
    $(function(){
        adminPanelApiAjax('<?php echo $manualData['menuCode'];?>', '<?php echo $manualData['menuKey'];?>', '<?php echo $manualData['menuFile'];?>');
        // 탑버튼 클릭
        /*$(document).on("click", "a[href=#top]", function(e) {
            $('html body').animate({scrollTop: 0}, 'fast');
        });*/

        // 스크롤 최하단시 탑아이콘 출력 (실제 컨텐츠 $('#content > .col-xs-12').height())
        /*$(window).scroll(function() {
            if ($(window).height() < $(document).height()) {
                if ($(window).scrollTop() >= 1) {
                    $("#gnbTopAnchor").slideDown(150);
                } else {
                    $("#gnbTopAnchor").slideUp(100);
                }
            }
        });*/

        $('#gnbAnchor').css('display','block');

        // 탑버튼 클릭
        $(document).on("click", "a[href=#top]", function(e) {
            $('html body').animate({scrollTop: 0}, 'fast');
            $('.scrollDown').css('display','block');
            $('.scrollTop').css('display','none');
        });

        // 다운버튼 클릭
        $(document).on("click", "a[href=#down]", function(e) {
            $('html body').animate({scrollTop: $(document).scrollTop($(document).height())}, 'fast');
            $('.scrollDown').css('display','none');
            $('.scrollTop').css('display','block');
        });

        $(window).scroll(function() {
            if($(window).scrollTop() >= 1){
                // 탑,다운버튼 노출
                $('.scrollTop').css('display','block');
                $('.scrollDown').css('display','block');

            }else{
                $('.scrollTop').css('display','none');
            }

            if (Math.round($(window).scrollTop()) >= $(document).height() - $(window).height()) {
                $('.scrollDown').css('display','none');
            }
        });
    });
</script>
<!-- <?= Globals::get('gLicense.version'); ?>.<?= App::getConfig('app.version')->toArray()[0]; ?> -->
</body>
</html>
