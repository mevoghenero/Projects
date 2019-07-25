
<tr>
	<td>#{{ $loop->index + 1 }}</td>
	<td>
		<span class="form-bar">{{ $type->name }}</span>
	</td>
	<td>
		<div class="form-group form-primary mb-0">
			<span class="form-bar">{{ $type->created_at->diffForHumans() }}</span>
		</div>
	</td>


	<td class="">
		<a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
			<i class="fas fa-cog"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item md-trigger" data-modal="modal-7" data-typeid="{{ $type->id }}" data-myname="{{ $type->name }}" href="#!"><i class="icofont icofont-attachment"></i>Update</a>
			<a class="dropdown-item legend-delete remove" href="#!" data-id="{{ $type->id }}"><i class="icofont icofont-ui-edit"></i>Delete</a>
		</div>
	</td>
</tr>


{{-- DELETE FUNCTION FOR JAVASCRIPT --}}
@section('footer_js')
<script type="text/javascript">
	$(document).ready(function() {
		/* When click edit user */
		$(document).on('click', '.md-trigger', function(event) {
			console.log(event.target);

		//Listing to event
		let button = $(event.target)
		
		//binding the event to data method
		let name = button.data('myname');
		let typeid = button.data('typeid');
		
		let modal = $(document);
		console.log(modal);
		modal.find('#modal-body #name').val(name);
		modal.find('#modal-body #typeid').val(typeid);

	});
	});
</script>

<script>
	
	$(document).ready(function() {

  // handle delete button click
  $('table').on('click', '.legend-delete', function(e) {
  	e.preventDefault();

    // get the id of the table
    let id = $(this).attr('data-id');

    // get csrf token value
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
    	title: "Are you sure?",
    	text: "Once deleted, you can't recover this Product Type!",
    	icon: "warning",
    	buttons: true,
    	dangerMode: true,
    })
    .then((willDelete) => {
    	if (willDelete) {
    		swal("Poof! Product Type has been deleted!", {
    			icon: "success",
    			timer: 10000,

    		}).then(function() {
                // ajax request
                $.ajax({
                	'url': "/delete/type/" + id,
                	'type': 'DELETE',
                	headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {


                }).fail(function() {
                	window.location = '';
                });

            });
            // e.preventDefault();
        } else {
        	swal("Product Type is safe!", {
        		icon: "error",
        	});
        }
    });
    
});
}); 
</script>


@stop