@extends('includes.common')
@section('title','User Profile')
@section('content')
@push('custom-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    span {display: none;}
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
                    <h2 class="title">Profile</h2>
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
                                            <input class="input--style-5" type="text" onkeyup="clearvalidation('#name_validation')" placeholder="Enter first name" value="{{$userInfo->name}}" id="first_name" name="first_name">
                                            <label class="label--desc">First Name <span id="name_validation" style="color: red;">* Required</span></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" onkeyup="clearvalidation('#last_name_validation')" placeholder="Enter last name" value="{{$userInfo->lastname}}" id="last_name" name="last_name">
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
                                    <input class="input--style-5" onkeyup="clearvalidation('#email_validation')" type="text" readonly value="{{$userInfo->email}}" placeholder="Enter email id" id="email" name="email">
                                    <span id="email_validation" style="color: red;">* Valid Email Required</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Profile Picture </div>
                            <div class="value">
                                <div class="input-group">
                                    @if(!$userInfo->profile_picture || !file_exists(public_path($userInfo->profile_picture)))
                                   <img class="center" src="https://cdn.pixabay.com/photo/2017/02/23/13/05/avatar-2092113_1280.png">
                                   @else
                                   <img class="center" src="{{asset('public/'.$userInfo->profile_picture)}}">
                                   @endif
                                   <input class="input--style-5" type="file">
                                </div>
                            </div>
                            <input type="hidden" id="old_profile_picture" name="old_profile_picture" @if($userInfo->profile_picture) value="{{$userInfo->profile_picture}}" @else value="" @endif >
                        </div>
            
                        <div style="float: right">
                            <button id="update-user" class="btn btn--radius-2 btn--red" type="button">Update</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('custom-js')

    <script>
        $(document).ready(function () {
            $("#update-user").click(function () 
            {                  
                var firstname = $('#first_name').val();
                var lastname  = $("#last_name").val();
                var email     = $('#email').val();
                var image     = $('#profile_picture').val(); 

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

                    else
                    {
                        $.ajax({
                        type: "POST",
                        dataType:"json",
                        url: "{{route('user.update.profile')}}",
                        data:{name: firstname, 
                        lastname: lastname,
                        email: email,
                        profile_picture: image,
                        user_id: $.urlParam('userId'),
                        _token: '{{csrf_token()}}'},
                        success: function(data)
                        {
                           
                            if(data.status=='success')
                            {
                                alert("Profile Updated");
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

            
              $('input[type=file]').change(function(e){
                profile = e.target.files[0];
                var formData = new FormData();
                formData.append('profile_picture', profile);
                formData.append('user_id', $.urlParam('userId'));
                formData.append('old_profile_picture', $("#old_profile_picture").val());

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                url: "{{route('user.update.profileimage')}}",
                headers: {
                    'X-CSRF-TOKEN': csrfToken 
                },
                success: function (response) {
                    if (response.success) {
                       alert('Image updated');

                    } else {
                        alert("Image upload failed");
                    }
                }
            });

        });

        $.urlParam = function(name)
        {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) 
            {
                return null;
            }
            return decodeURI(results[1]) || 0;
        }
  
      </script>
        
    @endpush
    @endsection

    