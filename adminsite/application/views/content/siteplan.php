<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/tagging/tagging.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/" + l.pathname.split('/')[2] + "/";
//     var counter = 0;
// 	alert(base_url);
    var mouseX = 0;
    var mouseY = 0;

    $("#imgtag img").click(function(e) { // make sure the image is click
      var imgtag = $(this).parent(); // get the div to append the tagging list
      mouseX = ( e.pageX - $(imgtag).offset().left ) - 50; // x and y axis
      mouseY = ( e.pageY - $(imgtag).offset().top ) - 50;
      $( '#tagit' ).remove(); // remove any tagit div first
      $( '#box' ).remove();
      $( imgtag ).append( '<div id="box"></div><div id="tagit"><div class="name"><div class="text"><strong>Isi data hunian:</strong></div>' +
    	      '<div><form name="newsite" id="newsite" ><input style="margin-bottom:10px; height: 100%;" type="file" class="form-control" id="img" name="ico"></div>'+
    	      '<div><input type="hidden" id="type" value="insert"><input type="text" class="form-control"  placeholder="Type Hunian" id="htype"></div>'+
    	      '<div><input type="hidden" id="gridx" value="'+mouseX+'"><input type="text" class="form-control"  placeholder="No Kavling" id="nokavling"></div>'+
    	      '<div><input type="hidden" id="gridy" value="'+mouseY+'"><input type="text" class="form-control"  placeholder="Luas Tanah" id="lt"></div>'+
    	      '<div><input type="text" class="form-control"  placeholder="Luas Bangunan" id="lb"></div>'+
    	      '<div><select  style="margin-bottom:10px; height: 100%;" class="selectpicker form-control" id="status">'+
				'<option value=""> Status </option>'+
				'<option value="0">Belum Terjual</option>'+
				'<option value="1">Terjual</option>'+
				'<option value="2">Ready Stock</option>'+
			  '</select></div>'+
    	      '<input type="button" name="btnsave" value="Save" id="btnsave" /><input type="button" name="btncancel" value="Cancel" id="btncancel" /></div></form></div>' );
      $( '#box' ).css({ top:mouseY+37.5, left:mouseX+37.5 });
      $( '#tagit' ).css({ top:mouseY, left:mouseX+100 });
      
//       $('#tagname').focus();
    });

	// Save button click - save tags
    $( document ).on( 'click',  '#tagit #btnsave', function(){
    	var form = new FormData($('#newsite')[0]);

    	var img = $('#imgtag').find( 'img' );
		var id = $( img ).attr( 'id' );
		
			gridx = $('#gridx').val();
			gridy = $('#gridy').val();
	      	htype = $('#htype').val();
	      	nokavling = $('#nokavling').val();
	      	lt = $('#lt').val();
	      	lb = $('#lb').val();
	      	status = $('#status').val();
	      	type = $('#type').val();
	      	sid = $('#sid').val();
    		form.append("gridx", gridx);
    		form.append("gridy", gridy);
    		form.append("housetype", htype);
    		form.append("nokav", nokavling);
    		form.append("lt", lt);
    		form.append("lb", lb);
    		form.append("status", status);
    		form.append("type", type);
    		form.append("picid", id);
    		form.append("sid", sid);
    		
	    $.ajax({
	        type: "POST", 
	        url: base_url + "siteplan/save", 
	        mimeType:"multipart/form-data",
	        contentType: false,
	        processData: false,
	        data: form,
	        cache: false, 
	        success: function(data){  
	        	  console.log(data);        
		          $('#tagit').fadeOut();
		          $('#box').fadeOut(); 
		          viewtag( id );         
	        }
	    });      
    });

	$("[id^='view_']").live("click", function(){
    	id = $(this).attr("id");
    	value = $(this).attr("value");
      	
    	$('#tagit').fadeOut();
        $('#box').fadeOut();
        $( '#tagit' ).remove(); // remove any tagit div first
        $( '#box' ).remove();

        var img = $('#imgtag').find( 'img' );
		var idm = $( img ).attr( 'id' );

        $.ajax({
			type: "POST",
			url: base_url + "siteplan/getone", 
			data: { id: value }
			}).done(function( msg ) {				
				jsonparsing = jQuery.parseJSON(msg);			
				$("#htype").val(jsonparsing.type);
				$("#nokavling").val(jsonparsing.nokav);
				$("#lb").val(jsonparsing.lb);
				$("#lt").val(jsonparsing.lt);
				$("#sid").val(jsonparsing.id);
				$("#gridx").val(jsonparsing.gridx);
				$("#gridy").val(jsonparsing.gridy);
				$("select[name='status']").val(jsonparsing.status);
				$("#imageup").attr("src",base_url + jsonparsing.img);
		});

        $("#"+id).append( '<div id="tagit" style="margin-left:50px;"><div class="name"><div class="text"><strong>Edit data hunian:</strong></div>' +
        		  '<div><img width=200 style="margin-bottom:10px;" src="" id="imageup" /></div>'+
        		  '<div><form name="newsite" id="newsite" ><input style="margin-bottom:10px; height: 100%;" type="file" class="form-control" id="img" name="ico"></div>'+
        	      '<div><input type="hidden" id="sid"><input type="hidden" id="type" value="update"><input type="text" class="form-control"  placeholder="Type Hunian" id="htype"></div>'+
        	      '<div><input type="hidden" id="gridx"><input type="text" class="form-control"  placeholder="No Kavling" id="nokavling"></div>'+
        	      '<div><input type="hidden" id="gridy"><input type="text" class="form-control"  placeholder="Luas Tanah" id="lt"></div>'+
        	      '<div><input type="text" class="form-control"  placeholder="Luas Bangunan" id="lb"></div>'+
        	      '<div><select  name="status" style="margin-bottom:10px; height: 100%;" class="selectpicker form-control" id="status">'+
    				'<option value=""> Status </option>'+
    				'<option value="0">Belum Terjual</option>'+
    				'<option value="1">Terjual</option>'+
    				'<option value="2">Ready Stock</option>'+
    			  '</select></div>'+
        	      '<input type="button" name="btnsave" value="Save" id="btnsave" /><input type="button" name="btncancel" value="Cancel" id="btncancel" /></div></form></div>' );

		        $("#btncancel").live("click", function(){
		  	      	$("#"+id).fadeOut();
		  	      	$( '#tagit' ).remove();
		  	    	viewtag( idm  );
		  		});
		  $('.name').focus();
      });

	$("#btncancel").live("click", function(){
	      $('#tagit').fadeOut();
	      $('#box').fadeOut();
	      $( '#tagit' ).remove();
	});
    
	// Remove tags.
    $( '#taglist' ).on('click', '.remove', function() {
      id = $(this).parent().attr("id");
      // Remove the tag
	  $.ajax({
        type: "POST", 
        url: base_url + "siteplan/save", 
        data: "tagid=" + id + "&type=remove",
        success: function(data) {
			var img = $('#imgtag').find( 'img' );
			var id = $( img ).attr( 'id' );
			//get tags if present
			viewtag( id );
        }
      });
    });
	
	// load the tags for the image when page loads.
    var img = $('#imgtag').find( 'img' );
	var id = $( img ).attr( 'id' );
	
	viewtag( id ); // view all tags available on page load
    
    function viewtag( picid )
    {
      // get the tag list with action remove and tag boxes and place it on the image.
	  $.post( base_url + "siteplan/getbyid" ,  "picid=" + picid, function( data ) {
		 $('#tagbox').html(data.boxes);
	  }, "json");
	
    }
    
    
  });
</script>
<div id="main">
	<ol class="breadcrumb">
	</ol>
	<!-- //breadcrumb-->

	<div id="content">

		<div class="row">
			
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div id="imgtag"> 
    				<img id="<?php echo $image[0]['image_id']; ?>" src="<?php echo base_url().$image[0]['name']; ?>" /> 
				    <div id="tagbox">
				    </div>
  				</div> 
			</div>
			<!-- //content > row > col-lg-8 -->
		</div>
		<!-- //content > row-->

	</div>
	<!-- //content-->
</div>
<!-- //main-->