<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;
	use Blade;
	use Form;


	class AppServiceProvider extends ServiceProvider
	{
		/**
		 * Bootstrap any application services.
		 *
		 * @return void
		 */
		public function boot()
		{
			Blade::directive( 'today', function (){
				return "<?php echo date('d.m.Y H:i'); ?>";

			} );

			Blade::directive( 'token', function (){
				return "<input type='hidden' name='_token' id='_token' value='<?php echo csrf_token() ?>'>";
			} );

			Form::component( 'bcTextarea', 'components.form.textarea', [ 'label', 'name', 'value' => null, 'attributes' => [] ] );

			Form::component( 'bcText', 'components.form.text', [ 'label','name', 'value' => null, 'attributes' => [] ] );

			Form::component( 'bcSelect', 'components.form.select', [ 'label','name', 'value' => null, 'attributes' => [] ] );


		}

		/**
		 * Register any application services.
		 *
		 * @return void
		 */
		public function register()
		{
			//
		}
	}
