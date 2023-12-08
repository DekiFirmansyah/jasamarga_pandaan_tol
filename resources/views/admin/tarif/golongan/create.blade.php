@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Add Golongan Kendaraan</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tarif.index') }}">Tarif Tol</a></li>
        <li class="breadcrumb-item active">Create Golongan Kendaraan</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Add Golongan Kendaraan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('golongan.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Golongan Kendaraan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Input Golongan Kendaraan">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection