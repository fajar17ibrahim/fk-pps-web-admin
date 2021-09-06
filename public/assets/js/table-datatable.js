$(function() {
	"use strict";
	
	
	    $(document).ready(function() {
			$('#example').DataTable();
		} );

		$(document).ready(function() {
			$('#report-value').DataTable();
		} );

		$(document).ready(function() {
			$('#table-attitude').DataTable();
		} );

		$(document).ready(function() {
			$('#table-attendance').DataTable();
		} );
		  
		$(document).ready(function() {
			$('#table-extrakurikuler').DataTable();
		} );

		$(document).ready(function() {
			$('#table-achievement').DataTable();
		} );
		  
		$(document).ready(function() {
			$('#table-homeroomnotes').DataTable();
		} );

		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	
	
	});