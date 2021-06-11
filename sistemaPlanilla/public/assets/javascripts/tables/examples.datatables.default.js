

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable();

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('table.mostrar').dataTable();

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);