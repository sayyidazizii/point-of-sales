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
                            <h5 class="mb-0">Barang</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Barang baru</a>
                    </div>
                </div>
                <div class="card-body  pb-2">
                    <div class="table-responsive p-0">
                        <table id="dataTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th width="2%" style='text-align:center'>No</th>
                                    <th width="20%" style='text-align:center'>Nama Kategori Barang</th>
                                    <th width="20%" style='text-align:center'>Kode Barang</th>
                                    <th width="20%" style='text-align:center'>Nama Barang</th>
                                    <th width="10%" style='text-align:center'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td style='text-align:center'>{{ $no++ }}</td>
                                    <td>{{ $row->category->item_category_name }}</td>
                                    <td>{{ $row['item_code'] }}</td>
                                    <td>{{ $row['item_name'] }}</td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-white-shadow" href="{{ url('/item/edit-item/'.$row['item_id']) }}"> <i class="fas fa-edit text-warning"></i></a>
                                        <a type="button" class="btn btn-white-shadow" href="{{ url('/item/delete-item/'.$row['item_id']) }}"> <i class="cursor-pointer fas fa-trash text-danger"></i></a>
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