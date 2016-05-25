<?php
namespace Newsletter\Model\Behavior;

use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Utility\Hash;

/**
 * ImportCSV behavior
 */
class ImportCSVBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function import($filename = '')
    {
        $file = new File($filename);
        if (!$file->open()) {
            throw new \OutOfBoundsException(sprintf('File not found %s', $filename));
        }
        $headers = fgetcsv($file->handle);
        $users = [];
        while (($row = fgetcsv($file->handle)) !== false) {
            $users[] = $this->_createEntity($headers, $row);
        }
        $file->close();
        return $this->_table->saveMany($users);
    }

    protected function _createEntity($headers = [], $row = [])
    {
        $data = [];
        foreach ($headers as $key => $field) {
            $data[$field] = Hash::get($row, $key);
        }

        return $this->_table->newEntity($data);
    }
}
