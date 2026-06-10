<?php
get_header();
?>
    <main>
        <div id="hero-container">
            <?php get_template_part( 'template-parts/components/hero' ); ?>
        </div>
        
        <?php get_template_part( 'template-parts/home/models' ); ?>
        <?php get_template_part( 'template-parts/home/editorial' ); ?>
        <?php get_template_part( 'template-parts/home/contact' ); ?>
    </main>
<?php
get_footer();
