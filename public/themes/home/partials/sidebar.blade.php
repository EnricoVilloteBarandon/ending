
<div class="card">
    <div class="card-header player-card-header" style="min-height: 71px; font-weight: bold; padding: .5rem;">
        <?php
        if (!isset($_SESSION)) session_start();
        echo "<h4 id='userid' data-id='" . $_SESSION["username"]  . "'>Hi " . $_SESSION["username"] ."</h4>";
        echo "<h5>Your Balance: " . $_SESSION["balance"]  . "</h5>";

        ?>
    </div>
    <div class="card-body" style="padding: .5rem;">
        <ul>
            <li><a href="{{ url('/') }}/dashboard">Home</a></li>
            <li><a href="{{ url('/') }}/bets">Bets</a></li>
            <li><a href="{{ url('/') }}/logout">Logout</a></li>
        </ul>
    </div>
</div>
