<<<<<<< HEAD
<div id="card_wrapper">
    <div class="loading">
        <div class="loader"></div>
    </div>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 id="title" data-title="{{ $bet_amount->id }}">{{ $bet_amount->title }}</h1>
            <h4 id="amount" data-amount="{{ $bet_amount->bet_amount }}">Amount: Php <span style="color:green;">{{ number_format($bet_amount->bet_amount,2) }}</span> per bet</h4>
            <h4>Grand Price: {{ $price->grandprice }}</h4>
            <h4>Date: {{ date('Y-m-d h:i A',strtotime($bet_amount->date)) }}</h4>
            <h5>Balance: Php 
                <?php 
                    echo number_format($_SESSION["balance"],2);
                ?>
            </h5>
        </div>
        <!-- <div class="row">
            <div class="col-lg-3 block">
                <div class="col-md-12 num" data-num="0-0" data-test="test">0-0</div>
                <div class="col-md-12 num">0-1</div>
                <div class="col-md-12 num">0-2</div>
                <div class="col-md-12 num">0-3</div>
                <div class="col-md-12 num">0-4</div>
                <div class="col-md-12 num">0-5</div>
                <div class="col-md-12 num">0-6</div>
                <div class="col-md-12 num">0-7</div>
                <div class="col-md-12 num">0-8</div>
                <div class="col-md-12 num">0-9</div>
                <div class="col-md-12 num">1-0</div>
                <div class="col-md-12 num">1-1</div>
                <div class="col-md-12 num">1-2</div>
                <div class="col-md-12 num">1-3</div>
                <div class="col-md-12 num">1-4</div>
                <div class="col-md-12 num">1-5</div>
                <div class="col-md-12 num">1-6</div>
                <div class="col-md-12 num">1-7</div>
                <div class="col-md-12 num">1-8</div>
                <div class="col-md-12 num">1-9</div>
                <div class="col-md-12 num">2-0</div>
                <div class="col-md-12 num">2-1</div>
                <div class="col-md-12 num">2-2</div>
                <div class="col-md-12 num">2-3</div>
                <div class="col-md-12 num">2-4</div>
            </div>
        </div> -->
        <div class="row">
            {!! $content !!}
            <?php
                // $count = 0;
                // for($index = 0; $index < 10; $index++){
                //     for($i = 0; $i < 10; $i++){
                //         switch(true){
                //             case $count <= 24:
                //                 if($count == 0){
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 49:
                //                 if($count == 25){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 74:
                //                 if($count == 50){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 99:
                //                 if($count == 75){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //         }
                //         $count++;
                //     }
                // }
            ?>
        </div>
    </div>
</div>
<style>
    .num{
        font-weight:bolder;
        font-size:13px;
        color:#000;
    }
    .bet{
        color:red;
    }
    .bet:hover{cursor:pointer;}
    .myBet{
        font-weight:bold;
        color:green;
    }
    /* .myBet:hover{cursor:not-allowed;} */
</style>

=======
<div id="card_wrapper">
    <div class="loading">
        <div class="loader"></div>
    </div>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 id="title" data-title="{{ $bet_amount->id }}">{{ $bet_amount->title }}</h1>
            <h4 id="amount" data-amount="{{ $bet_amount->bet_amount }}">Amount: Php <span style="color:green;">{{ number_format($bet_amount->bet_amount,2) }}</span> per bet</h4>
            <h4>Grand Price: {{ $price->grandprice }}</h4>
            <h4>Date: {{ date('Y-m-d h:i A',strtotime($bet_amount->date)) }}</h4>
            <h5>Balance: Php 
                <?php 
                    echo number_format($_SESSION["balance"],2);
                ?>
            </h5>
        </div>
        <!-- <div class="row">
            <div class="col-lg-3 block">
                <div class="col-md-12 num" data-num="0-0" data-test="test">0-0</div>
                <div class="col-md-12 num">0-1</div>
                <div class="col-md-12 num">0-2</div>
                <div class="col-md-12 num">0-3</div>
                <div class="col-md-12 num">0-4</div>
                <div class="col-md-12 num">0-5</div>
                <div class="col-md-12 num">0-6</div>
                <div class="col-md-12 num">0-7</div>
                <div class="col-md-12 num">0-8</div>
                <div class="col-md-12 num">0-9</div>
                <div class="col-md-12 num">1-0</div>
                <div class="col-md-12 num">1-1</div>
                <div class="col-md-12 num">1-2</div>
                <div class="col-md-12 num">1-3</div>
                <div class="col-md-12 num">1-4</div>
                <div class="col-md-12 num">1-5</div>
                <div class="col-md-12 num">1-6</div>
                <div class="col-md-12 num">1-7</div>
                <div class="col-md-12 num">1-8</div>
                <div class="col-md-12 num">1-9</div>
                <div class="col-md-12 num">2-0</div>
                <div class="col-md-12 num">2-1</div>
                <div class="col-md-12 num">2-2</div>
                <div class="col-md-12 num">2-3</div>
                <div class="col-md-12 num">2-4</div>
            </div>
        </div> -->
        <div class="row">
            {!! $content !!}
            <?php
                // $count = 0;
                // for($index = 0; $index < 10; $index++){
                //     for($i = 0; $i < 10; $i++){
                //         switch(true){
                //             case $count <= 24:
                //                 if($count == 0){
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 49:
                //                 if($count == 25){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 74:
                //                 if($count == 50){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //             case $count <= 99:
                //                 if($count == 75){
                //                     echo "</div>";
                //                     echo "<div class='col-md-3'>";
                //                 }
                //                 echo "<div class='col-md-12'>" . $index . "-" . $i . "</div>";
                //                 break;
                //         }
                //         $count++;
                //     }
                // }
            ?>
        </div>
    </div>
</div>
<style>
    .num{
        font-weight:bolder;
        font-size:13px;
        color:#000;
    }
    .bet{
        color:red;
    }
    .bet:hover{cursor:pointer;}
    .myBet{
        font-weight:bold;
        color:green;
    }
    /* .myBet:hover{cursor:not-allowed;} */
</style>

>>>>>>> test commit
<script src="{{ asset('js/card.js') }}"></script>