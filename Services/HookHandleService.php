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

    const       CHECK_COMPLETE          = "check.completed";
    const       REPORT_COMPLETE         = "report.completed";


    public function __construct(
        MangoPayRepositoryFactory $mangoPayRepositoryFactory,
        SlackService $slackService,
        EventDispatcherInterface $event
    )
    {
        $this->mangoPayRepositoryFactory = $mangoPayRepositoryFactory;
        $this->slackService = $slackService;
        $this->event = $event;
    }

    public function processRequest($bodyJson)
    {
        $formattedJson = json_encode($bodyJson);
        $this->sendMessage(
            "New Webhook received from MangoPay \n ```" . $formattedJson . "```",
            ':leftwards_arrow_with_hook:'
        );

        $hookQueueEntity = new Hook();
        $hookQueueEntity->setHookId($bodyJson->Id);
        $hookQueueEntity->setHookCreationDate($bodyJson->CreationDate);
        $hookQueueEntity->setHookTag($bodyJson->Tag);
        $hookQueueEntity->setHookUrl($bodyJson->Url);
        $hookQueueEntity->setHookStatus($bodyJson->Status);
        $hookQueueEntity->setHookValidity($bodyJson->Validity);
        $hookQueueEntity->setHookEventType($bodyJson->EventType);

        $hookQueueEntity->setRawHookData($formattedJson);

        $this->mangoPayRepositoryFactory->saveAndGetEntity($hookQueueEntity);

        return true;
    }

    public function processNewWebhooks(CommonOutputInterface $output)
    {
        $output->info(count($this->getAllNewWebhooks()) . " new hooks to check");

        foreach($this->getAllNewWebhooks() as $webHook) {
            $output->infoid(" Processing hook ID " . $webHook->getId() . " - Action Type = " . $webHook->getHookEventType());
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
        if (MangoPayConstants::isEventTypeOk($hook->getHookEventType())) {

        } else {
            $this->sendErrorMessage(
                "Received webhook from MangoPay *" . $hook->getHookEventType() ."*, which is unknown. Firing event anyway \n ```" . json_encode($hook->getRawHookData()) . "```",
                ':anguished:'
            );
        }

        $webhookEvent = new MangoPayWebhookEvent();
        $webhookEvent->setOutput($commonOutput);
        $webhookEvent->setHook($hook);

        $this->event->dispatch(MangoPayWebhookEvent::NAME, $webhookEvent);
        $this->setWebhookToActioned($hook);
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
        $this->slackService->sendMessage($message, FFConstants::SLACK_CHANNEL_ERROR, $emoji);
    }

}
