// // jQuery( document ).ready(function() {
// //     alert('hi');
// // });
// jQuery( document ).ready(function() {
// 	var myJson=[];
// jQuery( "#new-tag-post_tag" ).autocomplete({
//       source: function( request, response ) {
// 				jQuery('.ui-autocomplete-loading').attr('style', "background:url('/clientscript/tag/loading.gif') no-repeat right center !important;");
// 				jQuery.ajax({
// 					type: 'POST',
// 					url: "/news/wp-admin/admin-ajax.php?action=ajax-tag-search&tax=post_tag&q="+request.term,					
// 					success: function( data ) {						
// 						myJson = jQuery.parseJSON(data);
// 						var choices = [];
// 						$.each(myJson.row, function (idx, tag) {
// 								jitem = {}
// 								jitem ["label"] = tag.display_name;
// 								jitem ["value"] = tag.tag_name;																	 
// 								choices.push(jitem);
// 						});
// 						$('.ui-autocomplete-input').attr('style', '');
// 						response(choices);
// 					}
// 				});
// 			},response: function(event, ui) {
// 				if (!ui.content.length) {
// 					var noResult = { value:"",label:"No results found" };
// 					ui.content.push(noResult);                
// 				}
// 			},
// 			select: function (event, ui) {
//  		$('#jsonObject').val(jsonObj.join(','));
// 		$('#jsonObject').val(JSON.stringify(jsonObj));
// }
//     });
// });



// jQuery( document ).ready(function() {
//     alert('hi');
// });
jQuery( document ).ready(function() {
	// var existing_tags = jQuery.parseJSON(C.responseXML.getElementsByTagName("existing_tags")[0].firstChild.nodeValue);
	// var existing_tags =jQuery.parseJSON('[{display_name": "Keerthi Estates","tag_name": "Keerthi Estates","url_name":"232_keerthi_estates","master_tag_name": "Developer","id": "131824"},{"display_name": "kanchan Estates","tag_name": "kanchan Estates","url_name": "232_keerthi_estates","master_tag_name": "Developer","id": "131825"}]');	
	var existing_tags =jQuery.parseJSON(jQuery('#existing_tags').val());	
	console.log(existing_tags); 
	// var existing_housing_ids = jQuery.parseJSON(C.responseXML.getElementsByTagName("existing_housing_ids")[0].firstChild.nodeValue);
	// $('#existing_housing_ids').val(JSON.stringify(existing_housing_ids));
	var myJson = existing_tags;
	// var myJson;
	var assignedTags = [];
	var jsonObj = [];
	jQuery('#singleFieldTags').tagit( {
		requireAutocomplete: true,
		// singleFieldDelimiter:";",
		allowSpaces: true,
		tagLimit:25,
		autocomplete: { 
			source: function( request, response ) {
				// jQuery('.ui-autocomplete-loading').attr('style', "background:url('/clientscript/tag/loading.gif') no-repeat right center !important;");
				jQuery.ajax({
					type: 'POST',
					url: "/news/wp-admin/admin-ajax.php?action=ajax-tag-search&tax=post_tag&q="+request.term,					
					success: function( data ) {
						// response(data);
						myJson = jQuery.parseJSON(data);
						var choices = [];						
						jQuery.each(myJson, function (idx, tag) {
							jitem = {}
							jitem ["label"] = tag.display_name;
							jitem ["value"] = tag.tag_name;																	 
							choices.push(jitem);
						});
						// jQuery('.ui-autocomplete-input').attr('style', '');						
						response(choices);
					}
				});
			},response: function(event, ui) {
				if (!ui.content.length) {
					var noResult = { value:"",label:"No results found" };
					ui.content.push(noResult);
				}
			}
		},
		beforeTagAdded: function(event, ui){
							//get id for that tag and signal if it was in the tagSource list
							var id, result = false;
							if(myJson!=undefined){
							jQuery.each(myJson, function(){																
								if(ui.tagLabel === this.tag_name){									
									result = true;
									// id=this.id;
									id=(this.housing_tag_id==undefined)?this.id:this.housing_tag_id;
									// alert(id);
									housing_tag_id = id;
									tag_name=this.tag_name;
									display_name=this.display_name;
									url_name=this.url_name;
									master_tag_name=this.master_tag_name;
									return false;
								}
							});
							}
							if(result){								
								var item1 = {};
								item1 ["id"] = id;
								item1 ["housing_tag_id"] = id;
								item1 ["tag_name"] = tag_name;
								item1 ["display_name"] = display_name;
								item1 ["url_name"] = url_name;
								item1 ["master_tag_name"] = master_tag_name;
								jsonObj.push(item1);

								assignedTags.push(id);
							}
							return result;
						},
						afterTagAdded: function(event, ui){
							//replace the values in the single input field with the assigned ids
							jQuery('#jsonObject').val(jsonObj.join(','));
							jQuery('#jsonObject').val(JSON.stringify(jsonObj));
						},
						afterTagRemoved: function(event, ui){
							jQuery('#jsonObject').val(jsonObj.join(','));
							jQuery('#jsonObject').val(JSON.stringify(jsonObj));
						},
						beforeTagRemoved: function(event, ui){
							// var id;
							var tag_name;
							//get the id for the removed tag and signal if it was in the tagSource list
							jQuery.each(jsonObj, function(i, v) {
								if (v.tag_name == ui.tagLabel) {
									result = true;
									// id = this.id;
									tag_name=this.tag_name
									return false;
								}
							});
							if(result){
								//remove the unassigned tag's id from our list
								assignedTags = jQuery.grep(assignedTags, function(el){
									// return el != id;
									return el != tag_name;
								});

								jsonObj = jQuery.grep(jsonObj,function (item,index) { 
									// return item.id !=  id; 
									return item.tag_name!=tag_name;
								});
							}
						}
					});
	var items=[];
	jQuery.each(myJson.row,function(){
		jQuery('#singleFieldTags').tagit('createTag',this.tag_name);
	});
});