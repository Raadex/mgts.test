<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <br><br><br>
<form method="post" action="{{route('search')}}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Имя</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Имя" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Номер телефона</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Номер телефона" name="phone" value="{{old('phone')}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Адрес</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Адрес" name="address" value="{{old('address')}}">
    </div>


    <button type="submit" name="search" class="btn btn-primary" value="search">Поиск</button>
</form>
@if($users->count() > 0)
<div class="list-group">
    <p>Всего {{$users->count()}} абонентов</p>
    @foreach($users as $user)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{$user->getFullName()}}</h4>
            <h5>{{\Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') . ' г.р'}} </h5>
            <p>Номер телефона: {{$user->phone_number}}</p>
            <h2>Адрес</h2>
            @php
                $address = $user->address;
                $documents = $user->documents;
                $orders = $user->orders;
            @endphp
            <p>{{$address->country . ' ' . $address->region . ' ' . $address->city . ' ' . $address->street . ' дом '
                . $address->house . ' кв. ' . $address->flat}}</p>
            @if( $documents->count() > 0 )
            <h2>Документы</h2>
                <ul>
                    @foreach( $documents as $doc )
                    <li>{{$doc->type . ' №' . $doc->number . ' выдан ' . $doc->agency}}</li>
                    @endforeach
                </ul>
                @endif

            @if( $orders->count() > 0 )
                <h2>Заказы</h2>
                <ul>
                    @foreach( $orders as $order )
                        <li>-{{$order->type->name . ' (' . $order->status->name . ') '}}</li>
                        <p>{{$order->tariff->name . ' ' . $order->tariff->monthly_fee . ' руб. в месяц'}}</p>
                        <p>Оборудование: {{isset($order->equipment) ? $order->equipment->model . ' ,серийный номер ' . $order->equipment->serial_number : 'нет'}}</p>
                        <p>Итогово в месяц:  {{$order->tariff->sum('monthly_fee') . ' руб'}}</p>
                    @endforeach
                </ul>
            @endif
        </a>
        <br>
    @endforeach

</div>
    @else
<h4>Ничего не найдено</h4>
    @endif
</div>
