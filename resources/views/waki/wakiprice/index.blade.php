@extends('layouts.admin')

@section('title', 'Startek - Price Label Waki')

@push('addon-style')
<link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">    
<link rel="stylesheet" href="{{ url('css/toastr.min.css')}}">
@endpush

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Table Price Label Waki</h1>
      <a href="{{ url('/waki_prices/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                <th>Price Material</th>
                <th>Cost Service</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($waki_prices as $price)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $price->price_material }}</td>
                <td>{{ $price->cost_service }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-info" href="/waki_prices/{{ $price->id }}">Detail</a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
  </div>
@stop

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