@if(auth()->user()->id)
@foreach($users as $user)
<tr>
	<td>{{ $loop->index + 1 }}</td>
	<td>{{ $user->last_name . ', '. $user->first_name}}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>
        @foreach($outlets as $outlet)
        {{ $user->outlet_id == $outlet->_id ? $outlet->branch_name : '' }}
        @endforeach
    </td>
    <td>
      @foreach($user->roles as $role)
      {{ $role->name }}
      @endforeach
  </td>
  <td>{{ $user->created_at->diffForHumans() }}</td>
  <td>
   
    <button class="btn btn-primary update" data-toggle="modal" data-target="#UserModalCenter" data-userfn="{{ $user->first_name }}" data-userln="{{ $user->last_name }}" data-useremail="{{ $user->email }}" data-userphone="{{ $user->phone }}" @foreach($outlets as $outlet) data-userrole="{{ $user->outlet_id == $outlet->_id ? 'selected' : '' }}" @endforeach data-userid="{{ $user->_id }}">Update</button>   
     
  </td>
  <td>
      <a href="#" class="legend-delete remove btn btn-danger"
      data-id="{{ $user->id }}">Delete
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
        let userfn = button.data('userfn');
        let userln = button.data('userln');
        let useremail = button.data('useremail');
        let userphone = button.data('userphone');
        let userid = button.data('userid');
        
        let modal = $(document);
        console.log(modal);
        modal.find('.user #userfn').val(userfn);
        modal.find('.user #userln').val(userln);
        modal.find('.user #userphone').val(userphone);
        modal.find('.user #useremail').val(useremail);
        modal.find('.user #userid').val(userid);

    })
</script>
{{-- DELETE FUNCTION FOR JAVASCRIPT --}}
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
                	'url': "delete/user/" + id,
                	'type': 'DELETE',
                	headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {

                }).fail(function() {
                	window.location = '{{ route('user.index') }}';
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
@endif