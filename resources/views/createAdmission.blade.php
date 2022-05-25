@extends('layout.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<div class="container">
    <div class="col-sm-12 " >
        <div class="alert alert-success alert-dismissible fade show d-none" id="ssuccesMsg" role="alert">
            <span class="message"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    <div class="card text-center p-5 mt-5 mb-3"><h2>Admission Form</h2></div>
    <form class="row g-3" method="POST" enctype="multipart/form-data" action="{{ route('admission.store') }}" id="registerSubmit">
        @csrf
        <div class="col-md-6">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="full_name" id="fullname">
        </div>
        <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" name="address_1" id="inputAddress1" placeholder="1234 Main St">
        </div>
        <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" name="address_2" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="inputCity">
        </div>
        <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" name="state" class="form-select">
            <option>choose ..</option>
            <option>sindh</option>
            <option>Panjab</option>
            <option>Balochistan</option>
            <option>kheyber pukhton khawn</option>
        </select>
        </div>
        <div class="col-md-2">
        <label for="inputZip"  class="form-label">Zip</label>
        <input type="text" name="zip" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
        <div class="form-check">
            <input class="form-control"  type="file" id="profile_image" name="profile_image">
            <label class="form-label" for="profile_image">
            Insert your profile image
            </label>
        </div>
        <div class="col-12">
        <button type="submit" id="form_submit" class="btn btn-primary w-100" >Submit Form</button>
        </div>
    </form>
    <div><img id="userProfileImage" src="" width="100" alt=""></div>
        </div>
</div>
<script>
    // let $currentUrl = $(location).attr("pathname");
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#userProfileImage').attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
        }
    }
       $("#profile_image").change(function() {
           readURL(this);
       });


// $('#registerSubmit').on('submit',function(e){
//     e.preventDefault();
//     var fullname      = $('#fullname').val();
//     var email         = $('#email').val();
//     var inputAddress1 = $('#inputAddress1').val();
//     var inputAddress2 = $('#inputAddress2').val();
//     var inputCity     = $('#inputCity').val();
//     var inputState    = $('#inputState').val();
//     var inputZip      = $('#inputZip').val();
//     var profile_image = $('#profile_image').val();
//     $.ajax({
//       url: '{{ route("admission.store") }}',
//       type:"POST",
//       data:{
//         "_token": "{{ csrf_token() }}",
//         full_name:     fullname,
//         email:         email,
//         address_1:      inputAddress1,
//         address_2:      inputAddress2,
//         city:          inputCity,
//         state:         inputState,
//         zip:           inputZip,
//         profile_image: profile_image
//       },
//       success:function(response){
//         // $('#successMsg').show();
//         console.log(response);
//       },
//       error: function(response) {
//         console.log("Erorr => "+response);
//         // $('#nameErrorMsg').text(response.responseJSON.errors.name);
//         // $('#emailErrorMsg').text(response.responseJSON.errors.email);
//         // $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
//         // $('#messageErrorMsg').text(response.responseJSON.errors.message);
//       },
//     });

// });

    // $('#registerSubmit').submit(function(e){
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });

    //     let fullname      = $('#fullname').val();
    //     let email         = $('#email').val();
    //     let inputAddress1 = $('#inputAddress1').val();
    //     let inputAddress2 = $('#inputAddress2').val();
    //     let inputCity     = $('#inputCity').val();
    //     let inputState    = $('#inputState').val();
    //     let inputZip      = $('#inputZip').val();
    //     let profile_image = $('#profile_image').val();

    // $.ajax({
    //     url:'{{ route("admission.store") }}',
    //     type:'POST',
    //     data: {
    //         name:          fullname,
    //         email:         email,
    //         address1:      inputAddress1,
    //         address2:      inputAddress2,
    //         city:          inputCity,
    //         state:         inputState,
    //         zip:           inputZip,
    //         profile_image: profile_image
    //     },
    //     success: function(response) {
    //         $("#ssuccesMsg").removeClass('d-none');
    //         $(".message").text(response.success);
    //         $("#registerSubmit").find('input[type=text], input[type=email], select').val('');
    //     },
    //     // error: function (response) {
    //     //     console.log(response);
    //     //   }

    // })
    // })
</script>
@endsection
