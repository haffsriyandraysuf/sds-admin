@extends('layouts.admin')

@section('title', "Startek - Create Price")

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Price Bank HSBC Indonesia</h1>
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
                                    <option value="{{ strtoupper($nama) }}">{{ strtoupper($nama) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_produk">Nama Produk</label>
                            <select class="form-control select2" id="sub_produk" name="sub_produk">
                                @foreach ($sub_produk as $sub_product => $sub_nama)
                                    <option value="{{ strtoupper($sub_nama) }}">{{ strtoupper($sub_nama) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material_printing">Material Printing</label>
                            <input type="text" class="form-control" id="material_printing" name="material_printing"
                                   placeholder="Material Printing">
                        </div>
                        <div class="form-group">
                            <label for="cost_printing">Cost Printing</label>
                            <input type=" text" class="form-control" id="cost_printing" name="cost_printing"
                                   placeholder="Cost Printing">
                        </div>
                        <div class="form-group">
                            <label for="material_inserting">Material Inserting</label>
                            <input type="text" class="form-control" id="material_inserting" name="material_inserting"
                                   placeholder="Material Inserting">
                        </div>
                        <div class="form-group">
                            <label for="cost_inserting">Cost Inserting</label>
                            <input type=" text" class="form-control" id="cost_inserting" name="cost_inserting"
                                   placeholder="Cost Inserting">
                        </div>
                        <div id="biaya">
                            <div class="form-group">
                                <label for="biaya_kertas">Biaya Kertas</label>
                                <input type="text" class="form-control" id="biaya_kertas" name="biaya_kertas"
                                       placeholder="Biaya Kertas">
                            </div>
                            <div class="form-group">
                                <label for="biaya_amplop">Biaya Amplop</label>
                                <input type=" text" class="form-control" id="biaya_amplop" name="biaya_amplop"
                                       placeholder="Biaya Amplop">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END OVERVIEW -->
    </div>
@stop

@push('addon-script')
<script>
    $(document).ready(function () {
      $('#biaya').hide();
      $('#produk').change(function() {
        var prod = $(this).val();
        if (prod == "REKSADANA") {
          $('#biaya').show({
            duration: 1000, // milliseconds
            easing: "swing",
          });
        } else {
          $('#biaya').hide({
            duration: 1000, // milliseconds
            easing: "swing",
          });
        }
      })
    });
</script>
@endpush
