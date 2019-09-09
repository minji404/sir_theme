<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<script>
  $(document).ready(function(){
       $("#gnb_1dul").mouseover(function(){
              $(".s01b").show();
              $(".smbg").show();
             });
         $("#gnb_1dul").mouseout(function(){
              $(".s01b").hide();
              $(".smbg").hide();
             });

             $(window).scroll(function(){ 
          var winTop =$(this).scrollTop();
          console.log(winTop);
          if(winTop>99){
              $("#hd_wrapper").addClass("fixed");
          }else{
              $("#hd_wrapper").removeClass("fixed");
          }
      })//메뉴 fixed끝
  });

</script>
<div id="hd" >
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    
    <div id="hd_wrapper" class="clearfix">
        <div id="hd_w">
        <div id="logo">
            <a href="<?php echo G5_URL ?>">
                <img src="<? echo G5_THEME_IMG_URL ?>/ci_spcn.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
    
        <nav id="gnb">
           
                <ul id="gnb_1dul" class="clearfix">
                    
                    <?php
                    $sql = " select *
                                from {$g5['menu_table']}
                                where me_use = '1'
                                  and length(me_code) = '2'
                                order by me_order, me_id ";
                    $result = sql_query($sql, false);
                    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                    $menu_datas = array();
                    for ($i=0; $row=sql_fetch_array($result); $i++) {
                        $menu_datas[$i] = $row;
                        $sql2 = " select *
                                    from {$g5['menu_table']}
                                    where me_use = '1'
                                      and length(me_code) = '4'
                                      and substring(me_code, 1, 2) = '{$row['me_code']}'
                                    order by me_order, me_id ";
                        $result2 = sql_query($sql2);
                        for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                            $menu_datas[$i]['sub'][$k] = $row2;
                        }
                    }
                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue; 
                    ?>
                    <li class="gnb_1dli" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                          <div class="s01b">
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){
                            if($k == 0)
                                echo '<ul class="smw">'.PHP_EOL;
                        ?>
                            <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                        $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul>'.PHP_EOL;
                        ?>

                        
                    </li>
                    <?php
                    $i++;
                    }   //end foreach $row
                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
                </div>
              <div class="smbg"></div>
        </nav>

    </div>
    </div>
</div>
<!-- } 상단 끝 -->


<hr>

<? if(defined("_INDEX_")){?>
<!-- <div style="height: 400px;background:#0ff">111</div> -->
<script>
        $(document).ready(function(){
             $(".slider1").bxSlider({
            auto:true,pager:true,controls:false
        });
        //  $(".pwrap").bxSlider({
        //     auto:true,pager:true,controls:true
        // });//슬라이드1 끝
       

            var current = 0;
            var i;
             $(".pbtn_next").click(function(){
             current++;
             if(current ==4)current =0;
             var tt = 1000 * current * -1;
             $(".pbanner > ul").stop().animate({left:tt});
            });
            $(".pbtn_prev").click(function(){
             current--;
             if(current ==-1)current =3;
             var tt = 1000 * current * -1;
             $(".pbanner > ul").stop().animate({left:tt});
            });
            function slider2(){ //left
                // current++;
                i = current + 1;
                if(i==4){
                    current=3;
                    i=0;
                }
                var currentEl = $(".pbanner>ul>li").eq(current);
                var nextEl = $(".pbanner > ul > li").eq(i);

                currentEl.css({left:0}).stop().animate({left:-1000},1100);
                nextEl.css({left:1000}).stop().animate({left:0},1100);
                current = i;
            }
            function nextslider(){
                $(".pbtn_next").trigger("click");
            }
            setInterval(nextslider,3000);
        });
    </script>


<div class="sw">
    <ul class="slider1 clearfix">
        <li class="first">
            <div class="txt">
                <h2>LEADING ICT SERVICE<br>
                    BEYOND THE FRANCHISE IT
                </h2>
                <p>
                    SPC 네트웍스는 가맹점 서비스와 관련한 풍부한 현장 경험을 기반으로<br>
                    고객 만족을 최상의 목표로 하는 SPC 그룹의 ICT 전문 기업 입니다.
                </p>
                <a href="#" class="banner_btn"><span>SPC NETWORKS 소개</span> <i class="fa fa-angle-right"></i></a>
            </div>
        </li>

        <li class="second">
            <div class="txt">
                <h2>PAYMENT PLATFORM
                </h2>
                <p>
                    POS, 카드 단말기 장비로 국내외 신용카드 및 포인트 결제 수단에 대한<br>신속한 서비스를 안전하게 제공해 드립니다.
                </p>
                <a href="#" class="banner_btn"><span>서비스 상세보기</span> <i class="fa fa-angle-right"></i></a>
            </div>
        </li>
        <li class="third">
           <div class="txt">
                <h2>IT SOLUTION & CONSULTING
               </h2>
               <p>
                   SPC 네트웍스는 국내 최고의 프랜차이즈 IT(생산/유통/물류/품질/매장) 전문 기업으로<br>
                   고객의 솔루션 및 컨설팅을 제공해 드립니다.
               </p>
               <a href="#" class="banner_btn"><span>서비스 상세보기</span> <i class="fa fa-angle-right"></i></a>
           </div>
        </li>
    </ul>
</div>
<div id="wrapper">
        <div class="cont business" style="height: 610px;">
        <h2>BUSINESS AREA</h2>
        <span>지속적인 기술 개발과 차별화된 서비스를 제공합니다.</span>
        <div class="img_lst">
           <div class="q3 q01">
               <img src="<? echo G5_THEME_IMG_URL ?>/ba01.png" alt="Payment Service 아이콘 이미지">
               <h3>Payment Service</h3>
               <div class="hr1"></div>
               <p>On/Off Line 결제 서비스<br>
               신용카드 조회 서비스</p>
           </div>
           <div class="q3 q02">
               <img src="<? echo G5_THEME_IMG_URL ?>/ba02.png" alt="Retail Service 아이콘 이미지">
               <h3>Retail Service</h3>
               <div class="hr1"></div>
               <p>리테일 사업 토탈 서비스<br>
               매장 및 판매 관리, 시스템 운영</p>
           </div>
           <div class="q3 q03">
               <img src="<? echo G5_THEME_IMG_URL ?>/ba03.png" alt="IT Service 아이콘 이미지">
               <h3>IT Service</h3>
               <div class="hr1"></div>
               <p>대용량 시스템 및 보안 서비스<br>
               시스템 설계 및 구현, 솔루션 운영</p>
           </div>
        </div>
    </div>
    <div class="hr"></div>
    <div class="cont services">
       <h2>MAIN SERVICES</h2>
       <div class="img_lst">
           <div class="q31">
                <a href="#">
                <div class="iw">
                <img src="<? echo G5_THEME_IMG_URL ?>/img_main_ms01.jpg"alt="결제 서비스 이미지"></div>
                <h4>결제 서비스</h4>
                <span>상세보기 <i class="fa fa-angle-right"></i></span>
                </a>
           </div>
           <div class="q31">
                <a href="#">
                  <div class="iw">
                <img src="<? echo G5_THEME_IMG_URL ?>/img_main_ms02.jpg"alt="매장 관리 솔루션 이미지"></div>
                <h4>매장 관리 솔루션</h4>
                <span>상세보기 <i class="fa fa-angle-right"></i></span>
                </a>
           </div>
           <div class="q31">
                <a href="#">
                  <div class="iw">
                <img src="<? echo G5_THEME_IMG_URL ?>/img_main_ms03.jpg" alt="정보 보안 컨설팅 이미지"></div>
                <h4>정보 보안 컨설팅</h4>
                <span>상세보기 <i class="fa fa-angle-right"></i></span>
                </a>
           </div>
       </div>
    </div>
    <div class="hr"></div>
    <div class="cont prod">
        <h2>PRODUCTS</h2>
         <div class="pbtn">
               <span class="pbtn_prev"><img src="<? echo G5_THEME_IMG_URL ?>/btn_pre.png" alt="이전버튼"></span>
               <span class="pbtn_next"><img src="<? echo G5_THEME_IMG_URL ?>/btn_next.png" alt="이후버튼"></span>
             </div>
        <div class="pwrap">
           
        <div class="pbanner"> <!--1000px-->
            <ul class="clearfix"><!--5000px-->
                <li><img src="<? echo G5_THEME_IMG_URL ?>/pr01.png" alt="ZED-07 이미지">
                <h4>ZED-07 (고급형)</h4>
                <p>고급형 17인치 터치스크린 모니터<br>
                IC/MS 리더기 탑재<br>
                64GB SSD 탑재<br>
                멀티미디어 기능 지원</p>
                <a href="http://kmoz.dothome.co.kr/main/bbs/content.php?co_id=p_pos">제품더보기<i class="fa fa-angle-right"></i></a>
                </li>
                <li><img src="<? echo G5_THEME_IMG_URL ?>/pr02.png" alt="E 70 이미지">
                <h4>E 70 (고급형)</h4>
                <p>고급형 15인치 터치스크린 모니터<br>
                IC/MS 리더기 탑재<br>
                64GB SSD 탑재<br>
                멀티미디어 기능 지원</p>
                <a href="http://kmoz.dothome.co.kr/main/bbs/content.php?co_id=p_pos">제품더보기<i class="fa fa-angle-right"></i></a>
                </li>
                <li><img src="<? echo G5_THEME_IMG_URL ?>/pr03.png" alt="SWT-3000T 이미지">
                <h4>SWT-3000T</h4>
                <p>신용, 현금 IC 카드 거래<br>
                IC 카드 결제 (EMV)<br>
                POS 연동 기능<br>
                수동 프린터 탑재</p>
                <a href="http://kmoz.dothome.co.kr/main/bbs/content.php?co_id=p_credit">제품더보기<i class="fa fa-angle-right"></i></a>
                </li>
                <li><img src="<? echo G5_THEME_IMG_URL ?>/pr04.png" alt="SR-170P 이미지">
                <h4>SR-170P</h4>
                <p>IC/MS/RF 보안 리더기 (EMW 인증)<br>
                여신 협회 보안 인증 제품<br>
                RF 인식 기능 LED 표시<br>
                동영상 플레이 기능 탑재</p>
                <a href="http://kmoz.dothome.co.kr/main/bbs/content.php?co_id=p_sign">제품더보기<i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
        </div>
        
    </div>
    </div>    
    <div id="container_wr" class="clearfix">
       <div class="cont counseling">
            <h2>SPC네트웍스 상담실</h2>
            <div class="img_lst">
                <div class="q3 q01">
                    <h4>VAN 상담실</h4>
                    <div class="hr1"></div>
                    <span>02-2040-1004</span>
                </div>
                <div class="q3 q02">
                    <div></div>
                </div>
                <div class="q3 q03">
                    <h4>O2POS 상담실</h4>
                    <div class="hr1"></div>
                    <span>1644-3271</span>
                </div>
            </div>
        </div>
    </div>
<?}?>

<? if(defined("_INDEX_")){ ?>
    <div class="btg">
        <h3>SPC NETWORKS</h3>
    </div>
    <?}else{?>
    <style>
        #subBg{height:300px;}
        #subBg .sbtImg{height:300px;text-align:center;position:relative;}
        #subBg .sbtImg .title{width:400px;_background-color:#fff;
            left:50%;top:50%;transform:translate(-50%,-50%);position:absolute;}
          #subBg .sbtImg .title h2{font-size:3em;color:white;}   
        .subTopBg_01{background:url(<?echo G5_THEME_IMG_URL?>/sub01_03.jpg);}
        .subTopBg_02{background:url(<?echo G5_THEME_IMG_URL?>/sub02_00.jpg);}
        .subTopBg_03{background:url(<?echo G5_THEME_IMG_URL?>/sub02_01.jpg);}
        .subTopBg_04{background:url(<?echo G5_THEME_IMG_URL?>/sub02_02.jpg);}
        .subTopBg_05{background:url(<?echo G5_THEME_IMG_URL?>/sub02_03.jpg);}
    </style>

    <div id="subBg">
        <div id="page_title" class="sbtImg">
           <div class="title"> 
                <h2> <?php echo get_head_title($g5['title']); ?></h2>
               <div class="text"></div> 
           </div>
           <!--  <? 
                 $subTitle = get_head_title($g5['title']);
                 if($subTitle == "회사소개"){
                  ?>
                    대한민국을 대표하는 글로벌 기업
                   <img src="<?echo G5_THEME_IMG_URL?>/sub01_01.jpg" alt="">
                   <?
                   }else if($subTitle =="오시는길"){
                      echo"회사위치";
                      
                   }   
                  ?> -->
        </div>
    </div>
   
  <!--   <script>
        // window.onload = function(){}; onload되어져있는 것. 문서로드가 완벽하게 되었을 때 가져오는 것.
        window.onload = function(){
          var menuDep = $("#subBg .loc1D").html();
          console.log("현재위치 :" + menuDep); 

          if(menuDep == "회사소개"){
                $("#subBg .text").text("저희 홈페이지를 찾아와 주셔서 감사합니다.")
          }else if(menuDep == "사업영역"){
                 $("#subBg .text").text("저희의 사업영역입니다.")
          }   
        };
        

        
    </script> -->
    <?}?>
<!-- 콘텐츠 시작 { -->
    <div id="conwrapper">
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?>


           
            <div>
              
             <span class="locationBar" title="현재위치">
                <span> <em class="fa fa-home" aria-hidden="true"></em> HOME 
                  <i class="fa fa-angle-right" aria-hidden="true"></i> </span> 
                    <span class="loc1D"><!-- 1차메뉴 --></span> 
                    <span class="loc2D"><!-- 2차메뉴 --></span>
             </span>
            </div>

            <h2 id="container_title" style="text-align:center;font-size:2em;">
                  
                 <!--  <?php echo get_head_title($g5['title']); ?><br> -->

              </h2>
                <? 
                 $subTitle = get_head_title($g5['title']);
                 if($subTitle == "사소개"){
                  ?>
                    대한민국을 대표하는 글로벌 기업
                      <img src="<?echo G5_THEME_IMG_URL?>/sub01_01.jpg" alt="">
                   <?
                   }else if($subTitle =="시는길"){
                      echo"회사위치";
                      
                   }   
                  ?>
        <?php } ?>

        