@extends('includes.common')
@section('title','User Registration')
@section('content')
@push('custom-css')
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
  margin-bottom: 20px;  
}
</style>
@endpush
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Login</h2>
            </div>
            <div class="card-body">
            <h5 class="center" style="width: 40%">QR Code for {{ $user_info->email }}</h5>
            
            <div class="center">{!! $qrCode !!}</div>

            <form action="{{ route('user.qrcode.download', ['email' => $user_info->email]) }}" method="POST">
                @csrf
                <button class="btn btn--radius-2 btn--red center" type="submit">Download QR</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
