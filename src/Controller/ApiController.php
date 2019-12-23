<?php

namespace App\Controller;

use App\Entity\DonHang;
use App\Entity\OrderItem;
use App\Entity\SanPham;
use App\Entity\SearchItem;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Content-Length, X-Requested-With");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE,OPTIONS");

class ApiController extends AbstractController
{
  public function getCart(Request $request)
  {
    $orderItem = json_decode($request->getContent());
    $arrIds = [];
    $quantityObjs = new stdClass;
    if ($orderItem == NULL) {
      return $this->json([]);
    }

    foreach($orderItem as $item) {
      array_push($arrIds, $item[0]);
      $key = $item[0].'';
      $quantityObjs->$key = $item[1];
    }

    $products = $this->getDoctrine()->getRepository(SanPham::class)->findBy([
      'id' => $arrIds
    ]);

    $orderItems = [];
    foreach ($products as $product) {
      $idProduct = $product->getId();
      $orderItem = new OrderItem();
      $orderItem->setIdProduct($idProduct);
      $orderItem->setName($product->getTen());
      $orderItem->setNameKr($product->getTenKr());
      $orderItem->setQuantity($quantityObjs->$idProduct);
      $orderItem->setImage($product->getAnhDaiDien());
      $orderItem->setPrice($product->getGiaBan());
      
      array_push($orderItems, $orderItem);
    }

    return $this->json($orderItems);
  }

  public function postOrder(Request $request) {
    $order = json_decode($request->getContent());

    $donHang = new DonHang();
    $donHang->setTenKhach($order->ten_khach);
    $donHang->setSdt($order->sdt);
    $donHang->setDiaChi($order->dia_chi);
    $donHang->setNote($order->note);
    $donHang->setNoiDung($order->noi_dung);
    $donHang->setTongTien($order->tong_tien);

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($donHang);
    $entityManager->flush();

    return $this->json(["code" => 1, "message" => "request order's success."]);
  }

  public function searchProduct(Request $request) {
    $keyword = $request->query->get('keyword');
    $products = [];
    foreach($this->getDoctrine()->getRepository(SanPham::class)->search($keyword) as $product) {
      $item = new SearchItem();

      $item->setIdProduct($product->getId());
      $item->setTen($product->getTen());
      $item->setTenKr($product->getTenKr());
      $item->setUrlSeo($product->getUrlSeo());
      array_push($products, $item);
    }
    return $this->json($products);
  }

  public function addProduct(Request $request) {
    if ($request->isMethod('POST')) {
      $dataBody = json_decode($request->getContent());

      $sanPham = new SanPham();
      $sanPham->setTen($dataBody->ten);
      $sanPham->setTenKr($dataBody->ten_kr);
      $sanPham->setGiaNhap($dataBody->gia_nhap);
      $sanPham->setGiaHienThi($dataBody->gia_hien_thi);
      $sanPham->setGiaBan($dataBody->gia_ban);
      $sanPham->setAnhDaiDien($dataBody->anh_dai_dien);
      $sanPham->setAnh1($dataBody->anh_1);
      $sanPham->setAnh2($dataBody->anh_2);
      $sanPham->setAnh3($dataBody->anh_3);
      $sanPham->setAnh4($dataBody->anh_4);
      $sanPham->setUrlSeo($dataBody->url_seo);
      $sanPham->setMieuTa($dataBody->mieu_ta);
      $sanPham->setMieuTaKr($dataBody->mieu_ta_kr);
      $sanPham->setNoiDung($dataBody->noi_dung);
      $sanPham->setNoiDungKr($dataBody->noi_dung_kr);
      $sanPham->setLuotXem(0);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($sanPham);
      $entityManager->flush();

      return $this->json(["code" => 1, "message" => "create product's success."]);
    }

    return $this->json(["code" => 0, "message" => "method's not invalid."]);
  }

  public function uploadImage(Request $request) {
    $image = $request->files->get('image');
    if ($image === NULL) {
      return $this->json(["code" => 0, "message" => "image is required."]);  
    }
    $documentRoot = $this->getParameter('kernel.project_dir');
    $fileName = $image->getClientOriginalName();

    $desFileName = md5(time()).substr($fileName, stripos('.', $fileName));
    move_uploaded_file($image->getPathName(), "$documentRoot\public\img\product-img\\$desFileName");
    return $this->json(["code" => 1, "message" => "/img/product-img/$desFileName"]);
  }
}