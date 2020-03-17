@extends('layouts.admin')

@section('title', "Startek - Show Fund Name")

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
      
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Fund Name</h1>
    </div>
    
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- form start -->
        <form role="form" action="{{ url('/rdct_fundnames') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="id">Fund Name Code</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $rdct_fundname->id }}">
            </div>
            <div class="form-group">
              <label for="fund_name">Fund Name</label>
              <input type="text" class="form-control" id="fund_name" name="fund_name" value="{{ $rdct_fundname->fund_name }}">
            </div>
            <div class="form-group">
              <label for="rdct_fundmanagers_id">Fund Manager Code</label>
              <select class="form-control select2" style="width: 100%;" name="rdct_fundmanagers_id">
                <option value="{{ $rdct_fundname->rdct_fundmanager->id }}">{{ $rdct_fundname->rdct_fundmanager->fund_manager }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="fn_code_old">Fund Code Old</label>
              <input type="text" class="form-control" id="fn_code_old" name="fn_code_old" value="{{ $rdct_fundname->fn_code_old }}">
            </div>
            <div class="form-group">
              <label for="addr1">Address 1</label>
              <input type="text" class="form-control" id="addr1" name="addr1" value="{{ $rdct_fundname->addr1 }}">
            </div>
            <div class="form-group">
              <label for="addr2">Address 2</label>
              <input type="text" class="form-control" id="addr2" name="addr2" value="{{ $rdct_fundname->addr2 }}">
            </div>
            <div class="form-group">
              <label for="addr3">Address 3</label>
              <input type="text" class="form-control" id="addr3" name="addr3" value="{{ $rdct_fundname->addr3 }}">
            </div>
            <div class="form-group">
              <label for="addr4">Address 4</label>
              <input type="text" class="form-control" id="addr4" name="addr4" value="{{ $rdct_fundname->addr4 }}">
            </div>
            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $rdct_fundname->npwp }}">
            </div>
          </div>
        </form>
        <a class="btn btn-warning" href="/rdct_fundnames/{{ $rdct_fundname->id }}/edit">Edit</a>
        <a class="btn btn-danger" id="delete" href="#" fundname_id = "{{ $rdct_fundname->id }}">Delete</a>
      </div>
    </div>
  <!-- END MAIN CONTENT -->
  </div>
@stop

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
  $('#delete').click(function(){
    var id = $(this).attr('fundname_id');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/rdct_fundnames/"+id+"/delete";
      }
    });
  })
</script>
@endpush