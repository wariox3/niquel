<?php

namespace App\Controller\Api;

use App\Entity\Error;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractFOSRestController
{

    #[Route("/api/error/nuevo")]
    public function nuevo(Request $request, EntityManagerInterface $em) {
        $raw = json_decode($request->getContent(), true);
        $archivo = $raw['archivo']??null;
        $mensaje = $raw['mensaje']??null;
        if($archivo && $mensaje) {
            $arError = new Error();
            $arError->setFecha(new \DateTime('now'));
            $arError->setMensaje($mensaje);
            $arError->setArchivo($archivo);
            $em->persist($arError);
            $em->flush();
            return [
                'error' => false];
        } else {
            return [
                'error' => true,
                'errorMensaje' => "Faltan parametros para el consumo de la api"];
        }
    }
}
