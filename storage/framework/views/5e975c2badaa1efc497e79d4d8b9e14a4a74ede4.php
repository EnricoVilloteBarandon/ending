<div class="row">
    <div class="col-sm-12">
        <div class="row titleHeader">
            <div class="col-sm-4">Title</div>
            <div class="col-sm-4">Bet</div>
            <div class="col-sm-4">Amount</div>
        </div>
    </div>
    <?php $__currentLoopData = $bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-12">
            <div class="row <?php if($value->status == 0): ?> pending <?php elseif($value->status == 2): ?> win <?php else: ?> past <?php endif; ?>">
                <div class="col-sm-4 info"><?php echo e($value->title); ?></div>
                <div class="col-sm-4 info"><?php echo e($value->bet); ?></div>
                <div class="col-sm-4 info">Php <?php echo e(number_format($value->bet_amount,2)); ?></div>
            </div>
        </div> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<style>
    .pending{
        text-align:center;
        background-color:#e6ffe6;
        margin-bottom:5px;
    }
    .past{
        text-align:center;
        background-color:#ff9999;
        margin-bottom:5px;
    }
    .win{
        text-align:center;
        background-color:#00ff00;
        margin-bottom:5px;
    }
    .info{
        border:1px solid #fff;
        padding:10px;
    }
    .titleHeader{
        text-align:center;
        background-color:#e6ffff;
        margin-bottom:5px;
    }
</style>