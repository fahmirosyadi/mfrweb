@extends('layouts/userlayout2')

@section('content')
    <div class="row">
    @foreach($ekstra as $row)
    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
          <img style="height: 200px" src="{{url('/storage/'.$row->foto)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$row->kegiatan}}</h5>
            <a href="#" class="btn btn-warning">Lihat Detail</a>
          </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection
      