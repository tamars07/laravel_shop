@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
    List Bills
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Bills</li>
@endsection
@section('main-content')
    {{--    Bang liet ke cac san pham--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All bills</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Date Order</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bills as $item)
                    <tr>
                        <td>{{$customers[$item->id]}}</td>
                        <td>{{$item->date_order}}</td>
                        <td>{{number_format($item->total)}}</td>
                        <td>{{$item->payment}}</td>
                        <td>{{$item->note}}</td>
                        <td>{{$item->status_id}}</td>
                        <td>
                            <a href="/edit-product/{{$item->id}}" class="btn btn-primary">Edit</a>
                            <a href="/delete-product/{{$item->id}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
@section('script')
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection