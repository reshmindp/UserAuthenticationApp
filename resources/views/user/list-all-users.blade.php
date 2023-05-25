@extends('includes.common')
@section('title','User List')
@section('content')
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
                                    <th>Actions</th>
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
                                    <td></td>
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
    <script type="text/javascript" src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @endpush

    @endsection

    