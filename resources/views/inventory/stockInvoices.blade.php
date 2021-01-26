@extends('includes.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stock Count</h3>
                        <span class="pull-right">
							<a href="{{url('products/createStockInvoice')}}" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add New</a>
							</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Invoice No
                                </th>
                                <th>
                                    Created On
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stockCounts as $key=>$sc)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$sc->invoice_number}}
                                    </td>
                                    <td>
                                        {{$sc->created_at}}
                                    </td>
                                    <td>
                                        <a href="" class="fa-btn delete-confirm"><i class="fa fa-trash"></i></a>
                                        <a href="" class="fa-btn "><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

