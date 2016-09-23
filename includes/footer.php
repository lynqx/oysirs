<!-- /SAMPLE -->						
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo BASEJS; ?>jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo BASEJS; ?>jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo BASEURL; ?>bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo BASEJS; ?>bootstrap-daterangepicker/moment.min.js"></script>
	<script src="<?php echo BASEJS; ?>bootstrap-daterangepicker/daterangepicker.min.js"></script>
	
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo BASEJS; ?>jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- TYPEHEAD -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>typeahead/typeahead.min.js"></script>
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- FILE UPLOAD -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>uniform/jquery.uniform.min.js"></script>
	<!-- JQUERY UPLOAD -->
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="<?php echo BASEJS; ?>blueimp/javascript-template/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="<?php echo BASEJS; ?>blueimp/javascript-loadimg/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="<?php echo BASEJS; ?>blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="<?php echo BASEJS; ?>blueimp/gallery/jquery.blueimp-gallery.min.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload.min.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-process.min.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-image.min.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-audio.min.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-video.min.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-validate.min.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/jquery.fileupload-ui.min.js"></script>
	<script src="<?php echo BASEJS; ?>upload.js"></script>
	<!-- The main application script -->
	<script src="<?php echo BASEJS; ?>jquery-upload/js/main.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo BASEJS; ?>jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo BASEJS; ?>script.js"></script>
	<script>
	<?php //$set='widgets_box'; ?>
		jQuery(document).ready(function() {		
			App.setPage("<?php if (!isset($set_page)) {echo 'index'; } else echo $set_page;?>");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>