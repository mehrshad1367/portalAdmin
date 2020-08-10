$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//--------------------------active btn--------------------------
$('#inputProfileImg').on('change',function(){
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next('.custom-file-label').html(fileName);
})
//as
// Add active class to the current button (highlight it)
var header = document.getElementById("myActive");
var btns = header.getElementsByClassName("nav-link");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
  });
}

//--------------------------calender--------------------------
function insert_Event(){
  var Title = $('#event-register-form #title').val();
  var Start = $('#event-register-form #start').val();
  var End = $('#event-register-form #end').val();

  if (Title =='' || Start =='' || End ==''){
    $('#blank_message').html('Please Fill in the Blanks');
  }else{
    $.ajax({
      location:'calender',
      url: 'calender/create',
      method:'Post',
      datatype:'json',
      data:{title:Title, start:Start, end:End},
      success: function (response) {

        $('#event-register-form').trigger("reset");
        $('#AddEvent').modal('hide');
      }
    })
  }
}
