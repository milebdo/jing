$(function() {
	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/" + l.pathname.split('/')[2] + "/";

	tinymce.init({
	    selector: "#tinymce_intro",
	    theme: "modern",
	    mode : "textarea",
		width: 1100,
	    height: 300,
	    content_css : base_url + "assets/css/tinymce.css", 
	    plugins: [
	        "advlist autolink lists link charmap print preview anchor",
	        "searchreplace wordcount visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	
	// serverside datatable start
	var responsiveHelper = undefined;
	var breakpointDefinition = {
		tablet: 1024,
		phone : 480
	};

	var table = {};
	var tableWrapper = $('.datatable-wrapper');
	tableWrapper.each(function (index, element) {
		table[index] = $(element).find('table.datatable').dataTable({
			"bProcessing"		: true,
			"bServerSide"		: true,
			"sAjaxSource"		: $(element).find('table.datatable').data('src'),
			"bSort"				: false,
			"sDom"				: "<'row-fluid'<'span3 datatable-button'><'span9 datatable-filter'<'row-fluid custom-filter'><'row-fluid default-filter'lf>>r>t<'row-fluid'<'span12'p i>>",
			"oLanguage"			: {
				"sLengthMenu"	: "_MENU_ ",
				"sInfo"			: "Menampilkan <b>_START_ sampai _END_</b> dari _TOTAL_ data",
				"sInfoEmpty"	: "Menampilkan <b>0 sampai _END_</b> dari _TOTAL_ data",
				"sInfoFiltered"	: "(disaring dari _MAX_ jumlah data)",
				"sZeroRecords"	: "Data tidak ditemukan",
				"sSearch"		: ""
			},
			"fnServerParams"	: function ( aoData ) {
				if ($(element).find('.filter-item').length) {
					$(element).find('.filter-item').each(function(){
						var key = $(this).attr('name');
						var value = $(this).val();
						if (key && value) {
							aoData.push( { "name": key, "value": value } );
						}
					});
				}
				if ($(element).find('.param-item').length) {
					$(element).find('.param-item').each(function(){
						var key = $(this).attr('name');
						var value = $(this).val();
						if (key && value) {
							aoData.push( { "name": key, "value": value } );
						}
					});
				}
			},
			"fnServerData"		: function ( sSource, aoData, fnCallback, oSettings ) {
				oSettings.jqXHR = $.ajax({
					"dataType"	: 'json',
					"type"		: "POST",
					"url"		: sSource,
					"data"		: aoData,
					"success"	: function (response) {
						fnCallback(response);
					},
					"error"		: function (response) {
						//
					}
				});
			},
			"fnPreDrawCallback"	: function ( oSettings ) {
				// buttons
				var url,message, btnClass, icon, btnString = '';
				$(element).find('.datatable-button').children('.button-item').each(function (key, button) {
					url = button.data('url');
					message = button.data('message');
					btnClass = button.data('class');
					icon = button.data('icon');

					btnString += '<a href="' + url + '" class="'+ btnClass +'"><i class="'+ icon +'"></i>&nbsp;&nbsp;' + message + '</a>' + "\r\n";
				});

				if (btnString) {
					$(element).find('.dataTables_wrapper').find('.datatable-button').html(btnString);
				}

				// filters
				$(element).find('.datatable-filter').children('.filter-item').each(function (key, filter) {
					filter.appendTo($(element).find('.dataTables_wrapper').find('.datatable-filter').children('.custom-filter')).select2().on('change', function () {
						table[index].fnDraw();
					});
				});

				// params
				$(element).find('.datatable-param').children('.param-item').each(function (key, param) {
					$(element).find('.dataTables_wrapper').find('.datatable-filter').children('.custom-filter').append(param);
				});

				$(element).find('.datatable-custom').remove();

				$(element).find('.dataTables_wrapper').addClass('relative');
				$(element).find('.dataTables_wrapper .dataTables_filter').addClass("pull-right").find('input').addClass("input-medium").attr('placeholder','Search');
				$(element).find('.dataTables_wrapper .dataTables_length').addClass("pull-right").css({'margin-left' : '8px'});				
			}
		});
		setInterval(function() { table[index].fnDraw(); }, 1000);
	});
	// serverside datatable end

	// btn modal start
	var modalDOM;
	$('body').on('click', '.btn-modal', function (event) {
		event.preventDefault();
			
		if ( ! modalDOM || ! modalDOM.length) {
			var relatedTarget = $(this);

			var modalWidth = relatedTarget.attr('modal-width') ? relatedTarget.attr('modal-width') : 500;

			modalDOM = $('<div class="modal fade" data-width="' + modalWidth + '" />')
						.append(
							$('<div class="modal-header" />')
							.append(
								$('<button type="button" class="close" data-dismiss="modal" aria-hidden="true" />').html('<i class="fa fa-times"></i>'),
								$('<h4 class="modal-title" />').html(relatedTarget.attr('modal-title'))
							),
							$('<div class="modal-body" />')
						);

			modalDOM.appendTo($('body'));

			$('body').modalmanager('loading');

			var modalLoader = $('body').data('modalmanager');
			var modalXHR = $.ajax({
				url 	: relatedTarget.attr('href'),
				success : function (data) {
					modalDOM.find('.modal-body').html(data);
					modalDOM.modal('show');

					modalDOM.find('[data-provide="colorpicker"]').each(function(i) {
						var id = "color_" + i,
							$this = $(this).attr("id", id),
							data = $(this).data(),
							submit_btn = data.inline ? 0 : 1;
						if (data.addon && $this.is("input")) {
							$('#' + id).next().css("width", $(this).outerHeight());
						}
						$this.colpick({
							bornIn: "body",
							flat: data.inline || false,
							submit: submit_btn,
							layout: data.layout || 'hex',
							color: $this.val() || $.xcolor.random(),
							colorScheme: data.theme || "gray",
							onChange: function(hsb, hex, rgb) {
								$('#' + id).val('#' + hex);
								if (data.addon) {
									$('#' + id).css({
										'border-color': '#' + hex
									});
									$('#' + id).next().css({
										'background-color': '#' + hex,
										'border-color': '#' + hex
									});
								}
							},
							onSubmit: function(hsb, hex, rgb, el) {
								$(el).val('#' + hex);
								$(el).colpickHide();
							}
						});
					});

				},
				error 	: function (data) {
					if (data.statusText !== 'abort') {
						modalLoader.$spinner.trigger('click');
					}

					modalDOM.remove();
					modalDOM = undefined;
				}
			});

			modalLoader.$spinner.on('click', function () {
				modalXHR.abort();
			});

			modalDOM.on('show.bs.modal', function () {
				var modal = $(this);

				modal.find('input.datepicker').datepicker({
					dateFormat 	: 'dd/mm/yy'
				});

				modal.find('form.main-form').each(function () {
					mainForm($(this), modal);
				})
			});

			modalDOM.on('shown.bs.modal', function () {
				var modal = $(this);

				modal.find('.ios-switch .switch').each(function (i) {
					$(this).addClass('ios');
				});

				modal.find('.ios').bootstrapSwitch();
				modal.find('.ios').bootstrapSwitch('setOnLabel', '');
				modal.find('.ios').bootstrapSwitch('setOffLabel', '');

				modal.find(".ios-switch input:checkbox").change(function () {
					var targetLabel = $(this).parents('li').find("label span");
					if ($(this).is(':checked')) {
						targetLabel.text("ON");
					} else {
						targetLabel.text("OFF");
					}
				});
			});

			modalDOM.on('hidden.bs.modal', function () {
				setTimeout(function () {
					modalDOM.remove();
					modalDOM = undefined;
				}, 300);
			});
		}
	});
	// btn modal end

	// ajaxform start
	$('.main-form').each(function () {
		mainForm($(this));
	});
	// ajaxform end

	// delete table row start
	$('.delete-table-row').live('click', function (e) {
		e.preventDefault();
		var href = $(this).data('href');
		var message = $(this).data('message');
		var data = {'id' : $(this).data('id')};
		var $this = $(this);

		if (!confirm(message)) {
			return false;
		}

		$('.alert').remove();

		$.ajax({
			type 		: "POST",
			url 		: href,
			data 		: data,
			dataType 	: 'json',
			beforeSend 	: function() {
				show_loader('0%');
			},
			progress 	: function(jqXHR, progressEvent) {
				if (progressEvent.lengthComputable) {
					show_loader((Math.round(progressEvent.loaded / progressEvent.total * 100)) + "%");
				} else {
					show_loader('100%');
				}
			},
			complete 	: function() {
				hide_loader();
			},
			success 	: function(response){
				hide_loader();
				console.log(response);
				if (typeof response.success !== 'undefined' && response.success) {
					$this.closest('tr')
					.children('td')
					.animate({ 'padding-top': 0, 'padding-bottom': 0 },400)
					.wrapInner('<div />')
					.children()
					.slideUp(400,function() {
						$this.closest('tr').remove();
					});

					if (typeof response.message !== 'undefined') {
						if (typeof response.message.notify === 'string') {
							$(
								'<div class="alert alert-success">' +
								'	<strong>Success!</strong> ' + response.message.notify +
								'</div>'
							).insertBefore($('#content'));
//							if(response.redirect) window.location.href = response.redirect;
						}
					}
				} else {
					if (typeof response.message !== 'undefined') {
						if (typeof response.message.notify === 'string') {
							$(
								'<div class="alert alert-danger">' +
								'	<strong>Warning!</strong> ' + response.message.notify +
								'</div>'
							).insertBefore($('#content'));
						}
					}
				}
			},
			error: function(response) {
				console.log(response);
				hide_loader();
				$(
					'<div class="alert alert-danger">' +
					'	<strong>Warning!</strong> Data could not be deleted' +
					'	<br /> - <small>An error has occurred #0</small>' +
					'</div>'
				).insertBefore($('#content'));
			}
		});
	});
	// delete table row end

	if ($('#content_loading').length) {
		var throbber = new Throbber({  size: 32, padding: 17,  strokewidth: 2.8,  lines: 12, rotationspeed: 0, fps: 15 });
		throbber.appendTo(document.getElementById('content_loading'));
		throbber.start();
	}

	if ($('.do ul.checkout-bar li > a.update-order').length) {
		$('.do ul.checkout-bar li > a.update-order').hover(function () {
			$(this).parent('li').addClass('hover');
		}, function () {
			$(this).parent('li').removeClass('hover');
		}).click(function (event) {
			event.preventDefault();

			var target = $($(this).data('target'));
			if (target.length) {
				target.submit();
			}
		});
	}

	$('input.datepicker').datepicker({
		dateFormat 	: 'dd/mm/yy'
	});

	$('.preview-image').each(function () {
		var target = this;
		var actualWidth = $(target).outerWidth();

		var image = new Image();
		image.src = $(target).data('default');

		image.onload = function () {
			var width = this.width;
			var height = this.height;

			var actualHeight = height * actualWidth / width;

			$(target).css({
				'background-image'	: 'url(\'' + image.src + '\')',
				'height'			: actualHeight + 'px'
			});
		};

		$(target).on('click', function () {
			$($(target).data('target')).trigger('click');
		});
	});

	$('.preview-input').each(function () {
		$(this).on('change',function () {
			previewImage(this, $(this).data('target'));
		});
	});

	function previewImage (input, target) {
		if (input.files && input.files[0]) {
			var actualWidth = $(target).outerWidth();

			var reader = new FileReader();

			reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;

				image.onload = function () {
					var width = this.width;
					var height = this.height;
					var actualHeight = height * actualWidth / width;

					$(target).css({
						'background-image'	: 'url(\'' + image.src + '\')',
						'height'			: actualHeight + 'px'
					});
				};
			}

			reader.readAsDataURL(input.files[0]);
		} else {
			var actualWidth = $(target).outerWidth();

			var image = new Image();
			image.src = $(target).data('default');

			image.onload = function () {
				var width = this.width;
				var height = this.height;

				var actualHeight = height * actualWidth / width;

				$(target).css({
					'background-image'	: 'url(\'' + image.src + '\')',
					'height'			: actualHeight + 'px'
				});
			};
		}
	}

	function mainForm (form, modal) {
		form.ajaxForm({
			dataType: 'json',
			beforeSerialize: function($form, options) {
				//
			},
			beforeSubmit: function(arr, $form, options) {
				if ($form.hasClass('submiting')) {
					return false;
				}

				$form.addClass('submiting');

				$('label.error').html('');
				$('.error-block').removeClass('error-block');
				$('.alert').remove();
				show_loader('0%');
			},
			progress: function(jqXHR, progressEvent) {
				if (progressEvent.lengthComputable) {
					show_loader((Math.round(progressEvent.loaded / progressEvent.total * 100)) + "%");
				} else {
					show_loader('100%');
				}
			},
			success: function (response, status, xhr, $form) {
				$form.removeClass('submiting');
				console.log(response);
				if (typeof response.success !== 'undefined' && response.success) {
					var url = typeof response.redirect === 'string' ? response.redirect : window.location.href;

					if (typeof response.message !== 'undefined') {
						if (typeof response.message.notify === 'string') {
							$(
								'<div class="alert alert-success">' +
								'	<strong>Success!</strong> ' + response.message.notify +
								'</div>'
							).insertBefore(form);
							//window.location.reload(true);
						}
					}
					if (typeof response.redirect === 'string') {
						document.location.href = url;
					} else if (typeof modal !== 'undefined' && typeof response.modal === 'string' && response.modal === 'hide') {
						hide_loader();
						modal.modal('hide');
						$.each(table, function (index, value) {
							value.fnDraw();
						});
					}
				} else {
					hide_loader();

					$("#wrapper > #main").stop(true, true).animate({ scrollTop: 0 }, 400);

					if (typeof response.message !== 'undefined') {
						if (typeof response.message.notify === 'string') {
							$(
								'<div class="alert alert-danger">' +
								'	<strong>Warning!</strong> ' + response.message.notify +
								'</div>'
							).insertBefore(form);
						}
						
						if (typeof response.message.warning === 'object') {
							$.each(response.message.warning, function (key,value) {
								$('label.error[for="' + key + '"]').html(value);
							});
						}
						
						if (typeof response.message.block === 'object') {
							$.each(response.message.block, function (key,value) {
								$('.' + key).addClass('error-block');
							});
						}
					}
				}
			},
			error: function(response) {
				form.removeClass('submiting');
				console.log(response.responseText);
				hide_loader();
				$(
					'<div class="alert alert-danger">' + 
					'	<strong>Warning!</strong> Data could not be saved' + 
					'	<br /> - <small>An error has occurred #0</small>' +
					'</div>'
				).insertBefore(form);
			}
		});
	}

	function show_loader (progress) {
		$('body').addClass('loading');
	}

	function hide_loader () {
		$('body').removeClass('loading');
	}

	$(window).load(function () {
		$('body').removeClass('loading');

		if ($('.stock-bbm').length) {
			$('.stock-bbm').each(function () {
				$(this).css({
					height 	: $(this).outerWidth()
				});
			});
		}
	});
	
	if (typeof weeklyBar !== 'undefined' && $('#weeklyBar').length) {		
		new Morris.Bar(weeklyBar);
	}

	if (typeof monthlyLine !== 'undefined' && $('#monthlyLine').length) {		
		new Morris.Line(monthlyLine);
	}
});
