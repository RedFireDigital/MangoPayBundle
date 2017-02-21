<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    09:52
 * Project: PartFire MangoPay Bundle
 * File:    HookHandleService.php
 *
 **/

namespace PartFire\MangoPayBundle\Services;

use Composer\EventDispatcher\Event;
use Fruitful\FFConstants;
use PartFire\CommonBundle\Services\Output\CommonOutputInterface;
use PartFire\MangoPayBundle\Entity\Hook;
use PartFire\MangoPayBundle\Entity\Repository\HookRepository;
use PartFire\MangoPayBundle\Entity\Repository\MangoPayRepositoryFactory;
use PartFire\MangoPayBundle\Event\MangoPayWebhookEvent;
use PartFire\MangoPayBundle\MangoPayConstants;
use PartFire\SlackBundle\Services\SlackService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HookHandleService
{
    /**
     * @var IdentityCheckFactoryRepository
     */
    protected $mangoPayRepositoryFactory;
    protected $slackService;
    private $payIn;
    private $payOut;
    private $transfer;
    private $kyc;

    const       CHECK_COMPLETE          = "check.completed";
    const       REPORT_COMPLETE         = "report.completed";


    public function __construct(
        MangoPayRepositoryFactory $mangoPayRepositoryFactory,
        SlackService $slackService,
        EventDispatcherInterface $event,
        PayIn $payIn,
        PayOut $payOut,
        Transfer $transfer,
        Kyc $kyc
    )
    {
        $this->mangoPayRepositoryFactory = $mangoPayRepositoryFactory;
        $this->slackService = $slackService;
        $this->event = $event;
        $this->payIn = $payIn;
        $this->payOut = $payOut;
        $this->transfer = $transfer;
        $this->kyc = $kyc;
    }

    public function processRequest($getArray)
    {
        $formattedJson = json_encode($getArray);
        $this->sendMessage(
            "New Webhook received from MangoPay \n ```" . $formattedJson . "```",
            ':leftwards_arrow_with_hook:'
        );

        $hookQueueEntity = new Hook();
        $hookQueueEntity->setEventType($getArray[MangoPayConstants::HOOK_EVENT_TYPE]);
        $hookQueueEntity->setResourceId($getArray[MangoPayConstants::HOOK_RESOURCE_ID]);
        $hookQueueEntity->setDate($getArray[MangoPayConstants::HOOK_DATE]);

        $hookQueueEntity->setRawHookData($formattedJson);

        $this->mangoPayRepositoryFactory->saveAndGetEntity($hookQueueEntity);

        return true;
    }

    public function processNewWebhooks(CommonOutputInterface $output)
    {
        $output->info(count($this->getAllNewWebhooks()) . " new hooks to check");

        foreach($this->getAllNewWebhooks() as $webHook) {
            $output->infoid(" Processing hook ID " . $webHook->getResourceId() . " - Action Type = " . $webHook->getEventType());
            try {
                $this->processWebhook($webHook, $output);
            } catch (\Exception $e) {
                $output->error($e->getMessage());
            }

        }
    }

    private function processWebhook(Hook $hook, CommonOutputInterface $commonOutput)
    {
        $hook = $this->setWebhookInProgress($hook);
        if (MangoPayConstants::isEventTypeOk($hook->getEventType())) {

        } else {
            $this->sendErrorMessage(
                "Received webhook from MangoPay *" . $hook->getEventType() ."*, which is unknown. Firing event anyway \n ```" . json_encode($hook->getRawHookData()) . "```",
                ':anguished:'
            );
        }

        $dtoResponse = $this->getDTOReponse($hook, $commonOutput);
        $hook->setDto($dtoResponse);
        $hook = $this->mangoPayRepositoryFactory->saveAndGetEntity($hook);

        $webhookEvent = new MangoPayWebhookEvent();
        $webhookEvent->setOutput($commonOutput);
        $webhookEvent->setHook($hook);
        $webhookEvent->setDto($dtoResponse);

        $this->event->dispatch(MangoPayWebhookEvent::NAME, $webhookEvent);
        $this->setWebhookToActioned($hook);
    }

    private function getDTOReponse(Hook $hook, CommonOutputInterface $commonOutput)
    {
        $dto = null;
        $errorMsg = null;

        if (MangoPayConstants::isEventTypeToDoWithPayInNormal($hook->getEventType())) {
            $dto = $this->payIn->getPayIn($hook->getResourceId());
        }

        if (MangoPayConstants::isEventTypeToDoWithPayOutNormal($hook->getEventType())) {
            $dto = $this->payOut->get($hook->getResourceId());
        }

        if (MangoPayConstants::isEventTypeToDoWithTransferNormal($hook->getEventType())) {
            $dto = $this->transfer->get($hook->getResourceId());
        }

        if (MangoPayConstants::isEventTypeToDoWithPayInRefund($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithPayOutRefund($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithTransferRefund($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithPayInRepudiation($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithKYC($hook->getEventType())) {
            $dto = $this->kyc->getDocument($hook->getResourceId());
        }

        if (MangoPayConstants::isEventTypeToDoWithDisputeDocument($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithDispute($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithTransferSettlement($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithMandate($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (MangoPayConstants::isEventTypeToDoWithPreauthorisation($hook->getEventType())) {
            $errorMsg = $hook->getEventType() . " NOT YET HANDLED. NEEDS CODING UP!";
        }

        if (!is_null($errorMsg)) {
            $this->sendMessage(
                "Error, no code to action HookHandleService \n ```" . $errorMsg . "```",
                ':leftwards_arrow_with_hook:'
            );
            $commonOutput->error($errorMsg);

            throw new \Exception("Inbound hook with event " . $hook->getEventType() . " not handled!");
        }

        return $dto;
    }

    private function setWebhookInProgress(Hook $hook) : Hook
    {
        $hook->setStatus(MangoPayConstants::HOOK_IN_PROGRESS);
        return $this->mangoPayRepositoryFactory->saveAndGetEntity($hook);
    }

    private function setWebhookToActioned(Hook $hook)
    {
        $hook->setStatus(MangoPayConstants::HOOK_ACTIONED);
        $this->mangoPayRepositoryFactory->saveAndGetEntity($hook);
    }

    private function getIdentityCheckReportByOnfidoReportId(OnfidoHookQueue $onfidoHookQueue) : ?IdentityCheckReport
    {
        return $this->mangoPayRepositoryFactory->getIdentityCheckReport()->findOneByOnfidoReportId(
            $onfidoHookQueue->getResourceId()
        );
    }

    private function getAllNewWebhooks()
    {
        return $this->getHookRepo()->findBy(
            [
                'status'      => MangoPayConstants::HOOK_NEW
            ]
        );
    }

    private function getHookRepo() : HookRepository
    {
        return $this->mangoPayRepositoryFactory->getHook();
    }

    // Made public so tests pass

    public function isValidOnfidoRequest($bodyJson)
    {
        if ($bodyJson instanceof \stdClass) {

            if (!isset($bodyJson->payload->resource_type)) {
                return false;
            }

            if (!isset($bodyJson->payload->action)) {
                return false;
            }

            if (!isset($bodyJson->payload->object->id)) {
                return false;
            }

            if (!isset($bodyJson->payload->object->href) ||
                !strstr($bodyJson->payload->object->href, 'api.onfido.com/v') === true
            ) {
                return false;
            }

            return true;
        }
        return false;
    }

    private function sendMessage(string $message, string $emoji)
    {
        $this->slackService->sendMessage($message, 'ff-mangopay-webhooks', $emoji);
    }

    private function sendErrorMessage(string $message, string $emoji)
    {
        $this->slackService->sendMessage($message, 'ff-error', $emoji);
    }

}
