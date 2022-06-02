@if (Cart::count() > 0)
<table class="table">
    <thead>
      <tr>
          <th scope="col">المنتج</th>
          <th scope="col"></th>

          <th scope="col">السعر</th>
          <th scope="col">الكمية</th>
          <th scope="col">مجموع</th>
          <th scope="col"> </th>
          <th scope="col"></th>

      </tr>
  </thead>
  <tbody>
  {{-- //////////////////////////////// --}}
  
  @foreach (Cart::content() as $id )
  <tr>
    <th >{{$id ->name}}</th>
    <td><img
      src="http://127.0.0.1:8000/storage/product/{{$id->options->type_product}}/{{$id->options->imgname}}"
      alt="" width="100px"
    /></td>
    <td>{{ $id->price}}</td>
    <td>
      <div class="quantity-input col-xs-2"> 
        
          <input class="form-control" type="text" value={{ $id->qty }}  name="quantity">
          <a class="btn btn-increase" href="#" wire:click.prevent= "update('{{$id->rowId}}')">+</a>
          <a class="btn btn-reduce" href="#"  wire:click.prevent= "update_dec('{{$id->rowId}}')">-</a>
        

      </div>
      
    </td>
    <td>
        {{$id->total}}
    </td>
    <td class="actions" data-th="">
      <button class="btn btn-danger btn-md remove-from-cart"  wire:click.prevent= "remove('{{$id->rowId}}')">
        <i class="fa fa-3x fa-trash-o"></i></button>
  </td>
  </tr>
    
  @endforeach
  <td><h3>مجموع الفاتورة</h3></td>
  <td>{{Cart::initial()}}</td>
  <td colspan="5" class="text-right">
    <a href="{{ route('products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> متابعة التسوق</a>
    <a href="{{route('checkout')}}" class="btn btn-success">الدفع</a>
</td>
  @else
   
  <div class="fs-4 text text-center">
      <img class="rounded" src="{{asset('images/cart.png')}}" width="300px" alt="">
    <p class=" alert-info">السلة فارغة هيا بنا لنتسوق </p>
    <a class=" alert-danger text-decoration-none" href="{{route('products','#pro')}}">للذهاب الى المنتجات المتوفرة</a>
  </div>
  @endif
  

  
  
  </tbody>
</table>