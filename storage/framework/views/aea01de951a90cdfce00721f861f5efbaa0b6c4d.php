<!DOCTYPE html>
<html lang="en">

    <head>
        <?php echo meta_init(); ?>

        <meta name="keywords" content="<?php echo Theme::get('keywords'); ?>">
        <meta name="description" content="<?php echo Theme::get('description'); ?>">
        <meta name="author" content="<?php echo Theme::get('author'); ?>">
        <input type="hidden" id="hiddenUrl" value="<?php echo e(url('/')); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        
        <title><?php echo Theme::get('title'); ?></title>

        <?php echo Theme::asset()->styles(); ?>
        <?php echo Theme::asset()->scripts(); ?>
        
    </head>

    <body>
        <?php echo Theme::partial('header'); ?>

        <?php echo Theme::content(); ?>

        <?php echo Theme::partial('footer'); ?>

    </body>

</html>
