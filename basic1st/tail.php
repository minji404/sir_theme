<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

    </div><!-- container -->
    <? if(!defined("_INDEX_")){?>
    <div id="aside">
       <?include_once(G5_THEME_PATH.'/skin/nav/mysubmenu.php'); ?>
    </div>
    <?}?>

</div><!-- container_wr -->

</div><!-- conwrapper -->
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr" class="bottom">
    
            <h5>(주)에스피씨네트웍스</h5>

            <address>
                서울시 강남구 남부순환로 355길 12(도곡동, 부강빌딩)
                <span>|</span>
                대표이사 : 박철홍
                <span>|</span>
                대표전화 : 02 2040 1004
            </address>
        <p>Copyright 2019. SPC NETWORKS Co.,Ltd. ALL RIGHTS RESERVED</p>

        <div id="ft_catch"><img src="<? echo G5_THEME_IMG_URL ?>/pcidss.jpg" alt="결제카드 데이터 보안 표준 인증 PCI DSS마크">
        <img src="<? echo G5_THEME_IMG_URL ?>/isms.jpg" alt="정보 보호 관리 체계 인증 ISMS마크"></div>
       
    </div>
    
    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
        <script>
        
        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>