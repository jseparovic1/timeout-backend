<?php

declare(strict_types=1);

namespace App\Shared\RequestGuard;

use App\Shared\Exception\RuntimeException;
use App\Shared\Exception\ValidationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestGuardConverter implements ParamConverterInterface
{
    /** @var DecoderInterface */
    private $encoder;

    /** @var ValidatorInterface */
    private $validator;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(
        DecoderInterface $encoder,
        ValidatorInterface $validator,
        SerializerInterface $serializer
    ) {
        $this->encoder = $encoder;
        $this->validator = $validator;
        $this->serializer = $serializer;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $class = $configuration->getClass();

        $content = $this->encoder->decode($request->getContent(), JsonEncoder::FORMAT);

        $violations = $this->validator->validate($content, $class::{'buildConstraints'}());

        if (count($violations) > 0) {
            throw ValidationException::for($violations);
        }

        try {
            $requestGuard = $this->serializer->deserialize($request->getContent(), $class, 'json');
        } catch (NotNormalizableValueException $exception) {
            throw RuntimeException::create(sprintf('Unable to construct request "%s"', $class));
        }

        $request->attributes->set($configuration->getName(), $requestGuard);

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return is_subclass_of($configuration->getClass(), RequestGuard::class);
    }
}
