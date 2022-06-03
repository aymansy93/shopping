@extends('admin.master')
@section('index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">رقم الطلب</th>
                    <th scope="col"> اسم الطلبية</th>
                    <th scope="col">عدد القطع  </th>
                    <th scope="col"> اجمالي المبلغ المدفوع</th>
                    <th scope="col"> حالة المنتج</th>
                    <th scope="col"> تاريخ الشراء</th>
                    <th scope="col">Action</th>
            
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $orders as $order  )
            
                                        <tr>
                                        <th scope="row">{{$order->order->order_numper}}</th>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td>{{$order->order->total}}</td>
                                        @if ($order->order->status == 'تتم مراجعة الطلب')
                                        <td class="bg-secondary">{{$order->order->status}}</td>
                                        @endif
                                        @if ($order->order->status == 'قبول')
                                        <td class="bg-primary">{{$order->order->status}}</td>
                                        @endif
                                        @if ($order->order->status == 'رفض')
                                        <td class="bg-danger">{{$order->order->status}}</td>
                                        @endif
                                        @if ($order->order->status == 'اتمام')
                                        <td class="p-3 bg-success">{{$order->order->status}}</td>
                                        @endif
                                        <td>{{$order->created_at}}</td>
                                        <td><form method="post" action="/admin/changestatus/{{$order->order->id}}">
            
                                            {{csrf_field()}}
                                                <td><input class="btn btn-primary" name="status" type="submit" value="قبول"></td>
                                                <td><input class="btn btn-danger" name="status" type="submit" value="رفض"></td>
                                                <td><input class="btn btn-success" name="status" type="submit" value="اتمام"></td>
                                            </form></td>
                                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection