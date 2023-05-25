@extends('includes.common')
@section('title','User Registration')
@section('content')
@push('custom-css')
<style>
.listusers{margin-top: 50px;}   
.btn--green{text-decoration: none;} 
</style> 
@endpush
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('user.getlogin.info')}}">
                        @csrf
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" placeholder="Enter your registered email" type="text" name="email">
                                    {!!$errors->first('email', '<span style="color:red">* :message</span>')!!}
                                </div>
                            </div>
                        </div>
            
                        <div style="float: right">
                            <input class="btn btn--radius-2 btn--red" type="submit" value="Login">
                           
                        </div>
                        <br>
                        <div>
                            <span>Not Registed? <a href="{{url('/')}}">Click Here</a></span>
                        </div>
                        <div>
                            <div class="form-row listusers">
                                <div class="name"></div>
                                <div class="value">
                                    <div class="input-group">
                                        <a class="btn btn--radius-2 btn--green" href="{{route('user.list.all')}}">CLICK HERE TO LIST ALL USERS</a>
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('error'))
                            <div style="color: red;">
                            <strong>Alert! </strong>{{Session::get('error')}}</div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    