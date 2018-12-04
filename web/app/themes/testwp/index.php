<?php get_header()?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <h1 class="title-page"><?php the_title()?></h1>
            <div class="posts-list">
                <?php query_posts('cat=10&posts_per_page=3')?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- post-mini-->
                <div class="post-wrap">
                    <div class="post-thumbnail"><img src="<?php the_field('preview')?>" alt="Image поста" class="post-thumbnail__image"></div>
                    <div class="post-content">
                        <div class="post-content__post-info">
                            <div class="post-date"><?=the_date('d.m.Y');?></div>
                        </div>
                        <div class="post-content__post-text">
                            <div class="post-title">
                                <?php the_title()?>
                            </div>
                            <p>
                                <?php the_excerpt_embed()?>
                            </p>
                        </div>
                        <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
                    </div>
                </div>
                <!-- post-mini_end-->
                <?php endwhile; else : ?>
                <p>Нет постов</p>
                <?php endif; ?>
            </div>
            <!--div class="pagenavi-post-wrap"><a href="#" class="pagenavi-post__prev-postlink"><i class="icon icon-angle-double-left"></i></a><span class="pagenavi-post__current">1</span><a href="#" class="pagenavi-post__page">2</a><a href="#" class="pagenavi-post__page">3</a><a href="#" class="pagenavi-post__page">...</a><a href="#" class="pagenavi-post__page">10</a><a href="#" class="pagenavi-post__next-postlink"><i class="icon icon-angle-double-right"></i></a></div-->
        </div>
        <?php get_sidebar()?>
    </div>
</div>
<?php get_footer()?>