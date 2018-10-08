<h1>Login</h1>
<form method="post" action="login">
    <p>
        <?php echo e($errors->first('email')); ?>

        <?php echo e($errors->first('password')); ?>

    </p>
    <?php echo csrf_field(); ?>

    <input type="text" name="email"><br/>
    <input type="password" name="password"><br/>
    <input type="submit" value="Go">
</form>