(function($){

	'use strict';

	$(document).ready(function() {

	    $('body').on('change', '.upload-form .files-data', function(e){

	        e.preventDefault;
	        $(this).attr('disabled', true);
	        $('.btn-upload').attr('disabled', true);

	        var fd = new FormData();
	        var files_data = $('.upload-form .files-data');
	       
	        $.each($(files_data), function(i, obj) {

	            $.each(obj.files,function(j,file){

	                fd.append('files[' + j + ']', file);
	            })
	        });
	       	
	       	fd.append('upfiles_js_nonce', upfiles_js.upfiles_js_nonce);
	        fd.append('action', 'upload_files');

	        $.ajax({
	            type: 'POST',
	            url: upfiles_js.xhr_url,
	            data: fd,
	            contentType: false,
	            processData: false,
	            success: function(response){

	                $('.upload-response').html(response);
	                $('.upload-form .files-data').attr('disabled', false);
	        		$('.btn-upload').attr('disabled', false);
	            }
	        });
	    });

	    $('body').on('click', '.upload-form .btn-upload', function(e){

	        
	    });
	});

})(jQuery);
