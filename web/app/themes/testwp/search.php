<?php get_header()?>

    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Поиск по: <?php echo $_GET['s'];?></h1>
                <div class="posts-list">
                    <?php
                    $args = array_merge( $wp_query->query, array( 'post_type' => "post") );
                    query_posts($args)
                    ?>
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
            </div>
            <?php get_sidebar()?>
        </div>
    </div>
<?php get_footer()?>