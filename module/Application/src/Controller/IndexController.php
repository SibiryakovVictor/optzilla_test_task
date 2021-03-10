<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\GuestMessage;
use Application\Service\GuestMessageManager;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;

class IndexController extends AbstractActionController
{
    /**
     * @var Application\Service\GuestMessageManager 
     */
    private GuestMessageManager $guestMessageManager;

    public function __construct(GuestMessageManager $guestMessageManager)
    {
        $this->guestMessageManager = $guestMessageManager;
    }

    public function indexAction()
    {
        $form = (new AnnotationBuilder())->createForm(GuestMessage::class);
        $form->add([
            'type' => 'csrf',
            'name' => 'csrf'
        ]);

        if ($this->getRequest()->isPost()) {
            
            $data = $this->params()->fromPost();

            $form->setData($data);
            $form->setValidationGroup(FormInterface::VALIDATE_ALL);
            if ($form->isValid()) {
                $data = $form->getData();

                $this->guestMessageManager->addNewMessage($data);

                return $this->redirect()->toRoute('application');
            }
        }

        $page = $this->params()->fromQuery('page', 1);
        $adapter = new DoctrineAdapter(new ORMPaginator($this->guestMessageManager->findMessages(), false));
        $paginator = (new Paginator($adapter))
            ->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(15);

        return new ViewModel([
            'form' => $form,
            'messages' => $paginator
        ]);
    }
}
