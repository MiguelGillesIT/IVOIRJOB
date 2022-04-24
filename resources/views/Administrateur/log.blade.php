@extends('layouts.Admin.base')

@section('Page_Title')
    LOGS
@endsection
@section('css_file')
    {{asset('assets/css/log.min.css')}}
@endsection

@section('ContentAdmin')
    <main id="main-container">
        <!-- Hero -->
        <div>
            <div class="content content-full">
            </div>
        </div>
        <!-- END Hero -->


        <!-- Page Content -->
        <div class="content ">
            <!-- Table Admins -->
            <h3 class="text-center">LOGS</h3>
            <div class="block block-rounded">
                <div class="block block-rounded">
                    <div class="block-content-full borderColorBottom tab-content">
                        <div class=" px-4  tab-pane active dataTables_wrapper dt-bootstrap4 no-footer" id="DataTables_Table_1_wrapper">

                            <div class = "row ">
                                <div class="table-responsive">
                                    <table class="js-dataTable-full dataTable no-footer table table-bordered table-striped table-vcenter" id = "DataTables_Table_1" role = "grid" aria-describedby = "DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting" style="width: 5%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="N°: activate to sort column descending">N°</th>
                                            <th class="sorting" style="width: 10%;"  tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="ID Utilisateur: activate to sort column ascending">ID Utilisateur</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Groupe Utilisateur: activate to sort column ascending">Groupe Utilisateur</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 10%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Adresse IP: activate to sort column ascending">Adresse IP</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Adresse MAC: activate to sort column ascending">Adresse MAC</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Date de création: activate to sort column ascending">Date de création</th>
                                            <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Date de Mise à jour: activate to sort column ascending">Date de Mise à jour</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Logs as $Log)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$Log->user_id}}</td>
                                                <td>{{$Log->groupe_id}}</td>
                                                <td>{{$Log->action}}</td>
                                                <td>{{$Log->userIpAddress}}</td>
                                                <td>{{$Log->userMacAddress}}</td>
                                                <td>{{$Log->created_at}}</td>
                                                <td>{{$Log->updated_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Table Admins End -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection