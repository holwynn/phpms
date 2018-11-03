<?php

/**
* ControlpanelC(ontroller)
*/
class ControlpanelC
{
	public function index()
	{
		$controlpanelObj = new Controlpanel();
		$characters = $controlpanelObj->getCharacters();
		// Head
		include VIEWS . 'default/head.php';
		include VIEWS . 'default/topbanner.php';
		include VIEWS . 'assets/status.php';

		// Slider-carousel
		include VIEWS . 'default/slider.php';

		// Main content
		include VIEWS . 'modules/controlpanel.php';

		// Foot
		include VIEWS . 'default/footer.php';
		include VIEWS . 'default/foot.php';
	}

	public function mapFix()
	{
		$controlpanelObj = new Controlpanel();
		if (isset($_GET['id']) && !empty($_GET['id']))
		{
			$controlpanelObj->mapFix($_GET['id']);
			header('Location: /?controlpanel');
		}
	}
}