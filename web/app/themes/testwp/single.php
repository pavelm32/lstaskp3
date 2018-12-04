<?php get_header(); ?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="article-title title-page">
                <?php the_title()?>
            </div>
            <div class="article-image"><img src="<?php the_field('pic')?>" alt="Image поста"></div>
            <div class="article-info">
                <div class="post-date">29.07.2016</div>
            </div>
            <div class="article-text">
                <?php the_content()?>
            </div>
            <div class="article-pagination">

                <?php if(get_previous_post()):?>

                <?php

                    $prvPost = get_previous_post();
                    $text = get_field('text', $prvPost->ID);
                    $preview = get_field('preview', $prvPost->ID);

                ?>
                <div class="article-pagination__block pagination-prev-left">
                    <a href="<?php the_permalink($prvPost->ID)?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
                    <div class="wrap-pagination-preview pagination-prev-left">
                        <div class="preview-article__img"><img src="<?=$preview?>" class="preview-article__image"></div>
                        <div class="preview-article__content">
                            <div class="preview-article__info"><a href="<?php the_permalink($prvPost->ID)?>" class="post-date"><?=get_the_date('d.m.Y',$prvPost->ID);?></a></div>
                            <div class="preview-article__text"><?=$text?></div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php if(get_next_post()):?>
                    <?php

                    $nextPost = get_next_post();
                    $text = get_field('text', $nextPost->ID);
                    $preview = get_field('preview', $nextPost->ID);

                    ?>
                <div class="article-pagination__block pagination-prev-right">
                    <a href="<?php the_permalink($nextPost->ID)?>" class="article-pagination__link">Сдедующая статья<i class="icon icon-angle-double-right"></i></a>
                    <div class="wrap-pagination-preview pagination-prev-right">
                        <div class="preview-article__img"><img src="<?=$preview?>" class="preview-article__image"></div>
                        <div class="preview-article__content">
                            <div class="preview-article__info"><a href="<?php the_permalink($nextPost->ID)?>" class="post-date"><?=get_the_date('d.m.Y',$nextPost->ID);?></a></div>
                            <div class="preview-article__text"><?=$text?></div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
            <?php endwhile;?>
            <?php endif;?>

        </div>
        <?php get_sidebar()?>
    </div>
</div>
<?php get_footer(); ?>
