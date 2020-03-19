@extends('layouts.admin')

@section('title', "Master Template")

@push('addon-style')
<link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">    
@endpush

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Template Reksadana</h1>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Fund Manager</th>
                <th>Fund Name</th>
                <th>Fund Code</th>
                <th>Code</th>
                <th>Currency</th>
                <th>Paid by</th>
              </tr>
            </thead>
            <tbody>
            @foreach($rdct_fundnames as $rdct_fundname)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rdct_fundname->rdct_fundmanager->fund_manager }}</td>
                <td>
                  <a class="fund-name" href="/invoices/create/{{ $rdct_fundname->id }}">
                    {{ $rdct_fundname->fund_name }}
                  </a>
                </td>
                <td>{{ $rdct_fundname->id }}</td>
                <td>{{ $rdct_fundname->fn_code_old }}</td>
                <td>{{ $rdct_fundname->rdct_fundmanager->currency }}</td>
                <td>{{ $rdct_fundname->rdct_fundmanager->paid_by }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->
@stop

@push('addon-script')
<!-- DataTables JavaScript-->
<script src="{{ url('backend/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('backend/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/datatables/datatables-demo.js') }}"></script>
@endpush