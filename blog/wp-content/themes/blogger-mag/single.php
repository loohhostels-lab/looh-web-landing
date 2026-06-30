<!-- =========================
     Page Breadcrumb   
============================== -->
<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>
<!--==================== main content section ====================-->
<!-- =========================
     Page Content Section      
============================== -->
<main id="content" class="main-section single-section">  
  <?php if(have_posts())
  {
    while(have_posts()) { the_post(); ?>
    <div class="blogger-mag-blog-post-box"> 
      <div class="blogger-magog-post-inner">
        <div class="blogger-mag-blog-category"> 
          <?php $cat_list = get_the_category_list();
            if(!empty($cat_list)) {  
              the_category('&nbsp'); 
            } ?>
        </div>
        <h1 class="blogger-mag-title single">
          <?php the_title(); ?>
        </h1>
        <div class="post-meta">
          <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')));  ?>">
              <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
          </a>
          <span class="meta-sep">/</span>
          <?php comments_popup_link( esc_html__( 'No Comments', 'blogger-mag' ), esc_html__( '1 Comment', 'blogger-mag' ), '% '. esc_html__( 'Comments', 'blogger-mag' ), 'post-comments'); ?>
        </div>
        <?php if (has_tag()) {
          the_tags(); 
        }
        ?>
      </div>
      <?php
      if(has_post_thumbnail()){
        echo the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
      } ?>
      <div class="blogger-mag-blog-post-inner single">
        <?php the_content(); ?>
      </div>
    </div>
  <?php } } ?>
  <div class="blogger-mag-blog-comment"> 
    <?php comments_template('',true); ?> 
  </div>
</main>
<?php get_footer(); ?>