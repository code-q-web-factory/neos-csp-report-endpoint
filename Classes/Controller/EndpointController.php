<?php


namespace CodeQ\NeosCspReportEndpoint\Controller;

use CodeQ\NeosCspReportEndpoint\Mvc\View\NullView;
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
     * @param string $reportData
     * @Flow\MapRequestBody("$reportData")
     */
    public function reportAction(string $reportData)
    {
        // $reportData = $this->getControllerContext()->getRequest()->getHttpRequest()->getBody();
        if($reportData = json_decode($reportData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) {
            $this->systemLogger->critical('Content-Security-Policy Violation reported',
                $reportData);
        }
    }
}
