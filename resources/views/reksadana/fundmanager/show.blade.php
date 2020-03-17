@extends('layouts.admin')

@section('title', "Startek - Show Fund Manager")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Fund Manager</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="{{ url('/rdct_fundmanagers') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Manager Code</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $rdct_fundmanager->id }}">
            </div>
            <div class="form-group">
              <label for="fund_manager">Fund Manager</label>
              <input type="text" class="form-control" id="fund_manager" name="fund_manager" value="{{ $rdct_fundmanager->fund_manager }}">
            </div>
            <div class="form-group">
              <label for="currency">Currency</label>
              <input type="text" class="form-control" id="currency" name="currency" value="{{ $rdct_fundmanager->currency }}">
            </div>
            <div class="form-group">
              <label for="paid_by">Paid By</label>
              <input type="text" class="form-control" id="paid_by" name="paid_by" value="{{ $rdct_fundmanager->paid_by }}">
            </div>
          </div>
          <!-- /.box-body -->
        </form>
        <a class="btn btn-warning" href="/rdct_fundmanagers/{{ $rdct_fundmanager->id }}/edit">Edit</a>
        <a class="btn btn-danger" id="delete" href="#" fundmanager_id = "{{ $rdct_fundmanager->id }}">Delete</a>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->
@endsection

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
  $('#delete').click(function(){
    var id = $(this).attr('fundmanager_id');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/rdct_fundmanagers/"+id+"/delete";
      }
    });
  })
</script>
@endpush