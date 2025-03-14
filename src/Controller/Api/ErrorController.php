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
        $usuario = $raw['usuario']??null;
        $usuarioObjeto = $raw['usuario_objeto']??null;
        $ruta = $raw['ruta']??null;
        $traza = $raw['traza']??null;
        $trazaObjeto = $raw['traza_objeto']??null;
        $entorno = $raw['entorno']??null;
        $contenedor = $raw['contenedor']??null;
        $contenedorObjeto = $raw['contenedor_objeto']??null;
        $data = $raw['data']??null;
        $peticion = $raw['peticion']??null;
        if($mensaje) {
            $arError = new Error();
            $arError->setFecha(new \DateTime('now'));
            $arError->setMensaje($mensaje);
            $arError->setArchivo($archivo);
            $arError->setUsuario($usuario);
            $arError->setData($usuarioObjeto);
            $arError->setRuta($ruta);
            $arError->setTraza($traza);
            $arError->setTrazaObjeto($trazaObjeto);
            $arError->setEntorno($entorno);
            $arError->setContenedor($contenedor);
            $arError->setContenedorObjeto($contenedorObjeto);
            $arError->setData($data);
            $arError->setPeticion($peticion);
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

    #[Route("/api/error/lista")]
    public function lista(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $arErrores = $em->getRepository(Error::class)->lista($raw);
        return $this->view(['errores' => $arErrores], 200);
    }

    #[Route("/api/error/eliminar")]
    public function eliminar(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $errores = $raw['errores']??null;
        if($errores) {
            if(is_array($errores)) {
                foreach ($errores as $error) {
                    $arError = $em->getRepository(Error::class)->find($error['id']);
                    if($arError) {
                        $em->remove($arError);
                    }
                }
                $em->flush();
            }
        }
        return $this->view(['mensaje' => 'Errores eliminados'], 200);
    }

    #[Route("/api/error/detalle")]
    public function detalle(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $errorId = $raw['errorId']??null;
        if($errorId) {
            $arError = $em->getRepository(Error::class)->detalle($errorId);
            return $this->view(['error' => $arError], 200);
        } else {
            return [
                'error' => true,
                'errorMensaje' => "Faltan parametros para el consumo de la api"];
        }
    }

    #[Route("/api/error/resumen")]
    public function resumen(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $arrResumen = $em->getRepository(Error::class)->resumen();
        return $this->view(['resumen' => $arrResumen], 200);
    }

    #[Route("/api/error/limpiar")]
    public function limpiar(Request $request, EntityManagerInterface $em)
    {
        $raw = json_decode($request->getContent(), true);
        $em->createQueryBuilder()->delete(Error::class, 'e')->getQuery()->execute();
        return $this->view(['mensaje' => 'Errores eliminados'], 200);
    }
}
