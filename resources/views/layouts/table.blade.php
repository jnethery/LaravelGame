<div class="row">
@foreach ($items as $item)
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel panel-default">
                    <div style="background: url({{URL::asset('img/items/' . $item['img'])}}) no-repeat center center transparent; height:100px;">&nbsp;</div>
                </div>
                <div style="text-align: center;">
                    {{ $item['name'] }}
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>