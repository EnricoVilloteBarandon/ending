<header>
    <ul>
        <li><a href="{{ url('/') }}/dashboard">Home</a></li>
        <li><a href="{{ url('/') }}/bets">Bets</a></li>
        <li><a href="{{ url('/') }}/logout">Logout</a></li>
    </ul>
    <?php 
        if (!isset($_SESSION)) session_start();
        echo "<h4>Balance: " . $_SESSION["balance"]  . "</h4>";
        echo "<h4 id='userid' data-id='" . $_SESSION["username"]  . "'>". $_SESSION["username"] ."</h4>";
        
    ?>
</header>