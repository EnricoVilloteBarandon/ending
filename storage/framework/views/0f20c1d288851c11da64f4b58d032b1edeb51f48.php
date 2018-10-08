<div class="wrapper">
    <div class="container-fluid">
        <h1>Games</h1>
        <input type="button" class="btn btn-primary" id="btnAddGame" value="Add Game">
        <div class="row">
            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4 game">
                    <h4><?php echo e($value->title); ?></h4>
                    <p><strong>Game Date:</strong> <?php echo e(date('Y-m-d h:i A',strtotime($value->date))); ?></p>
                    <p><strong>Amount:</strong> <?php echo e($value->bet_amount); ?></p>
                    <div class="">
                        <input type="button" class="btn btn-success btnGame" value="Game" data-id="<?php echo e($value->id); ?>">
                        <input type="button" class="btn btn-danger btnPrice" value="Prices" data-id="<?php echo e($value->id); ?>">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<style>
    .game{
        padding:10px;
        text-align:center;
    }
    label > span{
        color:red;
    }
</style>

<?php echo $__env->make('admin/modals/gameModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin/modals/prizesModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>