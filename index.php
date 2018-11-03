<?php
require 'config/config.php';

switch ($_SERVER['REQUEST_URI'])
{
	case '/?home':
		$page = new HomeC();
		$page->index();
		return 1;
	case '/?register':
		$page = new RegisterC();
		$page->index();
		return 1;
	case '/?downloads':
		$page = new DownloadsC();
		$page->index();
		return 1;
	case '/?login':
		$page = new LoginC();
		$page->index();
		return 1;
	case '/?logout':
		$page = new LoginC();
		$page->logout();
		return 1;
	case '/?rankings':
		$page = new RankingsC();
		$page->index();
		return 1;
	case '/?controlpanel':
		$page = new ControlpanelC();
		$page->index();
		return 1;
	case '/?vote':
		$page = new VoteC();
		$page->index();
		return 1;
	default:
		break;
}

echo "404";
return 1;