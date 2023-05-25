@extends('includes.common')
@section('title','User List')
@section('content')
@push('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap/main.css')}}">
@endpush
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w960">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">User List</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="tile">
                          <div class="tile-body">
                            <div class="table-responsive">
                              <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Profile Picture</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php 
                                  $i = 1;
                                  @endphp
                                  @foreach($users as $user)
                                  <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td align="center"> @if(!$user->profile_picture || !file_exists(public_path($user->profile_picture)))
                                        <img width="80" class="center" src="https://cdn.pixabay.com/photo/2017/02/23/13/05/avatar-2092113_1280.png">
                                        @else
                                        <img width="80" src="{{asset('public/'.$user->profile_picture)}}" >
                                        @endif
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
        </div>
    </div>

    @push('custom-js')
    <script type="text/javascript" src="{{asset('public/js/bootstrap/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/bootstrap/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @endpush

    @endsection

    