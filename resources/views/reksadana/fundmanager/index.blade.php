@extends('layouts.admin')

@section('title', "Startek - Fund Manager")

@push('addon-style')
<link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ url('css/toastr.min.css')}}">    
@endpush

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Table Fund Manager</h1>
      <a href="{{ url('/rdct_fundmanagers/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
      </a>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Fund Code</th>
                <th>Fund Manager</th>
                <th>Currency</th>
                <th>Paid By</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rdct_fundmanagers as $fundmanager)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $fundmanager->id }}</td>
                  <td>{{ $fundmanager->fund_manager }}</td>
                  <td>{{ $fundmanager->currency }}</td>
                  <td>{{ $fundmanager->paid_by }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-info" href="/rdct_fundmanagers/{{ $fundmanager->id }}">
                        <!-- <i class="fa fa-search"></i> -->Detail
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->
@endsection

@push('addon-script')
<!-- DataTables JavaScript-->
<script src="{{ url('backend/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('backend/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/datatables/datatables-demo.js') }}"></script>

{{-- TOASTR --}}
<script src="{{ url('js/toastr.min.js')}}"></script>
<script>
  @if (session('sukses'))
    toastr.success("{{ Session::get('sukses') }}")
  @endif
  @if (session('failed'))
    toastr.error("{{ Session::get('failed') }}")
  @endif
  @if (session('hapus'))
    toastr.success("{{ Session::get('hapus') }}")
  @endif
</script>
@endpush