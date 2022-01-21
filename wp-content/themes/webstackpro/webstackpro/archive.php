<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>


<?php 
$categories= get_categories(array(
    'taxonomy'     => 'favorites',
    'meta_key'     => '_term_order',
    'orderby'      => 'meta_value_num',
    'order'        => 'desc',
    'hide_empty'   => 0,
    )
); 
include( 'templates/sidebar-nav.php' );
?>
<div class="main-content flex-fill">
    
<?php include( 'templates/header-banner.php' ); ?>

<div id="content" class="container">

<?php
// 加载搜索模块
if( in_array("home",io_get_option('search_position')) ){
    get_template_part( 'templates/tools','search' );
} else {
    echo '<div class="no-search my-2 p-1"></div>';
}
?>
    <div class="row">
        <div class="col-lg-8">
            <?php include( 'templates/cat-list.php' ); ?>
        </div> 
		<div class="sidebar col-lg-4 pl-xl-4 d-none d-lg-block">
			<?php get_sidebar(); ?>
		</div> 
    </div>
</div>
<?php get_footer(); ?>
