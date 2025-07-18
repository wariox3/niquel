<?php

namespace App\Controller\Api;

use App\Entity\Acceso;
use App\Entity\Error;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccesoController extends AbstractFOSRestController
{

    #[Route("/api/acceso/nuevo")]
    public function nuevo(Request $request, EntityManagerInterface $em) {
        $raw = json_decode($request->getContent(), true);
        $host = $raw['host']??null;
        $ip = $raw['ip']??null;
        $remote_user = $raw['remote_user']??null;
        $auth_user = $raw['auth_user']??null;
        $timestamp = $raw['timestamp']??null;
        $method = $raw['method']??null;
        $path = $raw['path']??null;
        $protocol = $raw['protocol']??null;
        $status = $raw['status']??null;
        $bytes = $raw['bytes']??null;
        $referer = $raw['referer']??null;
        $user_agent = $raw['user_agent']??null;
        $processed_at = $raw['processed_at']??null;
        return ['error' => false];
    }

    #[Route("/api/acceso/host", methods: ['GET'])]
    public function host(Request $request, EntityManagerInterface $em) {
        $arAccesoHost = $em->getRepository(Acceso::class)->accesoHost();
        return $this->view(['accesoHost' => $arAccesoHost], 200);
    }
}
