<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    09:12
 * Project: PartFire MangoPay Bundle
 * File:    ApiController.php
 *
 **/

namespace PartFire\MangoPayBundle\Controller;

use PartFire\CommonBundle\Controller\ApiBaseController;
use PartFire\MangoPayBundle\Services\HookHandleService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends ApiBaseController
{
    public function webhookAction(Request $request)
    {
        $allVars = $request->query->all();

        $onfidoWebHookService = $this->getPartFireMangoPayService();
        $onfidoWebHookService->processRequest($allVars);

        return new Response('', 201);
    }

    private function getPartFireMangoPayService() : HookHandleService
    {
        return $this->container->get('part_fire_mango_pay.services.webhook');
    }
}