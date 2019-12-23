<?php

namespace App\Controller;

use App\Entity\SanPham;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends AbstractController
{
  public function index(Request $request) {
    $lang = $request->query->get('lang');

    $repository = $this->getDoctrine()->getRepository(SanPham::class);

    $products = $repository->findAll();

    return $this->render('index.html.twig', [
      "products" => $products,
      "lang" => $lang
    ]);
  }

  public function detail(Request $request, $id) {
    $lang = $request->query->get('lang');
    $repository = $this->getDoctrine()->getRepository(SanPham::class);

    $product = $repository->find($id);

    $product->setLuotXem($product->getLuotXem() + 1);
    $this->getDoctrine()->getManager()->flush();

    return $this->render('detail.html.twig', [
      "product" => $product,
      "lang" => $lang
    ]);
  }

  public function contact() {
    return $this->render('contact.html.twig');
  }

  public function changeLang(Request $request, $lang) {

    $session = new Session();
    if ($session->get('LANG') == NULL) {
      $session->start();
    }
    $session->set('LANG', $lang);

    return $this->redirect($request->headers->get('referer'));
  }

  public function cart() {
    return $this->render('cart.html.twig');
  }
}
