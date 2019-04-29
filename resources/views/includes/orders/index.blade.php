<div class="container">
    <div class="float-right">
        <a href="#modalForm" data-toggle="modal" data-href="{{url('discover/create')}}"
           class="btn btn-primary">New</a>
    </div>
    <h1 style="font-size: 1.3rem">Orders</h1>
    <hr/>
    <table class="table table-bordered bg-light">
        <thead class="bg-dark" style="color: white">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No</th>
            <th style="vertical-align: middle">Product
            </th>
            <th style="vertical-align: middle">Price</th>
            <th width="130px" style="vertical-align: middle">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($orders as $order)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $order->product }}</td>
                <td style="vertical-align: middle">{{$order->price}}</td>
                <td style="vertical-align: middle">{{date('d-M-Y',strtotime($customer->created_at))}}</td>
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('discover/update/'.$customer->id)}}">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$order->id}}"
                       data-token="{{csrf_token()}}">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

