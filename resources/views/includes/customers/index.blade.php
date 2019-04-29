<div class="container">
        <div class="float-right">
            <a href="#modalForm" data-toggle="modal" data-href="{{url('discover/create')}}"
               class="btn btn-primary">New</a>
        </div>
        <h1 style="font-size: 1.3rem">Customers List (Laravel CRUD, Search, Sort - Modal Form)</h1>
        <hr/>
        <table class="table table-bordered bg-light">
            <thead class="bg-dark" style="color: white">
            <tr>
                <th width="60px" style="vertical-align: middle;text-align: center">No</th>
                <th style="vertical-align: middle">Name
                </th>
                <th style="vertical-align: middle">Gender</th>
                <th style="vertical-align: middle">Email</th>
                <th style="vertical-align: middle">Date</th>
                <th width="130px" style="vertical-align: middle">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($customers as $customer)
                <tr>
                    <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                    <td style="vertical-align: middle">{{ $customer->name }}</td>
                    <td style="vertical-align: middle">{{ $customer->gender }}</td>
                    <td style="vertical-align: middle">{{$customer->email}}</td>
                    <td style="vertical-align: middle">{{date('d-M-Y',strtotime($customer->created_at))}}</td>
                    <td style="vertical-align: middle" align="center">
                        <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                           data-href="{{url('discover/update/'.$customer->id)}}">
                            Edit</a>
                        <input type="hidden" name="_method" value="delete"/>
                        <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                           href="#modalDelete"
                           data-id="{{$customer->id}}"
                           data-token="{{csrf_token()}}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    
    
    