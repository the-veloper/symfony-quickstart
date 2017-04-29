<?php
/**
 * Created by PhpStorm.
 * User: gopsan
 * Date: 4/29/17
 * Time: 3:19 PM
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cart controller.
 *
 * @Route("/cart")
 */
class CartController extends Controller
{
    /**
     * Add to cart.
     *
     * @Route("/add", name="cart_add")
     * @Method("POST")
     */
    public function addToCartAction(Request $request)
    {
        $session = $request->getSession();
        $current_total = $session->get('current_total', 0);
        $product_id = $request->request->get('product_id');
        $product_qty = $request->request->get('product_qty');
        $product = $this->getDoctrine()
          ->getRepository('AppBundle:Product')
          ->find($product_id);
        $current_total += $product->price * $product_qty;
        $session->set('current_total', $current_total);

        return new JsonResponse(
          ['success' => true, 'new_total' => $current_total]
        );
    }

    /**
     * View cart.
     *
     * @Route("/view", name="view_cart")
     * @Method("GET")
     */
    public function viewCartAction(Request $request)
    {
        return new Response("bla-bla");
    }
}