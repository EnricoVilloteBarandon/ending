<div class="wrapper">
    <div class="container-fluid">
        <h1>Games</h1>
        <input type="button" class="btn btn-primary" id="btnAddGame" value="Add Game">
        <div class="row">
            @foreach($games as $index => $value)
                <div class="col-sm-4 game">
                    <h4>{{ $value->title }}</h4>
                    <p><strong>Game Date:</strong> {{ date('Y-m-d h:i A',strtotime($value->date)) }}</p>
                    <p><strong>Amount:</strong> {{ $value->bet_amount }}</p>
                    <div class="">
                        <input type="button" class="btn btn-success btnGame" value="Game" data-id="{{ $value->id }}">
                        <input type="button" class="btn btn-danger btnPrice" value="Prices" data-id="{{ $value->id }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .game{
        padding:10px;
        text-align:center;
    }
    label > span{
        color:red;
    }
</style>

@include('admin/modals/gameModal')
@include('admin/modals/prizesModal')