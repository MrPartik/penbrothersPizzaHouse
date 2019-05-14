
@foreach($pizzaInfos as $pizzaInfo)
{{$pizzaInfo->pi_title}}<br>
    @foreach($pizzas->where('pi_id',$pizzaInfo->pi_id) as $pizza)
        @foreach($pizzaSizes->where('ps_id',$pizza->ps_id) as $pizzaSize)
        {{$pizzaSize->ps_desc}}-{{$pizza->p_price}}<br>
        @endforeach
    @endforeach
@endforeach


