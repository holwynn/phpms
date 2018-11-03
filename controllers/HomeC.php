<?php

/**
* HomeC(ontroller)
*/
class HomeC
{
	public function index()
	{
		// Head
		include VIEWS . 'default/head.php';
		include VIEWS . 'default/topbanner.php';
		include VIEWS . 'assets/status.php';

		// Slider-carousel
		include VIEWS . 'default/slider.php';

		// Main content (login/panel and content)
		if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] == True)
		{
			include VIEWS . 'assets/userpanel.php';	
		}
		else
		{
			include VIEWS . 'assets/login.php';
		}
		include VIEWS . 'modules/home.php';

		// Foot
		include VIEWS . 'default/footer.php';
		include VIEWS . 'default/foot.php';
	}
}