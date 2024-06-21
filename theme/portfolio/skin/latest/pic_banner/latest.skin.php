<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 1300;
$thumb_height = 600;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

    <!-- <ul class="project_list clearfix">
        <li>
            <img src="images/portfolio-thumb-1.jpg" alt="portfolio thumb"/>
            <div class="hover_contents">
                <h4>This is the project name.</h4>
                <a href="#">click for details</a>
            </div>
        </li>		
    </ul> -->
    
   
   <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <li class="slide1 slide" style="background-image:url(<?=$img?>)">
            <h2 class="fancy-box red main_tt"><?= $list[$i]['subject'];?></h2>
            <div class="slide_contents">
                <p><?php echo cut_str(strip_tags($list[$i]['wr_content']), 100, '..')?>
                </p>
                <a href="<?=$list[$i]['wr_link1'];?>" class="btn">See Details</a>
            </div>
        </li>
        
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    
    