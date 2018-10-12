<div class="wrapper">
    {{--<div class="container">--}}
        <div class="card card-mainDiv">
            <div class="card-header main-card-header"><i class="glyphicon glyphicon-th-large" aria-hidden="true"></i>Available Ending Cards</div>
            <div class="card-body">
                <div class="row">
                    @foreach($games as $index => $value)
                        <div class="div-card col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-details h-100 border-primary">
                                <div class="card-header" style="min-height: 71px; font-weight: bold; padding: .5rem;">{{ $value->title }}</div>
                                <div class="card-body" style="padding: .5rem;">
                                    {{--<h5 class="card-title"></h5>--}}
                                    <h5 class="card-text">Grand Price: {{ $value->grandprice }}</h5>
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

</style>