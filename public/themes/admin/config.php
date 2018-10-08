<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Inherit from another theme
	|--------------------------------------------------------------------------
	|
	| Set up inherit from another if the file is not exists, this 
	| is work with "layouts", "partials", "views" and "widgets"
	|
	| [Notice] assets cannot inherit.
	|
	*/

	'inherit' => null, //default

	/*
	|--------------------------------------------------------------------------
	| Listener from events
	|--------------------------------------------------------------------------
	|
	| You can hook a theme when event fired on activities this is cool 
	| feature to set up a title, meta, default styles and scripts.
	|
	| [Notice] these event can be override by package config.
	|
	*/

	'events' => array(

		'before' => function($theme)
		{
			$theme->setTitle('Title example');
			$theme->setAuthor('Jonh Doe');
		},

		'asset' => function($asset)
		{
			$asset->themePath()->add([
										['style', 'css/style.css'],
										// ['script', 'js/script.js']
									 ]);

			// You may use elixir to concat styles and scripts.
			/*
			$asset->themePath()->add([
										['styles', 'dist/css/styles.css'],
										['scripts', 'dist/js/scripts.js']
									 ]);
			*/

			// Or you may use this event to set up your assets.
			/*
			$asset->themePath()->add('core', 'core.js');			
			$asset->add([
							['jquery', 'vendor/jquery/jquery.min.js'],
							['jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', ['jquery']]
						]);
			*/
			// $asset->themePath()->add('app', 'app.js');
		},


		'beforeRenderTheme' => function($theme)
		{
			// To render partial composer
			/*
	        $theme->partialComposer('header', function($view){
	            $view->with('auth', Auth::user());
	        });
			*/
			$theme->asset()->add('css-bootstrap-min','css/bootstrap.min.css');
			$theme->asset()->add('css-stacktable','css/stacktable.css');
			$theme->asset()->add('css-datatable','css/datatables.min.css');
			$theme->asset()->add('css-responsive-datatable','css/responsive.dataTables.min.css');
			$theme->asset()->add('css-notie','css/notie.min.css');

			$theme->asset()->add('js-jquery-min','js/jquery.min.js');
			$theme->asset()->add('js-bootstrap-min','js/bootstrap.min.js');
			// $theme->asset()->add('js-stacktable','js/stacktable.js');
			$theme->asset()->add('js-datatable','js/datatables.min.js');
			$theme->asset()->add('js-responsive-datatable','js/dataTables.responsive.min.js');
			$theme->asset()->add('js-notie','js/notie.min.js');
			$theme->asset()->add('js-form','js/form.js');
		},

		'beforeRenderLayout' => array(

			'mobile' => function($theme)
			{
				// $theme->asset()->themePath()->add('ipad', 'css/layouts/ipad.css');
			}

		)

	)

);