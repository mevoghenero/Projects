<script type="text/javascript">
	'use strict';
	window.addEventListener('load', function(event) {
		@if(session()->has('success'))
		swal("Good job!", "{{ session()->get('success') }}", "success");
		@endif
	})
</script>

<script type="text/javascript">
	'use strict';
	window.addEventListener('load', function(event) {
		@if(session()->has('danger'))
		swal("Good job!", "{{ session()->get('danger') }}", "error");
		@endif
	})
</script>