// // confirm dialog function
// window.confirm_dialog = function($confirmation_title = '', $confirmation_html = '', $callback = '', $callback_param = []) {
//     // Confirmation Modal
//     var confirmation_modal = $('#confimartionModal')

//     confirmation_modal.find('#confimartionModalLabel').html($confirmation_title);
    
//     confirmation_modal.find('.modal-body').html($confirmation_html);

//     confirmation_modal.modal('show')
//     return true;
// }

// $(function a() {
//     $('.delete-data').click(function() {
//         var tr = $(this).closest('tr')
//         var name = tr.find('td:nth-child(2)').text()
//         confirm_dialog('<p style="color:blue; font-size:35px; text-align: center;  margin: auto;">Are you sure ?</p>', '<p>Are you sure to remove user<b> ' + name + '</b> ? </p> <br> <p>You won'+'t be able to revert this</p> ')
//     })
// })
