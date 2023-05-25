@extends('includes.common')
@section('title','User Registration')
@section('content')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" placeholder="Enter your registered email" type="email" name="email">
                                </div>
                            </div>
                        </div>
            
                        <div style="float: right">
                            <button class="btn btn--radius-2 btn--red" type="submit">Login</button>
                           
                        </div>
                        <br>
                        <div>
                            <span>Not Registed? <a href="{{url('/')}}">Register Here</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    