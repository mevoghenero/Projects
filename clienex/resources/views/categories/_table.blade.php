
<tr>
	<td>#{{ $loop->index + 1 }}</td>
	<td>
		<span class="form-bar">{{ $cat->cat_name }}</span>
	</td>
	<td>
		<div class="form-group form-primary mb-0">
			<span class="form-bar">{{ $cat->created_at->diffForHumans() }}</span>
		</div>
	</td>


	<td class="">
		<a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
			<i class="fas fa-cog"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item md-trigger" data-modal="modal-7" data-cat_id="{{ $cat->_id }}" data-cat_name="{{ $cat->cat_name }}" href="#!"><i class="icofont icofont-attachment"></i>Update</a>
			<a class="dropdown-item legend-delete remove" href="#!" data-id="{{ $cat->id }}"><i class="icofont icofont-ui-edit"></i>Delete</a>
		</div>
	</td>
</tr>

@section('footer_js')
{{-- JAVASCRIPT FOR UPDATE --}}
<script type="text/javascript">
	$(document).ready(function() {
		/* When click edit user */
		$(document).on('click', '.md-trigger', function(event) {
			console.log(event.target);

		//Listing to event
		let button = $(event.target)
		
		//binding the event to data method
		let name = button.data('cat_name');
		let cat_id = button.data('cat_id');
		
		let modal = $(document);
		console.log(modal);
		modal.find('#modal-body #cat_name').val(name);
		modal.find('#modal-body #cat_id').val(cat_id);

	});
	});
</script>

{{-- DELETE FUNCTION FOR JAVASCRIPT --}}
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
    	text: "Once deleted, you can't recover this Category!",
    	icon: "warning",
    	buttons: true,
    	dangerMode: true,
    })
    .then((willDelete) => {
    	if (willDelete) {
    		swal("Poof! Product Category has been deleted!", {
    			icon: "success",
    			timer: 10000,

    		}).then(function() {
                // ajax request
                $.ajax({
                	'url': "/delete/category/" + id,
                	'type': 'DELETE',
                	headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {


                }).fail(function() {
                	window.location = '';
                });

            });
            // e.preventDefault();
        } else {
        	swal("Category Type is safe!", {
        		icon: "error",
        	});
        }
    });
    
});
}); 
</script>
@stop