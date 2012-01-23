<?php

namespace Album\Controller;

use Zend\Mvc\Controller\ActionController,
    Album\Model\AlbumTable,
    Album\Form\AlbumForm;

/**
 * Description of AlbumController
 *
 * @author suleymanmelikoglu
 */
class AlbumController extends ActionController {

    /**
     * the model member
     * @var AlbumTable 
     */
    protected $albumTable;

    public function indexAction() {
        return array(
            'title' => "Album list",
            'albums' => $this->albumTable->fetchAll()
        );
    }

    public function addAction() {
        $form = new AlbumForm();
        $form->submit->setLabel('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->post()->toArray();
            if ($form->isValid($post)) {
                $artist = $form->getValue("artist");
                $title = $form->getValue('title');
                $this->albumTable->addAlbum($artist, $title);

                // redirect to the list of albums
                return $this->redirect()->toRoute('default',
                                array(
                            'controller' => 'album',
                            'action' => 'index'
                        ));
            } else {
                throw new Exception('invalid form, please re-fill');
            }
        }

        return array(
            'title' => 'Add album',
            'form' => $form
        );
    }

    public function editAction() {
        $form = new AlbumForm();
        $form->submit->setLabel('Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->post()->toArray();
            if ($form->isValid($post)) {
                $id = $form->getValue('id');
                $artist = $form->getValue("artist");
                $title = $form->getValue('title');

                if ($this->albumTable->getAdapter($id))
                    $this->albumTable->updateAlbum($id, $artist, $title);

                // redirect to the list of albums
                return $this->redirect()->toRoute('default',
                                array(
                            'controller' => 'album',
                            'action' => 'index'
                        ));
            } else {
                throw new Exception('invalid form, please re-fill');
            }
        } else {
            $id = $this->getRequest()->query()->get('id', 0);
            if ($id > 0)
                $form->populate($this->albumTable->getAlbum($id));
        }

        return array(
            'title' => 'Edit album',
            'form' => $form
        );
    }

    public function deleteAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->post()->get('del', 'No');
            if ($del == 'Yes') {
                $id = $request->post()->get('id');
                $this->albumTable->deleteAlbum($id);
            }
            // Redirect to list of albums
            return $this->redirect()->toRoute('default',
                            array(
                        'controller' => 'album',
                        'action' => 'index',
                    ));
        }
        $id = $request->query()->get('id', 0);
        return array(
            'title' => 'Delete Album',
            'album' => $this->albumTable->getAlbum($id)
                );
    }

    public function setAlbumTable(AlbumTable $albumTable) {
        $this->albumTable = $albumTable;
        return $this;
    }

}
