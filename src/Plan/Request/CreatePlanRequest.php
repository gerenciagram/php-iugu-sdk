<?php

namespace Iugu\Plan\Request;

use Iugu\Environment;
use Iugu\Plan;
use Iugu\Request\AbstractRequest;

/**
 * Class CreatePlanRequest
 *
 * @package Iugu\Plan\Request
 */
class CreatePlanRequest extends AbstractRequest
{

    private $plan;

    /**
     * CreatePlanRequest constructor.
     *
     * @param Environment $environment
     * @param Plan $plan
     */
    public function __construct(Environment $environment, Plan $plan)
    {
        parent::__construct($environment);
        $this->plan = $plan;
    }

    /**
     * 
     * @throws \Iugu\Request\IuguRequestException
     */
    public function execute()
    {
        $url = $this->environment->getApiUrl() . "/plans";
        return $this->sendRequest('POST', $url, $this->plan);
    }

    /**
     * @param $json
     *
     * @return Plan
     */
    protected function unserialize($json)
    {
        return Plan::fromJson($json);
    }
}