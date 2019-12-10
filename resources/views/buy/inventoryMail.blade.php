<div><h2>LM online shop</h2></div>
<div>
    @foreach($_itemArray as $_)
        {{!! $cartitem->item->item_name !!}}の在庫数が{{!! $cartitem->item->inventory_control !!}}個になりました。
    @endforeach
</div>
<br>
