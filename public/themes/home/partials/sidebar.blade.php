
<div class="card">
    <div class="card-header player-card-header" style="min-height: 71px; font-weight: bold; padding: .5rem;">
        <?php
        if (!isset($_SESSION)) session_start();
        $odbc = odbc_connect('cima','','');
            $query = "select * from cust.dbf as a where ucase(NAME) = '". strtoupper($_SESSION["username"]) ."'";
            $queryResult = odbc_exec($odbc,$query);
            while($row = odbc_fetch_array($queryResult)){
                $_SESSION["balance"] = $row["BALANCE"] + $row["CAP"] + $row["CURRENTBET"] + $row["MON_RSLT"] + $row["TUE_RSLT"] + $row["WED_RSLT"] + $row["THU_RSLT"] + $row["FRI_RSLT"] + $row["SAT_RSLT"] + $row["SUN_RSLT"];
            }
        echo "<h4 id='userid' data-id='" . $_SESSION["username"]  . "'>Hi " . $_SESSION["username"] ."</h4>";
        echo "<h5>Your Balance: " . number_format($_SESSION["balance"],2)  . "</h5>";

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
