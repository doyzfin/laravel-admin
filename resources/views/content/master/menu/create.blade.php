@extends('layouts/contentNavbarLayout')

@section('title', 'Master Menu Create')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Master /  Menu </span><span>/ Create</span>
</h4>




        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('menusStore') }}"  method="POST" enctype="multipart/form-data">

                            @csrf


                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Title">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-5">
                                <label class="font-weight-bold">Desc</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" rows="5" placeholder="Masukkan Desc">{{ old('desc') }}</textarea>

                                <!-- error message untuk desc -->
                                @error('desc')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
<div class="float-end"><a href="{{url('/master/menu')}}"  class="btn btn-md btn-warning">BATAL</a>
  <button type="submit" class="btn btn-md btn-primary">SIMPAN</button></div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
