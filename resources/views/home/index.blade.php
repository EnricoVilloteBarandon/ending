<?php date_default_timezone_set('Asia/Hong_Kong'); ?>
<div class="wrapper">
    {{--<div class="container">--}}
        <div class="card card-mainDiv">
            <div class="card-header main-card-header"><i class="glyphicon glyphicon-th-large" aria-hidden="true"></i>Available Ending Cards {{ date('Y-m-d h:i:s',time()) }}</div>
            <div class="card-body">
                <div class="row">
                    @foreach($games as $index => $value)
                        <div class="div-card col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-details h-100 border-primary">
                                <div class="card-header" style="min-height: 71px; font-weight: bold; padding: .5rem;">{{ $value->title }}</div>
                                <div class="card-body" style="padding: .5rem;">
                                    @if(strtotime($value->date) < strtotime(date('Y-m-d H:i:s',time())))
                                        <h5 class="closed">Closed</h5>
                                    @else
                                        <h5 class="open">Open</h5>
                                    @endif
                                    @if($value->result != null)
                                        <p>Result: <span>{{ $value->result }}</span></p>
                                    @endif
                                    <h5 class="card-text">Grand Price:
                                        <?php 
                                            if(preg_match("/[a-z]/i", $value->grandprice)){
                                                echo "<a href='". url('/') ."/prize/$value->id'>" . $value->grandprice . "</a>";
                                            }else{
                                                echo "Php " . number_format($value->grandprice,2);
                                            }
                                        ?>
                                    </h5>
                                    <p class="card-text">{{ date("D, M d,Y g:i A",strtotime($value->date)) }}</p>
                                    <p class="card-text">Bet Amount: {{ number_format($value->bet_amount,2) }}</p>
                                    <a href="#" class="btn btn-primary games" data-gameid="{{ $value->id }}">View Card</a>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-lg-4 col-md-6 col-sm-12 games" data-gameid="{{ $value->id }}">--}}
                        {{--<h4>{{ $value->title }}</h4>--}}
                        {{--<p>{{ date("D, M d,Y g:i A",strtotime($value->date)) }}</p>--}}
                        {{--<p>Grand Price: {{ $value->grandprice }}</p>--}}
                        {{--<p>Bet Amount: {{ number_format($value->bet_amount,2) }}</p>--}}
                        {{--</div>--}}
                    @endforeach
                </div>
            </div>
        </div>

    {{--</div>--}}
</div>
<style>
    /*.games{*/
        /*background-color:rgba(109, 163, 220, 0.25);*/
        /*padding:25px;*/
        /*margin: 1px 0;*/
        /*border:1px solid #fff;*/
    /*}*/
    /*.games:hover{*/
        /*cursor:pointer;*/
    /*}*/
    .closed{
        color:red;
        font-weight:bolder;
    }
    .open{
        color:green;
        font-weight:bolder;
    }
    p > span{
        color:green;
        font-weight:bolder;
    }
</style>