<div class="col-md-4 col-sm-12">
    <div class="card card-border-c-blue">
        <div class="card-header">
            <h6 class="text-center text-secondary">{{ $org->name }}</h6> 
        </div>
        <div class="card-block card-task">
            <div class="row">
                <div class="col-sm-12">
                    <p class="task-due"><strong> RC No : </strong><strong>{{ $org->reg_number }}</strong></p>
                    <p class="task-due"><strong> Email : </strong><strong>{{ $org->email }}</strong></p>
                    <p class="task-due"><strong> Created : </strong><strong class="label label-primary">{{ $org->created_at->diffForHumans() }}</strong></p>
                </div>
            </div>
            <hr>
            <div class="task-board">
                <div class="dropdown-secondary dropdown">
                    <a style="background-color: #04a9f5; border-color: #04a9f5;" class="btn btn-primary active btn-sm  b-none txt-muted" href="{{ route('outlet.index', $org->id) }}">View</a>
                </div>
                <div class="dropdown-secondary dropdown">
                    <a style="background-color: #04a9f5; border-color: #04a9f5;" class="btn btn-primary active btn-sm update  b-none txt-muted" data-toggle="modal" data-target="#OrgansModalCenter" data-orgname="{{ $org->name }}" data-orgnumber="{{ $org->reg_number }}" data-orgemail="{{ $org->email }}" data-orgdomain="{{ $org->subdomain }}" data-orgphone="{{ $org->phone_no }}"
                        data-orgid="{{ $org->_id }}">Update</a>
                </div>
                <div class="Legendary dropdown-secondary dropdown">
                    <button class="btn btn-danger btn-sm legend-delete remove" type="button" aria-haspopup="true" data-id="{{ $org->id }}" aria-expanded="false">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>



@section('footer_js')

{{-- JAVASCRIPT FOR UPDATE --}}
<script>
    $(document).on('click', '.update', function(event) {
        console.log(event.target);

        //Listing to event
        let button = $(event.target)
        
        //binding the event to data method
        let orgname = button.data('orgname');
        let orgnumber = button.data('orgnumber');
        let orgemail = button.data('orgemail');
        let orgdomain = button.data('orgdomain');
        let orgphone = button.data('orgphone');
        let orgid = button.data('orgid');
        
        let modal = $(document);
        console.log(modal);
        modal.find('.orgs #orgname').val(orgname);
        modal.find('.orgs #orgnumber').val(orgnumber);
        modal.find('.orgs #orgemail').val(orgemail);
        modal.find('.orgs #orgdomain').val(orgdomain);
        modal.find('.orgs #orgphone').val(orgphone);
        modal.find('.orgs #orgid').val(orgid);

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
        text: "Once deleted, you can't recover this Organisation!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Organisation has been deleted!", {
                icon: "success",
                timer: 10000,

            }).then(function() {
                // ajax request
                $.ajax({
                    'url': "organisations-delete/" + id,
                    'type': 'DELETE',
                    headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {


                }).fail(function() {
                    window.location = '{{ route('org.index') }}';
                });

            });
            // e.preventDefault();
        } else {
            swal("Organisation is safe!", {
                icon: "error",
            });
        }
    });
    
});
}); 
</script>
@stop


