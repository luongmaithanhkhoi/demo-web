<!DOCTYPE html>
	<html lang="en">
 
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Confirmation Modal/Dialog using PHP</title>
	    <link rel="stylesheet" href="./css/bootstrap.min.css">
	    <script src="./js/jquery-3.6.0.min.js"></script>
	    <script src="./js/bootstrap.min.js"></script>
	    <script src="./js/script.js"></script>
	    <!-- Custom CSS -->
	    <style>
 
	    </style>
	</head>
 
	<body class="bg-light">
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient" id="topNavBar">
	        <div class="container">
	            <a class="navbar-brand" href="https://sourcecodester.com">
	            Sourcecodester
	            </a>
	        </div>
	    </nav>
	    <div class="container py-3" id="page-container">
	        <small>How to create a dynamic confirmation dialog or modal using jQuery</small>
	        <hr>
	        <div id="printables">
	            <div class="to_print" id="first_element">
	                <h3><b>Dummy Data</b></h3>
	                <hr>
	                <button class="btn btn-sm btn-success float-end rounded-0 my-2" type="button" id="empty-table">Empty Table</button>
	                <table class="table table-bordered table-striped" id="dummy-tbl">
	                    <thead>
	                        <tr class="bg-primary bg-gradient text-white">
	                            <th class="text-capitalize text-center py-1 px-2">name</th>
	                            <th class="text-capitalize text-center py-1 px-2">phone</th>
	                            <th class="text-capitalize text-center py-1 px-2">email</th>
	                            <th class="text-capitalize text-center py-1 px-2">address</th>
	                            <th class="text-capitalize text-center py-1 px-2">region</th>
	                            <th class="text-capitalize text-center py-1 px-2">text</th>
	                            <th class="text-capitalize text-center py-1 px-2">action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr data-id="1">
	                            <td class="px-2 py-1">Caldwell Stewart</td>
	                            <td class="px-2 py-1">(723) 398-8511</td>
	                            <td class="px-2 py-1">sed.dolor.fusce@nulla.ca</td>
	                            <td class="px-2 py-1">Ap #499-3016 Tincidunt St.</td>
	                            <td class="px-2 py-1">Antwerpen</td>
	                            <td class="px-2 py-1">Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci,</td>
	                            <td class="px-2 py-1 text-center align-middle">
	                                <button class="btn btn-danger btn-sm rounded-0 delete-data" type="button">Delete</button>
	                            </td>
	                        </tr>
	                        <tr data-id="2">
	                            <td class="px-2 py-1">Jesse Serrano</td>
	                            <td class="px-2 py-1">(426) 346-7475</td>
	                            <td class="px-2 py-1">natoque@sed.edu</td>
	                            <td class="px-2 py-1">Ap #197-2368 Netus Rd.</td>
	                            <td class="px-2 py-1">Nordrhein-Westphalen</td>
	                            <td class="px-2 py-1">enim consequat purus. Maecenas libero est, congue a, aliquet vel,</td>
	                            <td class="px-2 py-1 text-center align-middle">
	                                <button class="btn btn-danger btn-sm rounded-0 delete-data" type="button">Delete</button>
	                            </td>
	                        </tr>
	                        <tr data-id="3">
	                            <td class="px-2 py-1">Shea Donovan</td>
	                            <td class="px-2 py-1">1-512-856-0720</td>
	                            <td class="px-2 py-1">ante@metusaliquam.edu</td>
	                            <td class="px-2 py-1">429-7540 Nulla. Avenue</td>
	                            <td class="px-2 py-1">British Columbia</td>
	                            <td class="px-2 py-1">lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse</td>
	                            <td class="px-2 py-1 text-center align-middle">
	                                <button class="btn btn-danger btn-sm rounded-0 delete-data" type="button">Delete</button>
	                            </td>
	                        </tr>
	                        <tr data-id="4">
	                            <td class="px-2 py-1">Joshua Malone</td>
	                            <td class="px-2 py-1">(784) 452-6346</td>
	                            <td class="px-2 py-1">sed.libero.proin@malesuadaut.edu</td>
	                            <td class="px-2 py-1">P.O. Box 461, 3954 Arcu. Street</td>
	                            <td class="px-2 py-1">Michoacán</td>
	                            <td class="px-2 py-1">laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi</td>
	                            <td class="px-2 py-1 text-center align-middle">
	                                <button class="btn btn-danger btn-sm rounded-0 delete-data" type="button">Delete</button>
	                            </td>
	                        </tr>
	                        <tr data-id="5">
	                            <td class="px-2 py-1">Basia Haynes</td>
	                            <td class="px-2 py-1">1-770-885-2056</td>
	                            <td class="px-2 py-1">nulla@inscelerisque.ca</td>
	                            <td class="px-2 py-1">Ap #187-2876 Phasellus Av.</td>
	                            <td class="px-2 py-1">Henegouwen</td>
	                            <td class="px-2 py-1">sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer</td>
	                            <td class="px-2 py-1 text-center align-middle">
	                                <button class="btn btn-danger btn-sm rounded-0 delete-data" type="button">Delete</button>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
 
	    <!-- Confirmation Modal -->
	    <div class="modal fade" id="confimartionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confimartionModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered rounded-0">
	            <div class="modal-content rounded-0">
	                <div class="modal-header py-1">
	                    <h5 class="modal-title" id="confimartionModalLabel"></h5>
	                    <button type="button" style="font-size: .65em;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                </div>
	                <div class="modal-body rounded-0">
 
	                </div>
	                <div class="modal-footer py-1 rounded-0">
	                    <button type="button" class="btn btn-primary btn-sm rounded-0 confirm-btn">Continue</button>
	                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</body>
 
</html>


<script>
    window.confirm_dialog = function($confirmation_title = '', $confirmation_html = '', $callback = '', $callback_param = []) {
    // Confirmation Modal
    var confirmation_modal = $('#confimartionModal')

    confirmation_modal.find('#confimartionModalLabel').html($confirmation_title);
    
    confirmation_modal.find('.modal-body').html($confirmation_html);

    confirmation_modal.modal('show')
    return true;
}
    $(function a() {
        $('.delete-data').click(function() {
            var tr = $(this).closest('tr')
            var name = tr.find('td:nth-child(2)').text()
            <?php
             $name = name;
             echo $name;
            ?>
            confirm_dialog('<p style="color:blue; font-size:35px; text-align: center;  margin: auto;">Are you sure ?</p>', '<p>Are you sure to remove user<b> ' + name + '</b> ? </p> <br> <p>You won'+'t be able to revert this</p> ')
        })
    })

</script>