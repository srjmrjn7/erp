@extends('includes.app')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Product Units</h3>
                        <span class="pull-right">
							<button data-toggle="modal" data-target="#add" class="btn btn-sm btn-primary"> <i
                                    class="fa fa-plus"></i> Add New Units</button>
							</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Unit Name
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $key=>$unit)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$unit->unit}}
                                    </td>
                                    <td>
                                        Delete, Edit
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


    <!-- Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Units</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('storeUnit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Unit</label>
                                <input type="text" class="form-control" name="unit"
                                       placeholder="Enter unit here">
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
