<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image_url = null;

    #[ORM\Column(length: 255)]
    private ?string $product_url = null;

    #[ORM\Column(length: 255)]
    private ?string $resource_url = null;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products')]
    private Collection $category;

    /**
     * @var Collection<int, HardwareTest>
     */
    #[ORM\OneToMany(targetEntity: HardwareTest::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $hardwareTests;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->hardwareTests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getProductUrl(): ?string
    {
        return $this->product_url;
    }

    public function setProductUrl(string $product_url): static
    {
        $this->product_url = $product_url;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resource_url;
    }

    public function setResourceUrl(string $resource_url): static
    {
        $this->resource_url = $resource_url;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->category->removeElement($category);

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
            $hardwareTest->setProduct($this);
        }

        return $this;
    }

    public function removeHardwareTest(HardwareTest $hardwareTest): static
    {
        if ($this->hardwareTests->removeElement($hardwareTest)) {
            // set the owning side to null (unless already changed)
            if ($hardwareTest->getProduct() === $this) {
                $hardwareTest->setProduct(null);
            }
        }

        return $this;
    }



}
