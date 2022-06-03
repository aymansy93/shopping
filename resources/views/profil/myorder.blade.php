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
                            <th scope="col">عدد القطع </th>
                            <th scope="col"> اجمالي المبلغ المدفوع</th>
                            <th scope="col"> حالة المنتج</th>
                            <th scope="col"> تاريخ الشراء</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            {{-- {{$order->order_details[0]->qty}} --}}

                            <tr>
                                <th scope="row">{{ $order->order_numper }}</th>
                                <td>{{ $order->order_details[0]->product_name }}</td>
                                <td>{{ $order->order_details[0]->qty }}</td>
                                <td>{{ $order->total }}</td>
                                @if ($order->status == 'تتم مراجعة الطلب')
                                    <td class="bg-secondary">{{ $order->status }}</td>
                                @endif
                                @if ($order->status == 'قبول')
                                    <td class="bg-primary">{{ $order->status }}</td>
                                @endif
                                @if ($order->status == 'رفض')
                                    <td class="bg-danger">{{ $order->status }}</td>
                                @endif
                                @if ($order->status == 'اتمام')
                                    <td class="p-3 bg-success">{{ $order->status }}</td>
                                @endif
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <form method="post" action="/admin/{{ $order->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-primary" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
