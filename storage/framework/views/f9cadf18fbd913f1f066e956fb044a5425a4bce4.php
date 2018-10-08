<h1>Login</h1>
<form method="post" action="login">
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <p>
                <?php echo e($errors->first('email')); ?>

                <?php echo e($errors->first('password')); ?>

            </p>
        </div>
    <?php endif; ?>
    <?php echo csrf_field(); ?>

    <input type="text" name="email"><br/>
    <input type="password" name="password"><br/>
    <input type="submit" value="Go">
</form>
<!-- <div>
    <form action="odbcLogin" method="post">
        <?php echo csrf_field(); ?>

        <input type="text" name="name" id="name"><br/>
        <input type="password" name="password" id="password"><br/>
        <input type="submit" value="Submit">
    </form>
</div> -->