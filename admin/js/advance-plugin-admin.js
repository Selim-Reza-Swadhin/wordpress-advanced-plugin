jQuery(function(){
	jQuery('#create-list-table').DataTable();
	jQuery('#create-list-table-shelf').DataTable();
	jQuery("#frm-id-book-shelf").validate({
		submitHandler: function(){
			let postdata = jQuery("#frm-id-book-shelf").serialize();
			 //console.log(postdata);

			postdata += "&action=admin_ajax_request&param=create_book_shelf";

			jQuery.post(ajaxurl,postdata,function(response){
				let data = jQuery.parseJSON(response);

				if(data.status == 1){

					alert(data.message);

					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			})
		}
	});

	jQuery(document).on("click","#btn-first-ajax",function(){
		let postdata = "action=admin_ajax_request&param=simple_first_ajax";
		jQuery.post(ajaxurl, postdata, function(response){
			console.log(response);
		})
	})

});



