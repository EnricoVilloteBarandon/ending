<!DOCTYPE html>
<html lang="en">

    <head>
        <?php echo meta_init(); ?>

        <meta name="keywords" content="<?php echo Theme::get('keywords'); ?>">
        <meta name="description" content="<?php echo Theme::get('description'); ?>">
        <meta name="author" content="<?php echo Theme::get('author'); ?>">
    
        <title><?php echo Theme::get('title'); ?></title>

        <?php echo Theme::asset()->styles(); ?>
        
    </head>

    <body>
        <?php echo Theme::partial('header'); ?>

        <?php echo Theme::content(); ?>

        <?php echo Theme::partial('footer'); ?>

        <?php echo Theme::asset()->scripts(); ?>
    </body>

</html>
