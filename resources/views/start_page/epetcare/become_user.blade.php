<!-- Section: Project Start Form -->
<section class="divider parallax layer-overlay overlay-dark-8" data-bg-img="/epetcare/images/bg/bg6.jpg">
	<div class="container-fluid p-0">
		<div class="row equal-height">
			<div class="col-md-6 bg-light">
				<div class="p-70">
					<div class="row">
						<div class="col-md-10">
							<h2 class="mt-0 line-height-1"><span>Get A <span class="text-theme-colored">Service Now!</span></span>
							</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim labore iure
							   repellendus quasi nobis.</p>
							<form id="getaquote_form" name="getaquote_form" class="form-transparent mt-20"
							      method="post" action="includes/getaquote.php">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group mb-10">
											<input name="form_name" class="form-control" type="text" required=""
											       placeholder="Enter Name" aria-required="true">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group mb-10">
											<input name="form_email" class="form-control required email"
											       type="email" placeholder="Enter Email" aria-required="true">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group mb-10">
											<input name="form_phone" class="form-control" type="tel"
											       placeholder="Enter Phone" aria-required="true">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group mb-10">
											<input name="form_date"
											       class="form-control required datetime-picker" type="text"
											       placeholder="Reservation Date" aria-required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group mb-10">
											<div class="styled-select">
												<select id="booking_service" name="booking_service"
												        class="form-control" required="">
													<option value="">- Select Your Vehicle Model -</option>
													<option value="Toyota">Toyota</option>
													<option value="Jeep">Jeep</option>
													<option value="Audi">Audi</option>
													<option value="Truck">Truck</option>
													<option value="Land Rover">Land Rover</option>
													<option value="Lexus">Lexus</option>
													<option value="Mazda">Mazda</option>
													<option value="Mercedes - Benz">Mercedes - Benz</option>
													<option value="Nissan">Nissan</option>
													<option value="Mitsubishi">Mitsubishi</option>
													<option value="Saab">Saab</option>
													<option value="Renault">Renault</option>
													<option value="Mercury">Mercury</option>
													<option value="Pontiac Porsche">Pontiac Porsche</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group mb-10">
											<textarea id="form_message" name="form_message"
											          class="form-control required" placeholder="Enter Message" rows="5"
											          aria-required="true"></textarea>
								</div>
								<div class="form-group mb-0 mt-20">
									<input id="form_botcheck" name="form_botcheck" class="form-control"
									       type="hidden" value="">
									<button type="submit" class="btn btn-dark btn-theme-colored text-uppercase"
									        data-loading-text="Please wait...">Send Message
									</button>
								</div>
							</form>
							<!-- Get Your Project Started Form Validation-->
							<script type="text/javascript">
								$( "#getaquote_form" ).validate( {
									submitHandler: function( form ){
										var form_btn = $( form ).find( 'button[type="submit"]' );
										var form_result_div = '#form-result';
										$( form_result_div ).remove();
										form_btn.before( '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>' );
										var form_btn_old_msg = form_btn.html();
										form_btn.html( form_btn.prop( 'disabled', true ).data( "loading-text" ) );
										$( form ).ajaxSubmit( {
											dataType: 'json',
											success : function( data ){
												if( data.status == 'true' ){
													$( form ).find( '.form-control' ).val( '' );
												}
												form_btn.prop( 'disabled', false ).html( form_btn_old_msg );
												$( form_result_div ).html( data.message ).fadeIn( 'slow' );
												setTimeout( function(){
													$( form_result_div ).fadeOut( 'slow' )
												}, 6000 );
											}
										} );
									}
								} );
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<div class="p-70">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-md-50 text-white mb-20">
							<div class="funfact text-center">
								<div class="funfact-content">
									<div class="funfact-icon">
										<i class="flaticon-pet-man font-30"></i>
									</div>
									<h2 data-animation-duration="2000" data-value="754"
									    class="animate-number text-theme-colored font-30 mt-10">0</h2>
									<h4 class="text-uppercase text-white">Customers</h4>
									<p>Architecto ullam tenetur quia nemo ratione tempora.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-md-50 text-white mb-20">
							<div class="funfact text-center">
								<div class="funfact-content">
									<div class="funfact-icon">
										<i class="flaticon-pet-feeding-the-dog font-30"></i>
									</div>
									<h2 data-animation-duration="2000" data-value="698"
									    class="animate-number text-theme-colored font-30 mt-10">0</h2>
									<h4 class="text-uppercase text-white">Professionals</h4>
									<p>Architecto ullam tenetur quia nemo ratione tempora.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-md-50 text-white mb-20">
							<div class="funfact text-center">
								<div class="funfact-content">
									<div class="funfact-icon">
										<i class="flaticon-pet-food font-30"></i>
									</div>
									<h2 data-animation-duration="2000" data-value="1106"
									    class="animate-number text-theme-colored font-30 mt-10">0</h2>
									<h4 class="text-uppercase text-white">Products</h4>
									<p>Architecto ullam tenetur quia nemo ratione tempora.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-md-50 text-white mb-20">
							<div class="funfact text-center">
								<div class="funfact-content">
									<div class="funfact-icon">
										<i class="flaticon-pet-animals font-30"></i>
									</div>
									<h2 data-animation-duration="2000" data-value="4469"
									    class="animate-number text-theme-colored font-30 mt-10">0</h2>
									<h4 class="text-uppercase text-white">Pets Hosted</h4>
									<p>Architecto ullam tenetur quia nemo ratione tempora.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>