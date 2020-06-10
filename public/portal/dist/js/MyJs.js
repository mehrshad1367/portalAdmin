$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function openImageUpdateModal(_this)
{
  var record_id = $(_this).data('id');
  $('#UpdateProfileImage #btn_img').attr('data-var',record_id);
  $('#UpdateProfileImage').modal('show');
}

function updateImg(_this) {

  var ID = $(_this).attr('data-var');
  alert(ID);
  var avatar = $('#user-update-img #up_image').val();
  if (avatar == ''){
    $('#blank_UP_message').html('Please Fill in the Blanks');
  }else{
$.ajax({
  location: 'profile',
  url: '/profile/image/update',
  method: 'post',
  dataType: 'json',
  data: {id:ID,avatar:avatar},
  success: function (response) {
    location.reload();
  }

})
  }
}
