<?php


namespace CodeQ\CspReportEndpoint\Controller;

use CodeQ\CspReportEndpoint\Mvc\View\NullView;
use Exception;
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
        try {
            $cspReport = json_decode(file_get_contents('php://input'), true);
            $this->systemLogger->critical('Content-Security-Policy Violation reported:', $cspReport);
            $this->response->setStatusCode(204);
        } catch (Exception $e) {
            $this->response->setStatusCode(400);
        }
    }
}
