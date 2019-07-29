@if($outlet->organisation_id == $orgs->_id)
<div class="col-md-6 col-sm-12">
    <div class="card card-border-c-blue">
        <div class="card-header">
            <a href="#!" class="text-secondary"> {{ $outlet->branch_name }} </a>
            <span class="label label-primary float-right"> {{ $outlet->created_at->diffForHumans() }} </span>
        </div>
        <div class="card-block card-task">
            <div class="col-md-12">
                <div style="margin-top: -20px;" class="card-header">
                    <h5>Account ID: {{ $outlet->account_no }}</h5>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12">
                        <h6 class="f-w-300 d-flex align-items-center float-left">Phone: {{ $outlet->phone }}</h6>
                    </div><br><br>
                    <div class="col-12">
                        <h6 class="f-w-300 d-flex align-items-center float-left">Address: {{ $outlet->address }}</h6>
                    </div><br><br>
                    <div class="col-6">
                        <h6 class="f-w-300 d-flex  align-items-center float-left">
                            City: {{ $outlet->city }}</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="f-w-300 d-flex  align-items-center float-right">
                                State: {{ $outlet->state }}</h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                   {{--  <div class="float-left task-board">
                   </div> --}}
                   <div class="task-board">
                     <div class="dropdown-secondary dropdown">

                        {{-- @if(auth()->user()->load('outlet')) --}}
                        {{-- @foreach($outlets->user as $user) --}}
                        <a href="{{ route('product.index', $outlet->id ) }}" 
                            class="legend-delete remove btn btn-primary"
                            data-id="">view</a>
                            {{-- @endforeach --}}
                            {{-- @endif --}}

                        </div>

                        <div class="dropdown-secondary editoutlet dropdown">
                            <button type="button" class="btn update btn-primary" 
                            data-outlet_phone="{{ $outlet->phone }}" data-outlet_id="{{ $outlet->_id }}" data-outlet_name="{{ $outlet->branch_name }}" data-outlet_city="{{ $outlet->city }}" data-outlet_state="{{ $outlet->state }}" data-outlet_address="{{ $outlet->address }}" data-toggle="modal" 
                            data-target="#updateModalCenter">Update</button>
                            {{-- <button class="btn btn-primary btn-sm">Update</button> --}}
                        </div>
                        <div class="dropdown-secondary dropdown Legendary">
                            <a href="#" 
                            class="legend-delete remove btn btn-danger"
                            data-id="{{ $outlet->id }}">Remove
                        </a href="#">
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @endif



    @section('footer_js')
    {{-- JAVASCRIPT FOR UPDATE --}}
    <script>
        $(document).on('click', '.update', function(event) {
            console.log(event.target);

        //Listing to event
        let button = $(event.target)
        
        //binding the event to data method
        let outlet_name = button.data('outlet_name');
        let outlet_id = button.data('outlet_id');
        let outlet_phone = button.data('outlet_phone');
        let outlet_city = button.data('outlet_city');
        let outlet_state = button.data('outlet_state');
        let outlet_address = button.data('outlet_address');
        
        let modal = $(document);
        console.log(modal);
        modal.find('.outlet #outlet_name').val(outlet_name);
        modal.find('.outlet #outlet_id').val(outlet_id);
        modal.find('.outlet #outlet_phone').val(outlet_phone);
        modal.find('.outlet #outlet_city').val(outlet_city);
        modal.find('.outlet #outlet_state').val(outlet_state);
        modal.find('.outlet #outlet_address').val(outlet_address);

    })
</script>
<script>
    $(document).ready(function() {

  // handle delete button click
  $('.Legendary').on('click', '.legend-delete', function(e) {
    e.preventDefault();

    // get the id of the table
    let id = $(this).attr('data-id');
    console.log(id);
    // get csrf token value
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: "Are you sure?",
        text: "Once deleted, you can't recover this Product!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Product has been deleted!", {
                icon: "success",
                timer: 10000,

            }).then(function() {
                // ajax request
                $.ajax({
                    'url': "/delete/outlet/" + id,
                    'type': 'DELETE',
                    headers: { 'X-CSRF-TOKEN': csrf_token }

                }).then(function() {


                }).fail(function() {
                    window.location = '';
                });

            });
            // e.preventDefault();
        } else {
            swal("Product is safe!", {
                icon: "error",
            });
        }
    });
    
});
}); 
</script>
@stop
