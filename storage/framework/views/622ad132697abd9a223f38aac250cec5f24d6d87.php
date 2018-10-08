<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center col-lg-12">
                <h1>Lorem ipsum dolor sisit</h1>
                <h5>Balance: Php <?php echo e(number_format($balance,2)); ?></h5>
            </div>
            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 games" data-gameid="<?php echo e($value->id); ?>">
                    <h4><?php echo e($value->title); ?></h4>
                    <p><?php echo e(date("D, M d,Y g:i A",strtotime($value->date))); ?></p>
                    <p>Grand Price: <?php echo e($value->grandprice); ?></p>
                    <p>Bet Amount: <?php echo e(number_format($value->bet_amount,2)); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<style>
    .games{
        background-color:rgba(109, 163, 220, 0.25);
        padding:25px;
        margin: 1px 0;
        border:1px solid #fff;
    }
    .games:hover{
        cursor:pointer;
    }
</style>