<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonHangRepository")
 */
class DonHang
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ten_khach;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $sdt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dia_chi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noi_dung;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $tong_tien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenKhach(): ?string
    {
        return $this->ten_khach;
    }

    public function setTenKhach(string $ten_khach): self
    {
        $this->ten_khach = $ten_khach;

        return $this;
    }

    public function getSdt(): ?string
    {
        return $this->sdt;
    }

    public function setSdt(string $sdt): self
    {
        $this->sdt = $sdt;

        return $this;
    }

    public function getDiaChi(): ?string
    {
        return $this->dia_chi;
    }

    public function setDiaChi(string $dia_chi): self
    {
        $this->dia_chi = $dia_chi;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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

    public function getTongTien(): ?string
    {
        return $this->tong_tien;
    }

    public function setTongTien(string $tong_tien): self
    {
        $this->tong_tien = $tong_tien;

        return $this;
    }
}
