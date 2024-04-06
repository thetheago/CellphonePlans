<?php

namespace Thiago\CellphonePlans\Device;

class DevicePlan
{
    private int $id;
    private string $type;
    public string $name;
    private int $phonePrice;
    private int $phonePriceOnPlan;
    private int $installments;
    private float $monthlyFee;
    private string $startDate;
    private object $locale;

    public function __construct(
        int $id,
        string $type,
        string $name,
        int $phonePrice,
        int $phonePriceOnPlan,
        int $installments,
        float $monthlyFee,
        string $startDate,
        object $locale
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->phonePrice = $phonePrice;
        $this->phonePriceOnPlan = $phonePriceOnPlan;
        $this->installments = $installments;
        $this->monthlyFee = $monthlyFee;
        $this->startDate = $startDate;
        $this->locale = $locale;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhonePrice(): int
    {
        return $this->phonePrice;
    }

    public function getPhonePriceOnPlan(): int
    {
        return $this->phonePriceOnPlan;
    }

    public function getInstallments(): int
    {
        return $this->installments;
    }

    public function getMonthlyFee(): float
    {
        return $this->monthlyFee;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getLocale(): object
    {
        return $this->locale;
    }
}
