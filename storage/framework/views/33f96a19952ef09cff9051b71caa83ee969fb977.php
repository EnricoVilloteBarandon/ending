<div class="wrapper">
    <div class="container">
        <div>
            <input type="button" id="btnAddUsers" class="btn btn-success" value="Add User" style="margin-bottom:10px;">
        </div>
        <div class="row">
            <div class="col-lg-12">
            <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <p class="alertP"><?php echo e($errors->first('firstname')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('lastname')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('email')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('contact')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('password')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('balance')); ?></p>
                        <p class="alertP"><?php echo e($errors->first('usertype')); ?></p>
                    </div>
            <?php endif; ?>
                <table class="table table-bordered" id="tblUsers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>UserType</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('admin/modals/usersModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script type="text/javascript">
    <?php if(count($errors) > 0): ?>
        $('#usersModal').modal('show');
    <?php endif; ?>
</script>