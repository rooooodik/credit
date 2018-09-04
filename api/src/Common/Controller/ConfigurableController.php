<?php

namespace App\Common\Controller;

use App\Common\Service\ServiceInterface;
use App\Common\Transformer\Request\RequestTransformerInterface;
use App\Common\Transformer\Response\ResponseTransformerInterface;
use App\Common\Transformer\Response\ViolationResponse\ViolationListResponseTransformerInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ConfigurableController extends Controller
{
    use LoggerAwareTrait;

    /**
     * @var RequestTransformerInterface
     */
    private $requestTransformer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ViolationListResponseTransformerInterface
     */
    private $violationListResponseTransformer;

    /**
     * @var ServiceInterface
     */
    private $service;

    /**
     * @var ResponseTransformerInterface
     */
    private $responseTransformer;

    /**
     * @param RequestTransformerInterface $requestTransformer
     * @param ValidatorInterface $validator
     * @param ViolationListResponseTransformerInterface $violationListResponseTransformer
     * @param ServiceInterface $service
     * @param ResponseTransformerInterface $responseTransformer
     * @param LoggerInterface $logger
     */
    public function __construct(
        RequestTransformerInterface $requestTransformer,
        ValidatorInterface $validator,
        ViolationListResponseTransformerInterface $violationListResponseTransformer,
        ServiceInterface $service,
        ResponseTransformerInterface $responseTransformer,
        LoggerInterface $logger
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->validator = $validator;
        $this->violationListResponseTransformer = $violationListResponseTransformer;
        $this->service = $service;
        $this->responseTransformer = $responseTransformer;

        $this->setLogger($logger);
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function action(Request $request): Response
    {
        $this->logger->debug('Transforming request to dto');
        $requestDto = $this->requestTransformer->transform($request);

        $this->logger->debug('Validating dto');
        $violationList = $this->validator->validate($requestDto);

        if (count($violationList)) {
            return $this->violationListResponseTransformer->transform($violationList);
        }

        $this->logger->debug(sprintf('Calling service "%s"', get_class($this->service)));
        $responseDto = $this->service->behave($requestDto);

        $this->logger->debug('Transforming dto to response');
        return $this->responseTransformer->transform($responseDto);
    }
}
