@extends('includes.common')
@section('title','User Registration')
@section('content')
@push('custom-css')
<style>
    span {display: none;}
</style>
@endpush
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" onkeyup="clearvalidation('#name_validation')" id="first_name" name="first_name">
                                            <label class="label--desc">First Name <span id="name_validation" style="color: red;">* Required</span></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" onkeyup="clearvalidation('#last_name_validation')" id="last_name" name="last_name">
                                            <label class="label--desc">Last Name <span id="last_name_validation" style="color: red;">* Required</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" onkeyup="clearvalidation('#email_validation')" type="email" id="email" name="email">
                                    <span id="email_validation" style="color: red;">* Valid Email Required</span>
                                </div>
                            </div>
                        </div>
            
                        <div style="float: right">
                            <button id="register-user" class="btn btn--radius-2 btn--red" type="button">Register</button>
                        </div>
                        <br>
                        <div>
                            <div>Already Registed? <a href="{{route('user.login.page')}}">Login Here</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('custom-js')

    <script>
        $(document).ready(function () {
            $("#register-user").click(function () 
            {                  
                var firstname = $('#first_name').val();
                var lastname  = $("#last_name").val();
                var email     = $('#email').val();

                    if(firstname.trim().length==0)
                    {
                        $("#name_validation").css("display","inline-block");

                        return false;

                    }

                    else if(lastname.trim().length==0)
                    {
                        $("#last_name_validation").css("display","inline-block");

                        return false;
                    }

                    else if(email.trim().length==0 || IsEmail(email)==false)
                    {
                        $("#email_validation").css("display","inline-block");
                        
                        return false;
                        
                    }

                    else
                    {
                        $.ajax({
                        type: "POST",
                        dataType:"json",
                        url: "{{route('user.register')}}",
                        data:{name: firstname, 
                        lastname: lastname,
                        email: email,
                        _token: '{{csrf_token()}}'},
                        success: function(data)
                        {
                           
                            if(data.status=='success')
                            {
                                alert("Registration Success");
                                location.reload();
                            }
                            else
                            {
                                console.log(data.message);
                                $("#email_validation").css("display","inline-block");
                                $('#email_validation').html('* '+data.message);
                                return false;
                                
                            }
                        }
                        });  
                    }  
                  });
              });

              function clearvalidation(id)
              {
                $(id).css("display","none");

              }

              function IsEmail(email) 
              {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) 
                {
                    return false;
                }
                else
                {
                    return true;
                }
             }
  
      </script>
        
    @endpush
    @endsection

    