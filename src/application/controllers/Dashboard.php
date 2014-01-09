<?php
namespace Application\Controller;

use \Application\Helper;
use \Gria\Controller;

class Dashboard extends Controller\Controller
{

	public function route()
	{
		$helper = new Helper\Build();

		$this->getView()->set('hasFinishedBuilds', $helper->hasFinishedBuilds());
		
		$successRate = $helper->getSuccessRate();
		$successStatus = 'danger';
		$this->getView()->set('successRate', $successRate);
		if ($successRate >= 90) {
			$successStatus = 'success';
		} else {
			if ($successRate <= 89 && $successRate >= 75) {
				$successStatus = 'warning';
			}
		}
		$this->getView()->set('successStatus', $successStatus);

		$finishedBuilds = $helper->getFinishedBuilds();
		$this->getView()->set('finishedBuilds', $finishedBuilds);
		$this->getView()->set('numFinishedBuilds', count($finishedBuilds));

		$queuedBuilds = $helper->getQueuedBuilds();
		$this->getView()->set('queuedBuilds', $queuedBuilds);
		$this->getView()->set('numQueuedBuilds', count($queuedBuilds));

		$failedBuilds = $helper->getFailedBuilds();
		$this->getView()->set('failedBuilds', $failedBuilds);
		$this->getView()->set('numFailedBuilds', count($failedBuilds));
	}

}