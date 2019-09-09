<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

	<section id="section">
		<div class="wrap clearfix">

			<div class="section_title">
				<h3><?php echo $bo_subject ?></h3>
				<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="more_btn">more</a>
			</div>

			<div class="section_content">
				<ul class="news_list clearfix">
					  <?php for ($i=0; $i<count($list); $i++) {  ?>
					<li>
						<a href="<?echo $list[$i]['href'];?>">
						<h4 class="news_title">
							<? echo $list[$i]['subject']; ?>
						</h4>	
						<span class="date">
							<?php echo $list[$i]['datetime2'] ?>
						</span>
						</a>
					</li>

					<?}?>
				</ul>
			</div>
		</div>
</html>