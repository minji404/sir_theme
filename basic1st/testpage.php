<?php

include_once('./_common.php');


	$co_id = "testPage";

	//상단 메뉴바의 몇번째 1차메뉴에 속해 있는지 지정해 주세요.
	$menuNum = "1";

	//상단 메뉴바의 1차메뉴중 몇번째 2차메뉴에 속해 있는지 지정해 주세요.
	$menuNum2 = "2";
	
	//본 페이지의 제목을 입력해 주시기 바랍니다.
	$g5['title'] = "비젼";


include_once(G5_THEME_PATH.'/head.php');
?>
<script>
$(document).ready(function(){
	$('#snb > li:nth-child(<?php echo $menuNum; ?>)').addClass("co_id<?php echo $co_id; ?> active");
	$('#snb > li:nth-child(<?php echo $menuNum; ?>) > ul > li:nth-child(<?php echo $menuNum2; ?>)').addClass("snb2d_co_id<?php echo $co_id; ?>  active");
	});
</script>

<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab atque assumenda voluptate pariatur, fuga debitis explicabo esse quam eligendi omnis voluptates voluptatem asperiores, dignissimos, vero, ducimus ipsum eaque quis possimus. Sit consequatur facilis dignissimos voluptatibus accusamus totam quo blanditiis sequi, accusantium dolore aut beatae reprehenderit maxime non a labore quas! Labore saepe reiciendis numquam nemo animi vel odio repellendus illum nostrum sit, eos! Adipisci suscipit quis incidunt nihil iusto vero vel, blanditiis a enim aliquam cum quisquam. Consectetur velit aliquam debitis facilis quidem deleniti, consequatur iure. Omnis, officia nihil repellat consequuntur labore fuga, quibusdam, debitis optio distinctio, voluptatem corporis rerum.</div>



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>