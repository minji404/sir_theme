<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<script>
$(document).ready(function(){
			$(".slider").bxSlider();

});
</script>
<style>
.bx-wrapper {
    -moz-box-shadow: 0 0 5px #ccc;
    -webkit-box-shadow:none; border:none; }
</style>
<!-- <div class="wrapper">
	<ul class="slider">
		<li><img src="<?echo G5_THEME_IMG_URL?>/pc01.jpg" alt="" style="width:100%"></li>
		<li><img src="<?echo G5_THEME_IMG_URL?>/pc02.jpg" alt="" style="width:100%"></li>
		<li><img src="<?echo G5_THEME_IMG_URL?>/pc03.jpg" alt="" style="width:100%"></li>
	</ul>
</div> -->

<h2 class="sound_only">최신글</h2>

<div class="latest_wr">
<!-- 최신글 시작 { -->

 
    <div style="float:left;<?php echo $lt_style ?>" class="lt_wr">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        //6줄만 최근 게싯물 나옴
        //24자만 표현
        echo latest('theme/myNew', "notice", 4, 24);
        ?>
    </div>
    <!-- } 최신글 끝 -->

</div>



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>