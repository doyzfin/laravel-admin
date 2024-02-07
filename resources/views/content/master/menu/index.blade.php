@extends('layouts/contentNavbarLayout')

@section('title', 'Master Menu')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  //message with toastr
  @if(session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');

  @elseif(session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');

  @endif
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Master /</span> Menu
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">
        <span>List Menu</span>
        <a href="{{url('/master/menu/create')}}" class="btn  btn-primary float-end">TAMBAH MENU</a>
      </h5>
      <div class="card-body">
        <table class="datatables-menu table">
         <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
          <tbody>
            @forelse ($menus as $menu )
            <tr>
              <td>{{$menu->id}}</td>
              <td>{{ $menu->title }}</td>
              <td>{!! $menu->desc !!}</td>
              <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deleteMenu', $menu->id) }}" method="POST">
                  {{-- <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
              </form>
              </td>
          </tr>
            @empty
<tr>
  <td colspan="4" class="text-center">
    Data Tidak Ada
  </td>
</tr>
            @endforelse

          </tbody>


        </table>
      </div>
    </div>
  </div>

</div>
@endsection
