<<<<<<< HEAD
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center col-lg-12">
                <h1>Lorem ipsum dolor sisit</h1>
                <h5>Balance: Php {{ number_format($balance,2) }}</h5>
            </div>
            @foreach($games as $index => $value)
                <div class="col-lg-4 col-md-6 col-sm-12 games" data-gameid="{{ $value->id }}">
                    <h4>{{ $value->title }}</h4>
                    <p>{{ date("D, M d,Y g:i A",strtotime($value->date)) }}</p>
                    <p>Grand Price: {{ $value->grandprice }}</p>
                    <p>Bet Amount: {{ number_format($value->bet_amount,2) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .games{
        background-color:rgba(109, 163, 220, 0.25);
        padding:25px;
        margin: 1px 0;
        border:1px solid #fff;
    }
    .games:hover{
        cursor:pointer;
    }
=======
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center col-lg-12">
                <h1>Lorem ipsum dolor sisit</h1>
                <h5>Balance: Php {{ number_format($balance,2) }}</h5>
            </div>
            @foreach($games as $index => $value)
                <div class="col-lg-4 col-md-6 col-sm-12 games" data-gameid="{{ $value->id }}">
                    <h4>{{ $value->title }}</h4>
                    <p>{{ date("D, M d,Y g:i A",strtotime($value->date)) }}</p>
                    <p>Grand Price: {{ $value->grandprice }}</p>
                    <p>Bet Amount: {{ number_format($value->bet_amount,2) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .games{
        background-color:rgba(109, 163, 220, 0.25);
        padding:25px;
        margin: 1px 0;
        border:1px solid #fff;
    }
    .games:hover{
        cursor:pointer;
    }
>>>>>>> test commit
</style>