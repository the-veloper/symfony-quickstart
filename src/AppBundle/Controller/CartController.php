<?php
/**
 * Created by PhpStorm.
 * User: gopsan
 * Date: 4/29/17
 * Time: 3:19 PM
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Cart controller.
 *
 * @Route("/cart")
 */
class CartController
{
    /**
     * Add to cart.
     *
     * @Route("/add", name="cart_add")
     * @Method("POST")
     */
    public function addToCartAction(Request $request)
    {
        $session = new Session();
        $session->start();
        $current_total = $session->get('current_total', 0);
        $product_id = $request->query->get('product_id');
        $product_qty = $request->query->get('product_qty');
        $product = $this->getDoctrine()
          ->getRepository('AppBundle:Product')
          ->find($product_id);
        $current_total += $product->price * $product_qty;

        return new JsonResponse(['success' => true, 'new_total' => $current_total]);
    }

    /**
     * View card.
     *
     * @Route("/view", name="view_cart")
     * @Method("GET")
     */
    public function viewCartAction(Request $request)
    {
        $session = new Session();
        $session->start();
        $current_total = $session->get('current_total', 0);
        $product_id = $request->query->get('product_id');
        $product_qty = $request->query->get('product_qty');
        $product = $this->getDoctrine()
          ->getRepository('AppBundle:Product')
          ->find($product_id);
        $current_total += $product->price * $product_qty;

        return new JsonResponse(['success' => true, 'new_total' => $current_total]);
    }
}