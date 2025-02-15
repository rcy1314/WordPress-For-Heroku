<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
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
<div class="main-content flex-fill page">
<?php include( 'templates/header-banner.php' ); ?>
<div id="content" class="container my-4 my-md-5">
	<div class="row">
		<div class="col-lg-8">
    	    <div class="panel card">
			<div class="card-body">
    	        <?php while( have_posts() ): the_post(); ?>
    	        <h1 class="h2 mb-3"><?php echo get_the_title() ?></h1>
    	        <div class="d-flex flex-fill text-muted text-sm mb-5">
    	        <?php 
    	        $category = get_the_category();
    	        if(!empty($category) && $category[0]){
    	        echo '<span class="mr-3 d-none d-sm-block"><a href="'.get_category_link($category[0]->term_id ).'"><i class="iconfont icon-classification"></i> '.$category[0]->cat_name.'</a></span>';
    	        }
    	        ?>
    	        <span class="mr-3 d-none d-sm-block"><i class="iconfont icon-time"></i> <?php echo timeago(get_the_time('Y-m-d G:i:s')); ?></span>
				<span class="mr-3"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="<?php the_author_meta('nickname') ?>"><i class="iconfont icon-user-circle"></i> <?php the_author_meta('nickname') ?></a></span>
				<div class="flex-fill"></div>
				<?php 
				if( function_exists( 'the_views' ) ) { the_views( true, '<span class="views mr-3"><i class="iconfont icon-chakan"></i> ','</span>' ); }
	            $like_count	= get_like(get_the_ID());
	            $liked		= isset($_COOKIE['liked_' . get_the_ID()]) ? 'liked' : ''; 
                ?>
         
                <span class="mr-3"><a class="" href="#comments"> <i class="iconfont icon-comment"></i> <?php echo get_post(get_the_ID())->comment_count; ?></a></span>
                <span class="mr-3"><a class="btn-like btn-link-like <?php echo $liked ?>" href="javascript:;" data-action="like" data-id="<?php echo get_the_ID() ?>"><i class="iconfont icon-like"></i> <span class="like-count"><?php echo $like_count ?></span></a></span>
    
				</div>
				<?php if(io_get_option('ad_s_title')) { ?>
					<div class="post-ad mt-n4"><?php echo stripslashes( io_get_option('ad_s_title_c') ); ?></div>
				<?php } ?>
    	        <div class="panel-body mt-2"> 
    	            <?php the_content();?>
    	        </div>
			
				<div class="tags my-2">
					<?php
						$post_tags = get_the_tags();
						if ($post_tags) {
							echo '<i class="iconfont icon-tags"></i>';
						  	foreach($post_tags as $tag) {
								echo '<a href="'.get_tag_link($tag->term_id).'" rel="tag" class="tag-' . $tag->slug . ' color-'.mt_rand(0, 8).'">' . $tag->name . '</a>';
						  	}
						}
					?>
				</div>
    	        <?php edit_post_link(__('编辑','i_owen'), '<span class="edit-link">', '</span>' ); ?>
			    <?php endwhile; ?> 
				<?php if(io_get_option('ad_s_b')) { ?>
				<div class="post-ad"><?php echo stripslashes( io_get_option('ad_s_b_c') ); ?></div>
				<?php } ?>
    	    </div>
			</div>
    	    <div class="single-top-area text-sm clearfix card mt-4">
					
    	    	<div class="card-body"> 
    	            <strong>版权声明：</strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="<?php bloginfo( 'name' ); ?>"><?php the_author_meta('nickname'); ?></a> 发表于 <?php echo  get_the_time('Y-m-d G:i:s') ?>。<br/>
    	            <strong>转载请注明：</strong><a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | <?php bloginfo('name');?></a>
    	    	</div>
					
    	    </div>
    	    <div class="near-navigation rounded mt-4 py-2">
    	    	<?php
    	    	$current_category = get_the_category();//获取当前文章所属分类ID
    	    	$prev_post = get_previous_post($current_category,'');//与当前文章同分类的上一篇文章
    	    	$next_post = get_next_post($current_category,'');//与当前文章同分类的下一篇文章
    	    	?>
    	    	<?php if (!empty( $prev_post )) { ?>
    	    	<div class="nav previous border-right border-color">
    	            <a class="near-permalink" href="<?php echo get_permalink( $prev_post->ID ); ?>">
    	    		<span>上一篇</span>
    	    		<h4 class="near-title"><?php echo $prev_post->post_title; ?></h4>
    	    		</a>
    	    	</div>
    	    	<?php } else { ?>
    	    	<div class="nav none border-right border-color">
    	    		<span>上一篇</span>
    	    		<h4 class="near-title">没有更多了...</h4>
    	    	</div>
    	    	<?php } ?>
    	    	<?php if (!empty( $next_post )) { ?>
    	    	<div class="nav next border-left border-color">
    	    		<a class="near-permalink" href="<?php echo get_permalink( $next_post->ID ); ?>">
    	    		<span>下一篇</span>
    	            <h4 class="near-title"><?php echo $next_post->post_title; ?></h4>
    	        </a>
    	    	</div>
    	    	<?php } else { ?>
    	    	<div class="nav none border-left border-color" style="text-align: right;">
    	    		<span>下一篇</span>
    	    		<h4 class="near-title">没有更多了...</h4>	
    	    	</div>
    	    	<?php } ?>
    	    </div>
    	    <?php 
    	    if ( comments_open() || get_comments_number() ) :
				comments_template();
    	    endif; 
    	    ?>
		</div> 
		<div class="sidebar col-lg-4 pl-xl-4 d-none d-lg-block">
			<?php get_sidebar(); ?>
		</div>
	</div> 
</div>
<?php get_footer(); ?>