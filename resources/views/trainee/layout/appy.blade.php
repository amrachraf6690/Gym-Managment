@if(!auth()->user()->11 == 1
    && auth()->user()->payment_day - date('d') >= 0
    && auth()->user()->payment_day - date('d') < 3 )
    Warning
@elseif(!auth()->user()->11 == 1
    && auth()->user()->payment_day  < 0 )
    Stop
    @else
    GOOOOOOOO
@endif