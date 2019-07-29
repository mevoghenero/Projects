@extends('layouts.app')

@section('header_css')
<!-- animation css -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/animation/css/animate.min.css') }}">
@stop
@section('content')
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<!-- [ breadcrumb ] start -->
				{{-- <div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
									<li class="breadcrumb-item"><a href="#!">outlets</a></li>
									<li class="breadcrumb-item"><a href="#!">list</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> --}}
				<!-- [ breadcrumb ] end -->

				{{-- Flash Message --}}
				@include('messages.flash')

				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							<!-- [ task-board ] start -->
							<div class="col-xl-5 col-lg-12">
								<div class="card task-board-left">
									<div class="card-header">
										<h5>Sales</h5>
									</div>
									
									{{--  --}}
									@include('inventories.sales')
									{{--  --}}

								</div>
							</div>
							<div class="col-xl-7 col-lg-12 filter-bar">
								<nav class="card task-board-left ">
									<div class="card-header ">
										<h5>Products</h5>
									</div>
								</nav>
								<div class="row">
									@include('inventories.product')

								</div>
							</div>
							<!-- [ task-board ] end -->
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>

	

	@stop
	@section('footer_js')
	{{-- testing --}}
	<script>
		$(document).on('click', '.additems', function(event) {
				//console.log(event.target);

				//Get data from table
				var row = $(this).closest("tr");
				//console.log(row);
				var name = row.find("td").eq(0).text().trim();
				var qty = row.find(".qty").val();
				var price = row.find("td").eq(2).text().trim();
				
            // update qty if product is already present
            for (var i in cart) {
            	if(cart[i].Product == name)
            	{
            		cart[i].Qty = qty;
            		showCart();
            		saveCart();
            		return;
            	}
            }
            // create JavaScript Object
            var item = { Product: name,  Price: price, Qty: qty }; 
            //console.log(item);
            cart.push(item);
            saveCart();
            showCart();

            // Store it.
            // localStorage.setItem("cart",JSON.stringify(cart));
        });

		var cart = [];
		$(function () {
			if (localStorage.cart)
			{
				cart = JSON.parse(localStorage.cart);
				showCart();
			}
		});

		function deleteItem(index){
            cart.splice(index,1); // delete item at index
            showCart();
            saveCart();
        }

        //Save data to localstorage
        function saveCart() {
        	if ( window.localStorage)
        	{
        		localStorage.cart = JSON.stringify(cart);
        	}
        }

        function showCart() {
        	if (cart.length == 0) {
        		$("#cart").css("visibility", "hidden");
        		return;
        	}

        	$("#cart").css("visibility", "visible");
        	$("#cartBody").empty();
        	for (var i in cart) {
        		var item = cart[i];

        		let Product =  item.Product;
        		let Price = item.Price;
        		let Qty = item.Qty;

        		let model = $("#carttable");

        		let p = model.append('#cartBod #Product').text(Product);
        		let pr = model.find('#cartBod #Price').text(Price);
        		let q = model.find('#cartBod #Qty').text(Qty);


        		console.log(p);
        		// console.log(model.Price);
        		// console.log(model.Qty);
        		// var row = "<tr><td>" + item.Product + "</td><td>" +
        		// item.Price + "</td><td>" + item.Qty + "</td><td>"
        		// + item.Qty * item.Price + "</td><td>"
        		// + "<button onclick='deleteItem(" + i + ")'>Delete</button></td></tr>";
        		// $("#cartBody").append(row);
        	}
        }

    </script>

    <script>
    // print button
    function printData() {
    	var divToPrint = document.getElementById("printTable");
    	newWin = window.open("");
    	newWin.document.write(divToPrint.outerHTML);
    	newWin.print();
    	newWin.close();
    }

    $('.btn-print-invoice').on('click', function() {
    	printData();
    })

</script>
<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
@stop