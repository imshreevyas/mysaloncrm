@extends('admin.layout')


@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex card-title">
                                <h4 >All Plans</h4>
                                <p><a class="btn btn-primary" href="{{ route('admin.plans_add') }}">Add New</a> </p>
                            </div>

                            @if(count($data) > 0)
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Amount</th>
                                        <th>Appointments</th>
                                        <th>Edit</th>
                                        <th>Update Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $singleItem)
                                        <tr>
                                            <td>{{ $singleItem['plan_name'] }}</td>
                                            <td>{{ $singleItem['appointment_count'] }}</td>
                                            <td>{{ $singleItem['amount'] }}</td>
                                            <td><a>Edit</a></td>
                                            <td><a>Edit</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else 
                                <div>
                                    <p class="taxt-center">
                                        No Data Found!!
                                    </p>
                                </div>
                            @endif


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>

@stop
