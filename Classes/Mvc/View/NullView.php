<?php


namespace CodeQ\NeosCspReportEndpoint\Mvc\View;


use Neos\Flow\Mvc\View\AbstractView;

class NullView extends AbstractView
{
    /**
     * @return string
     */
    public function render()
    {
        return 'fuego';
    }
}
