@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
       
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-1">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Kategori</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Kategori Baru</a>
                    </div>
                </div>
                <div class="card-body  pb-2">
                    <div class="table-responsive p-0">
                        <table id="dataTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th width="2%" style='text-align:center'>No</th>
                                    <th width="10%" style='text-align:center'>Kode Kategori Barang</th>
                                    <th width="20%" style='text-align:center'>Nama Kategori Barang</th>
                                    <th width="10%" style='text-align:center'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td style='text-align:center'>{{ $no++ }}</td>
                                    <td>{{ $row['item_category_code'] }}</td>
                                    <td>{{ $row['item_category_name'] }}</td>
                                    <td class="">
                                        <a type="button" class="btn btn-outline-warning btn-sm" href="{{ url('/item-category/edit-category/'.$row['item_category_id']) }}">Edit</a>
                                        <a type="button" class="btn btn-outline-danger btn-sm" href="{{ url('/item-category/delete-category/'.$row['item_category_id']) }}">Hapus</a>
                                    </td>
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
 
@endsection