$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


function openModalForProfile(_this) {

  alert('kkkkkk');
  // var record_id = $(_this).data('id');
  // $('#UpdateModal #btn_update').attr('data-var',record_id);
  // $.ajax({
  //   url: 'employees/edit/'+ record_id,
  //   method:'get',
  //   success: function (result) {
  //     $('#UpdateModal #up_firstname').val(result.data.firstname);
  //     $('#UpdateModal #up_lasttname').val(result.data.lastname);
  //     $('#UpdateModal #up_department').val(result.data.department);
  //     $('#UpdateModal #up_phone').val(result.data.phone);     //*** data az controller oomade eynan
  //   }
  // })
  // $('#UpdateModal').modal('show');
 // // $(_this).attr('data-toggle', 'modal').attr('data-target', '#UpdateModal').trigger('click');
}

function edite_profile(_this)
{
  var ID = $(_this).attr('data-var');
  var FirstName = $('#user-update-form #up_firstname').val();
  var LastName = $('#user-update-form #up_lasttname').val();
  var Department = $('#user-update-form #up_department').val();
  var Phone = $('#user-update-form #up_phone').val();

  if (FirstName == '' || LastName == '' || Department == '' || Phone == '') {
    $('#blank_UP_message').html('Please Fill in the Blanks');
  } else {
    $.ajax({
      location: 'employees/update',
      url: 'employees/update',
      method: 'POST',
      dataType: 'json',
      data: {id:ID,firstname: FirstName, lastname: LastName, department: Department, phone: Phone},
      success: function (response) {
        location.reload();
      }
    })
  }
}
