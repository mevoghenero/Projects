@foreach($products as $product) 
@if($product->outlet_id == $outlets->_id)
<tr>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $product->name }}</td>
    <td>
        @foreach($types as $type)
        {{ $product->type_id == $type->_id ? $type->name : '' }}
        @endforeach
    </td>
    <td>
        @foreach($product->category as $category)
        {{ $category->cat_name }}
        @endforeach
    </td>
    <td>{{ $product->qty }}</td>
    <td>N{{ $product->unit_sp }}</td>
    <td>N{{ $product->unit_cp }}</td>
    <td>N{{ $product->total_cp }}</td>
    <td>{{ $product->manufacturer }}</td>
    <td>{{ $product->ref_no }}</td>
    <td>{{ $product->manu_date }}</td>
    <td>{{ $product->expire_date }}</td>
    <td>
        {{ $product->created_at ? $product->created_at->diffForHumans() : '' }}
    </td>
    <td>
        <a class="pupdate" href="#" style="font-size: 20px; color: #038fcf"  data-toggle="modal" data-target="#productUpdate"><i data-pname="{{ $product->name }}" data-pqty="{{ $product->qty }}" data-punitcp="{{ $product->unit_cp }}" data-punitsp="{{ $product->unit_sp }}" data-pmanu="{{ $product->manufacturer }}" data-prefno="{{ $product->ref_no }}" data-pmdate="{{ $product->manu_date }}" data-pedate="{{ $product->expire_date }}" data-pid="{{ $product->_id }}" @foreach($types as $type) data-type="{{ $product->type_id == $type->_id ? $type->name : '' }}"
        @endforeach style="size: 50px" class="feather icon-edit-1"></i></a>
    </td>
    
    <td>
        <a href="#" 
        class="legend-delete remove" style="font-size: 20px; color: #f22012"
        data-id="{{ $product->id }}"><i class="feather icon-x-circle"></i>
    </a href="#" >

</td>
</tr>
@endif

@section('footer_js')
{{-- JAVASCRIPT FOR UPDATE --}}
<script>
    $(document).on('click', '.pupdate', function(event) {
        console.log(event.target);
        event.preventDefault();
        //Listing to event
        let button = $(event.target)
        
        //binding the event to data method
        let pname = button.data('pname');
        let pqty = button.data('pqty');
        let punitcp = button.data('punitcp');
        let punitsp = button.data('punitsp');
        let pmanu = button.data('pmanu');
        let prefno = button.data('prefno');
        let pmdate = button.data('pmdate');
        let pedate = button.data('pedate');
        let pid = button.data('pid');
        let ptype = button.data('type');
        
        let modal = $(document);
        console.log(modal);
        modal.find('.products #pname').val(pname);
        modal.find('.products #pqty').val(pqty);
        modal.find('.products #punitcp').val(punitcp);
        modal.find('.products #punitsp').val(punitsp);
        modal.find('.products #pmanu').val(pmanu);
        modal.find('.products #prefno').val(prefno);
        modal.find('.products #pmdate').val(pmdate);
        modal.find('.products .pedate').val(pedate);
        modal.find('.products #pid').val(pid);
        modal.find('.products #ptype').val(ptype);

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
                    'url': "/delete/product/" + id,
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
@endforeach

