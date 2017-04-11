$('todo-update-form ').click(function () {
    var form = $(this).parent();
    var checked = $(this).prop('checked');
  
    var completed = checked ? 1 : 0;

    $.ajax({
        url: $(form).attr('action'),
        data: {'_method': $("[name='_method']", form).val(), 'completed': completed},
        type: 'POST',
        success: function (res) {
            console.log(res);
        },
        error: function (res) {
            console.log(res);
        }
    });
     

    var displayClass = checked ? form.parent().addClass('completed') : form.parent().removeClass('completed');
});



$(document).ready(function () {

//    $('input').on('change', function () {
//        var todos_id = $(this).parent().data('todo-id');
//        var li = $(this).parent().parent();
////        var li = $(this).closest(".todo");
//        //ajax post request
//        $.post(
//                "/todo/check",
//                {todos_id: todos_id},
//                function (data) {
//                    //callback do ajax request
//                    if (data.status === true) {
//                           
//                       li.html("<span class='label label-success'>" + data.name + "</span>");
//                    }
//
//
//                }
//        );
//
//    });
});
