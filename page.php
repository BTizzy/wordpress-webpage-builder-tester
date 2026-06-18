<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero hero-small">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php the_title(); ?></h1>
            <p class="hero-subtitle">People Operations for Your Business</p>
        </div>
    </div>
</section>

<!-- Page Content -->
<section class="section">
    <div class="container">
        <div class="page-content fade-in-up">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>