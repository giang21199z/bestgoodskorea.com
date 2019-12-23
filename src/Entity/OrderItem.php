<?php

namespace App\Entity;

class OrderItem
{

  private $idProduct;

  private $name;

  private $nameKr;
  
  private $quantity;

  private $image;

  private $price;

  public function getIdProduct(): ?int
  {
    return $this->idProduct;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function getNameKr(): ?string
  {
    return $this->nameKr;
  }

  public function getQuantity(): ?int
  {
    return $this->quantity;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function getPrice(): ?int
  {
    return $this->price;
  }

  public function setIdProduct(int $idProduct): self
  {
    $this->idProduct = $idProduct;

    return $this;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function setNameKr(string $nameKr): self
  {
    $this->nameKr = $nameKr;

    return $this;
  }

  public function setQuantity(int $quantity): self
  {
    $this->quantity = $quantity;

    return $this;
  }

  public function setImage(string $image): self
  {
    $this->image = $image;

    return $this;
  }

  public function setPrice(int $price): self
  {
    $this->price = $price;

    return $this;
  }
  
}
