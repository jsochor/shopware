<?php declare(strict_types=1);

namespace Shopware\ShippingMethod\Event;

use Shopware\Framework\Event\NestedEvent;
use Shopware\Framework\Event\NestedEventCollection;

class ShippingMethodPaymentMethodWrittenEvent extends NestedEvent
{
    const NAME = 'shipping_method_payment_method.written';

    /**
     * @var string[]
     */
    private $shippingMethodPaymentMethodUuids;

    /**
     * @var NestedEventCollection
     */
    private $events;

    /**
     * @var array
     */
    private $errors;

    public function __construct(array $shippingMethodPaymentMethodUuids, array $errors = [])
    {
        $this->shippingMethodPaymentMethodUuids = $shippingMethodPaymentMethodUuids;
        $this->events = new NestedEventCollection();
        $this->errors = $errors;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return string[]
     */
    public function getShippingMethodPaymentMethodUuids(): array
    {
        return $this->shippingMethodPaymentMethodUuids;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function addEvent(NestedEvent $event): void
    {
        $this->events->add($event);
    }

    public function getEvents(): NestedEventCollection
    {
        return $this->events;
    }
}