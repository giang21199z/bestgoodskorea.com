<?php

namespace App\Entity;

class SearchItem
{
    private $idProduct;

    private $ten;

    private $ten_kr;

    private $url_seo;

    public function setIdProduct(int $idProduct): self
  {
    $this->idProduct = $idProduct;

    return $this;
  }

  public function getIdProduct(): ?int
  {
    return $this->idProduct;
  }

  public function getTen(): ?string
  {
    return $this->ten;
  }

  public function getTenKr(): ?string
  {
    return $this->ten_kr;
  }

  public function setTen(string $ten): self
  {
    $this->ten = $ten;

    return $this;
  }

  public function setTenKr(string $ten_kr): self
  {
    $this->ten_kr = $ten_kr;

    return $this;
  }

  public function getUrlSeo(): ?string
    {
        return $this->url_seo;
    }

    public function setUrlSeo(string $url_seo): self
    {
        $this->url_seo = $url_seo;

        return $this;
    }
}