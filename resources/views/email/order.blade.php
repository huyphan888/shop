

@component('mail::panel')
        <p>cam on ban da dat hang tai website chung toi</p>
    @endcomponent

<div>don hang {{$order->id}} cua ban bao gom cac san pham sau day</div>
    @component('mail::table')
        | ten san pham | so luong | gia tien | thanh tien |
        |--------------|:--------:|:--------:|-----------:|
        <?php $total = 0; ?>
        @foreach($products as $product)
            <?php $subtotal = $product->pivot->quantity * $product->sale_price;
            $total += $subtotal;
            ?>
        | {{$product->name}} | {{$product->pivot->quantity}} | {{$product->sale_price}} | {{$subtotal}} |
        @endforeach
    @endcomponent


   <div style="text-align: center">
       tong so tien: {{$total}}
   </div>

    @component('mail::button', ['url' => url(''), 'color' => 'blue'])
        xem don hang
    @endcomponent

