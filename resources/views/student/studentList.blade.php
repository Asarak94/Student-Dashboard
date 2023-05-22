@extends('backend.layouts.cms.sidebar')
@section('content')
    <style>
        #thumbwrap {
            position:relative;
        //margin:75px auto;
            width:40px; height:40px;
        }
        .thumb img {
            border:1px solid #000;
            margin:3px;
            float:left;
        }
        .thumb span {
            position:absolute;
            visibility:hidden;
        }
        .thumb:hover, .thumb:hover span {
            visibility:visible;
            top:0; left:250px;
            z-index:1;
        }
    </style>

    <div class="col-sm-15 body-back">
        <div class="col-sm-12 content-pad">
            <div class="col-sm-12 con-pad-main">
                <div class="row">
                    <div class="col-sm-4 col-xs-4 xs-prom-pad">
                        <h4 class="xs-center list_title qr-lbl">Registered Students</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive tbl-main-pad col-sm-offset-0 col-xs-10 col-xs-offset-1">
                        <table class="table table-striped datatable list_table" id="restaurants_table">
                            <thead>
                            <tr class="list_table_va">
                                <th>student Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Project Title</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Time Slot</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('#restaurants_table').DataTable({
                language: {
                    "sEmptyTable":     "No Data Available",
                    "sInfo":           " From _START_ to _END_",
                    "sInfoEmpty":      " From 0 to 0 ",
                    "sInfoFiltered":   "(_MAX_ Sorted out )",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "_MENU_ Show me",
                    "sLoadingRecords": "Loading Records...",
                    "sProcessing":     "processing...",
                    "sSearch":         "Search :",
                    "sZeroRecords":    "Zero Records.",
                    "oPaginate": {
                        "sFirst":    "First",
                        "sLast":     "Last",
                        "sNext":     "Next",
                        "sPrevious": "Previous"
                    },
                    "oAria": {
                        "sSortAscending":  ": Sort Ascending",
                        "sSortDescending": ": Sort Descending"
                    }
                },

                "columnDefs": [
                    {"className": "", "targets": "_all"}
                ],
                processing: true,
                serverSide: true,
                ajax :'{!! route('load_students') !!}',
                columns: [
                    {data: 'student_id', name: 'student_id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'project_title', name: 'project_title'},
                    {data: 'email', name: 'email'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'timeslot', name: 'timeslot'}
                ]
            });
        });

        $(document).on('click','.remove-btn',function() {

            if(confirm("are you sure")){
                return true;

            }else{
                return false;
            }


        });

    </script>

@endsection
