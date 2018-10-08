<header>
    <ul>
        <li><a href="<?php echo e(url('/')); ?>/dashboard">Home</a></li>
        <li><a href="<?php echo e(url('/')); ?>/bets">Bets</a></li>
        <li><a href="<?php echo e(url('/')); ?>/logout">Logout</a></li>
    </ul>
    <?php 
        if (!isset($_SESSION)) session_start();
        echo "<h4>Balance: " . $_SESSION["balance"]  . "</h4>";
        echo "<h4 id='userid' data-id='" . $_SESSION["username"]  . "'>". $_SESSION["username"] ."</h4>";
        
    ?>
</header>