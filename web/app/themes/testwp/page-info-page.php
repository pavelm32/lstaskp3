<?php get_header()?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <h1 class="title-page"><?php the_title()?></h1>
            <div class="posts-list">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content()?>
                <!-- post-mini_end-->


                <?php endwhile;?>
                <?php endif; ?>

            </div>

        </div>
        <?php get_sidebar()?>
    </div>
</div>
<?php get_footer()?>