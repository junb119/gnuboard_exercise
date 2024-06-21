<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

// include_once(G5_THEME_PATH.'/head.php');
include_once(G5_THEME_PATH.'/index_head.php');
?>
<h3 class="content_tt">Recent Projects</h3>
<p class="project_link"><a href="#">See all projects</a></p>

<?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정

	echo latest('theme/pic_portfolio', 'portfolio', 3, 23);		// 최소설치시 자동생성되는 공지사항게시판
    ?>


<?php
include_once(G5_THEME_PATH.'/tail.php');