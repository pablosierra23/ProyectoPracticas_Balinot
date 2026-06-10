<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'font-body selection:bg-secondary selection:text-surface-dim' ); ?>>
<?php wp_body_open(); ?>
    <div id="header-container">
        <?php get_template_part( 'template-parts/components/header' ); ?>
    </div>
