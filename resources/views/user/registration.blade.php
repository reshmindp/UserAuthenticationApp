@extends('includes.common')
@section('title','User Registration')
@section('content')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
            
                        <div style="float: right">
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                           
                        </div>
                        <br>
                        <div>
                            <span>Already Registed? <a href="{{route('user.login.page')}}">Login Here</a></span>
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
                      var firstname = $('#product_id').find(":selected").val();
                      var lastname  = $("#quantity").val();
                      var email     = $('#product_id option:selected').data('amount');
                      
                      $.ajax({
                      type: "POST",
                      dataType:"json",
                      url: "{{route('user.register')}}",
                      data:{product_id: product, 
                        quantity: quantity,
                        amount: amount,
                        _token: '{{csrf_token()}}'},
                      success: function(data)
                      {
                          if(data.message=='success')
                          {
                            alert("Product added to cart");
                            $("#order_total").html(data.total);
                            $("#hid_order_total").val(data.total);
  
                          }
                          else
                          {
                            alert('Error occured');
                              //  $("#id").html("Number not registered with us");
                              
                            }
                      }
                      });    
                  });
              });
  
      </script>
        
    @endpush
    @endsection

    