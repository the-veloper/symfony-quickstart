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
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Cart controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * Add to cart.
     *
     * @Route("/users", name="admin_list_users")
     * @Method("GET")
     */
    public function listUsersAction(Request $request)
    {
        $users = $this->getDoctrine()
          ->getRepository('UserBundle:User')
          ->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
          $users, /* query NOT result */
          $request->query->getInt('page', 1)/*page number*/,
          10    /*limit per page*/
        );

        return $this->render(
          'admin/users.html.twig',
          array('pagination' => $pagination)
        );
    }
}