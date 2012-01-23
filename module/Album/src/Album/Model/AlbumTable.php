<?php

namespace Album\Model;

use Zend\Db\Table\AbstractTable;

/**
 * Album model
 *
 * @author suleymanmelikoglu
 */
class AlbumTable extends AbstractTable {
    
    protected $_name = "album";
    
    public function getAlbum($id) {
        $id = (int)$id;
        $row = $this->fetchRow("id = " . $id);
        if(!$row) {
            throw new Exception("Could not find the row", 404);
        }
        return $row->toArray();
    }
    
    public function addAlbum($artist, $title) {
        $data = array(
            'artist' => $artist,
            'title' => $title
        );
        $this->insert($data);
    }
    
    public function updateAlbum($id, $artist, $title) {
        $data = array(
            'artist' => $artist,
            'title' => $title
        );
        $this->update($data, "id = " . (int)$id);
    }
    
    public function deleteAlbum($id) {
        $this->delete("id = " . $id);
    }
    
}
