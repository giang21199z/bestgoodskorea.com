<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SanPhamRepository")
 */
class SanPham
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ten;

    /**
     * @ORM\Column(type="integer")
     */
    private $gia_nhap;

    /**
     * @ORM\Column(type="integer")
     */
    private $gia_hien_thi;

    /**
     * @ORM\Column(type="integer")
     */
    private $gia_ban;

    /**
     * @ORM\Column(type="text")
     */
    private $mieu_ta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anh_dai_dien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anh_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anh_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anh_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anh_4;

    /**
     * @ORM\Column(type="integer")
     */
    private $luot_xem;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ten_kr;

    /**
     * @ORM\Column(type="text")
     */
    private $mieu_ta_kr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_seo;

    /**
     * @ORM\Column(type="text")
     */
    private $noi_dung;

    /**
     * @ORM\Column(type="text")
     */
    private $noi_dung_kr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTen(): ?string
    {
        return $this->ten;
    }

    public function setTen(string $ten): self
    {
        $this->ten = $ten;

        return $this;
    }

    public function getGiaNhap(): ?int
    {
        return $this->gia_nhap;
    }

    public function setGiaNhap(int $gia_nhap): self
    {
        $this->gia_nhap = $gia_nhap;

        return $this;
    }

    public function getGiaHienThi(): ?int
    {
        return $this->gia_hien_thi;
    }

    public function setGiaHienThi(int $gia_hien_thi): self
    {
        $this->gia_hien_thi = $gia_hien_thi;

        return $this;
    }

    public function getGiaBan(): ?int
    {
        return $this->gia_ban;
    }

    public function setGiaBan(int $gia_ban): self
    {
        $this->gia_ban = $gia_ban;

        return $this;
    }

    public function getMieuTa(): ?string
    {
        return $this->mieu_ta;
    }

    public function setMieuTa(string $mieu_ta): self
    {
        $this->mieu_ta = $mieu_ta;

        return $this;
    }

    public function getAnhDaiDien(): ?string
    {
        return $this->anh_dai_dien;
    }

    public function setAnhDaiDien(string $anh_dai_dien): self
    {
        $this->anh_dai_dien = $anh_dai_dien;

        return $this;
    }

    public function getAnh1(): ?string
    {
        return $this->anh_1;
    }

    public function setAnh1(?string $anh_1): self
    {
        $this->anh_1 = $anh_1;

        return $this;
    }

    public function getAnh2(): ?string
    {
        return $this->anh_2;
    }

    public function setAnh2(?string $anh_2): self
    {
        $this->anh_2 = $anh_2;

        return $this;
    }

    public function getAnh3(): ?string
    {
        return $this->anh_3;
    }

    public function setAnh3(?string $anh_3): self
    {
        $this->anh_3 = $anh_3;

        return $this;
    }

    public function getAnh4(): ?string
    {
        return $this->anh_4;
    }

    public function setAnh4(?string $anh_4): self
    {
        $this->anh_4 = $anh_4;

        return $this;
    }

    public function getLuotXem(): ?int
    {
        return $this->luot_xem;
    }

    public function setLuotXem(int $luot_xem): self
    {
        $this->luot_xem = $luot_xem;

        return $this;
    }

    public function getTenKr(): ?string
    {
        return $this->ten_kr;
    }

    public function setTenKr(string $ten_kr): self
    {
        $this->ten_kr = $ten_kr;

        return $this;
    }

    public function getMieuTaKr(): ?string
    {
        return $this->mieu_ta_kr;
    }

    public function setMieuTaKr(string $mieu_ta_kr): self
    {
        $this->mieu_ta_kr = $mieu_ta_kr;

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

    public function getNoiDung(): ?string
    {
        return $this->noi_dung;
    }

    public function setNoiDung(string $noi_dung): self
    {
        $this->noi_dung = $noi_dung;

        return $this;
    }

    public function getNoiDungKr(): ?string
    {
        return $this->noi_dung_kr;
    }

    public function setNoiDungKr(string $noi_dung_kr): self
    {
        $this->noi_dung_kr = $noi_dung_kr;

        return $this;
    }
}
