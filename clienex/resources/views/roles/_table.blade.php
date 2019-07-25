@foreach($roles as $role)
<tr>
	<td>{{ $loop->index + 1 }}</td>
	<td>{{ $role->name }}</td>
	<td>{!! $role->description !!}</td>
	<td>{{ $role->created_at->diffForHumans() }}</td>
	<td>
        <button class="btn btn-primary update" data-toggle="modal" data-target="#OrgansModalCenter" data-rolename="{{ $role->name }}" data-roledes="{{ $role->description }}" data-roleid="{{ $role->_id }}">Update</button>
    </td>
    <td>
      <a href="#" 
      class="legend-delete remove btn btn-danger"
      data-id="{{ $role->id }}">Delete
  </a>
</td>
</tr>


@section('footer_js')
{{-- JAVASCRIPT FOR UPDATE --}}
<script>
    $(document).on('click', '.update', function(event) {
        console.log(event.target);

        //Listing to event
        let button = $(event.target)
        
        //binding the event to data method
        let rolename = button.data('rolename');
        let roledes = button.data('roledes');
        let roleid = button.data('roleid');
        
        let modal = $(document);
        console.log(modal);
        modal.find('.roles #rolename').val(rolename);
        modal.find('.roles #roledes').val(roledes);
        modal.find('.roles #roleid').val(roleid);

    })
</script>

{{-- DELETE FUNCTION FOR JAVASCRIPT --}}
<script>
$(document).ready(function() {

  // handle delete button click
  $(document).on('click', '.legend-delete', function(e) {
  	e.preventDefault();

    // get the id of the table
    let id = $(this).attr('data-id');

    // get csrf token value
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
    	title: "Are you sure?",
    	text: "Once deleted, you can't recover this Role!",
    	icon: "warning",
    	buttons: true,
    	dangerMode: true,
    })
    .then((willDelete) => {
    	if (willDelete) {
    		swal("Poof! Role has been deleted!", {
    			icon: "success",
    			timer: 10000,

    		}).then(function() {
                // ajax request
                $.ajax({
                	'url': "/delete/role/" + id,
                	'type': 'DELETE',
                	headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {


                }).fail(function() {
                	window.location = '{{ route('role.index') }}';
                });

            });
            // e.preventDefault();
        } else {
        	swal("Role is safe!", {
        		icon: "error",
        	});
        }
    });
    
});
}); 
</script>
@stop
@endforeach	