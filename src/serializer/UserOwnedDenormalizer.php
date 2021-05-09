<?php
namespace App\Serializer;

use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

class UserOwnedDenormalizer implements ContextAwareDenormalizerInterface
{
    /**
     * {@inheritdoc}
     *
     * @param array $context options that denormalizers have access to
     */
    public function supportsDenormalization($data, string $type, string $format = null, array $context = [])
    {

    }

    /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed  $data    Data to restore
     * @param string $type    The expected class to instantiate
     * @param string $format  Format the given data was extracted from
     * @param array  $context Options available to the denormalizer
     *
     * @return mixed
     *
     * @throws BadMethodCallException   Occurs when the normalizer is not called in an expected context
     * @throws InvalidArgumentException Occurs when the arguments are not coherent or not supported
     * @throws UnexpectedValueException Occurs when the item cannot be hydrated with the given data
     * @throws ExtraAttributesException Occurs when the item doesn't have attribute to receive given data
     * @throws LogicException           Occurs when the normalizer is not supposed to denormalize
     * @throws RuntimeException         Occurs if the class cannot be instantiated
     * @throws ExceptionInterface       Occurs for all the other cases of errors
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {

    }

}