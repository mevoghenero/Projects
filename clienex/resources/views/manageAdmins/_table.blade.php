@foreach($admins as $admin)
@if($admin->status ==  2)
<tr>
	<td>{{ $loop->index + 1 }}</td>
	<td>{{ $admin->first_name }}</td>
	<td>{{ $admin->email }}</td>
	<td>
		@foreach($admin->roles as $role)
		{{ $role->name }}
		@endforeach
	</td>
	<td>{{ $admin->created_at->diffForHumans() }}</td>
	<td><a class="btn btn-primary" href="{{ route('company.edit', $admin->id) }}">Edit</a></td>
	<td>
		<a href="#" class="legend-delete remove btn btn-danger"
		data-id="{{ $admin->id }}">Delete
	</a>
</td>
</tr>
@endif

{{-- DELETE FUNCTION FOR JAVASCRIPT --}}
@section('footer_js')
<script>
	let table = $('.Legendary');
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
    	text: "Once deleted, you can't recover this user!",
    	icon: "warning",
    	buttons: true,
    	dangerMode: true,
    })
    .then((willDelete) => {
    	if (willDelete) {
    		swal("Poof! User has been deleted!", {
    			icon: "success",
    			timer: 10000,
    		}).then(function() {
                //ajax request
                $.ajax({
                	'url': "/admin/delete/" + id,
                	'type': 'DELETE',
                	headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {

                }).fail(function() {
                	window.location = '{{ route('company.index') }}';
                });

            });
            // e.preventDefault();
        } else {
        	swal("User is safe!", {
        		icon: "error",
        	});
        }
    });
    
});
}); 
</script>
@stop
@endforeach