@extends('layouts.admin')

@section('title', "Startek - Fund Name")

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
      <a href="{{ url('/rdct_fundnames/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                <th>Fund Name</th>
                <th>Code</th>
                <th>NPWP</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rdct_fundnames as $fundname)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $fundname->id }}</td>
                <td>{{ $fundname->fund_name }}</td>
                <td>{{ $fundname->fn_code_old }}</td>
                <td>{{ $fundname->npwp }}</td>
                <td>
                  <a class="btn btn-sm btn-info" href="/rdct_fundnames/{{ $fundname->id }}">Detail</a>
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