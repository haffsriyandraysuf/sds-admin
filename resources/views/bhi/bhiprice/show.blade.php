@extends('layouts.admin')

@section('title', "Startek - Show Price")

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Price Bank HSBC Indonesia</h1>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- form start -->
                <form role="form" action="{{ url('/bhi_prices') }}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="produk">Nama Produk</label>
                            <select class="form-control select2" id="produk" name="produk">
                                @foreach ($produk as $product => $nama)
                                    <option value="{{ strtoupper($nama) }}"
                                            @if ($bhi_price->produk == strtoupper($nama))selected @endif>{{ strtoupper($nama) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_produk">Nama Produk</label>
                            <select class="form-control select2" id="sub_produk" name="sub_produk">
                                @foreach ($sub_produk as $sub_product => $sub_nama)
                                    <option value="{{ strtoupper($sub_nama) }}"
                                            @if ($bhi_price->sub_produk == strtoupper($sub_nama))selected @endif>{{ strtoupper($sub_nama) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material_printing">Material Printing</label>
                            <input type="text" required class="form-control" id="material_printing"
                                   name="material_printing" value="{{ $bhi_price->material_printing }}">
                        </div>
                        <div class="form-group">
                            <label for="cost_printing">Cost Printing</label>
                            <input type=" text" required class="form-control" id="cost_printing" name="cost_printing"
                                   value="{{ $bhi_price->cost_printing }}">
                        </div>
                        <div class="form-group">
                            <label for="material_inserting">Material Inserting</label>
                            <input type="text" required class="form-control" id="material_inserting"
                                   name="material_inserting" value="{{ $bhi_price->material_inserting }}">
                        </div>
                        <div class="form-group">
                            <label for="cost_inserting">Cost Inserting</label>
                            <input type=" text" required class="form-control" id="cost_inserting" name="cost_inserting"
                                   value="{{ $bhi_price->cost_inserting }}">
                        </div>
                        <div id="biaya">
                            <div class="form-group">
                                <label for="biaya_kertas">Biaya Kertas</label>
                                <input type="text" required class="form-control" id="biaya_kertas" name="biaya_kertas"
                                       value="{{ $bhi_price->biaya_kertas }}">
                            </div>
                            <div class="form-group">
                                <label for="biaya_amplop">Biaya Amplop</label>
                                <input type=" text" required class="form-control" id="biaya_amplop" name="biaya_amplop"
                                       value="{{ $bhi_price->biaya_amplop }}">
                            </div>
                        </div>
                    </div>
                </form>
                <a class="btn btn-sm btn-warning" href="/bhi_prices/{{ $bhi_price->id }}/edit">Edit</a>
                <a class="btn btn-danger" id="delete" href="#" price_id = "{{ $bhi_price->id }}">Delete</a>
            </div>
        </div>
        <!-- END OVERVIEW -->
    </div>
@stop

@push('addon-script')
<script>
    $(document).ready(function () {
        if ($('#produk').val() != 'REKSADANA') {
            $('#biaya').hide({
                duration: 1000, // milliseconds
                easing: "swing",
            });
        } else {
            $('#biaya').show({
                duration: 1000, // milliseconds
                easing: "swing",
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
  $('#delete').click(function(){
    var id = $(this).attr('price_id');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/bhi_prices/"+id+"/delete";
      }
    });
  })
</script>
@endpush
