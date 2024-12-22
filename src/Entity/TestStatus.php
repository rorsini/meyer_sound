<?php

namespace App\Entity;

use App\Repository\TestStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestStatusRepository::class)]
class TestStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, HardwareTest>
     */
    #[ORM\OneToMany(targetEntity: HardwareTest::class, mappedBy: 'status', orphanRemoval: true)]
    private Collection $hardwareTests;

    public function __construct()
    {
        $this->hardwareTests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, HardwareTest>
     */
    public function getHardwareTests(): Collection
    {
        return $this->hardwareTests;
    }

    public function addHardwareTest(HardwareTest $hardwareTest): static
    {
        if (!$this->hardwareTests->contains($hardwareTest)) {
            $this->hardwareTests->add($hardwareTest);
            $hardwareTest->setStatus($this);
        }

        return $this;
    }

    public function removeHardwareTest(HardwareTest $hardwareTest): static
    {
        if ($this->hardwareTests->removeElement($hardwareTest)) {
            // set the owning side to null (unless already changed)
            if ($hardwareTest->getStatus() === $this) {
                $hardwareTest->setStatus(null);
            }
        }

        return $this;
    }
}
