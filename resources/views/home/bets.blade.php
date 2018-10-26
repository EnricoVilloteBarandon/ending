<div class="row">
    <div class="col-sm-12">
        <div class="row titleHeader">
            <div class="col-sm-3">Title</div>
            <div class="col-sm-3">Bet</div>
            <div class="col-sm-3">Amount</div>
            <div class="col-sm-3">Result</div>
        </div>
    </div>
    @foreach($bets as $index => $value)
        <div class="col-sm-12">
            <div class="row @if($value->status == 0) pending @elseif ($value->status == 2) win @else past @endif">
                <div class="col-sm-3 info">{{ $value->title }}</div>
                <div class="col-sm-3 info">{{ $value->bet }}</div>
                <div class="col-sm-3 info">Php {{ number_format($value->bet_amount,2) }}</div>
                <div class="col-sm-3 info">@if($value->status == 0) Pending @elseif ($value->status == 2) Win @else -{{ number_format($value->bet_amount,2)}}@endif</div>
            </div>
        </div> 
    @endforeach
</div>

<style>
    .pending{
        text-align:center;
        background-color:#e6ffe6;
        margin-bottom:5px;
    }
    .past{
        text-align:center;
        background-color: #fd3535;
        margin-bottom:5px;
    }
    .win{
        text-align:center;
        background-color:#00ff00;
        margin-bottom:5px;
    }
    .info{
        border:1px solid #fff;
        padding:10px;
    }
    .titleHeader{
        text-align:center;
        background-color:#e6ffff;
        margin-bottom:5px;
    }
</style>