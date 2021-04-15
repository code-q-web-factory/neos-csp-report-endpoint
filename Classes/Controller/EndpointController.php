<?php


namespace CodeQ\CspReportEndpoint\Controller;

use CodeQ\CspReportEndpoint\Mvc\View\NullView;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Psr\Log\LoggerInterface;

class EndpointController extends ActionController
{
    /**
     * @Flow\Inject
     * @var LoggerInterface
     */
    protected $systemLogger;

    protected $defaultViewObjectName = NullView::class;

    protected $viewFormatToObjectNameMap = [
        'html' => NullView::class
    ];

    /**
     */
    public function reportAction()
    {
        if($this->request->hasArgument('csp-report')) {
            $reportData = $this->request->getArgument('csp-report');
            $this->systemLogger->critical('Content-Security-Policy Violation reported',
                $reportData);
            $this->response->setStatusCode(204);
        } else {
            $this->response->setStatusCode(400);
        }
    }
}
