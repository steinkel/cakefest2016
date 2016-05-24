<?php
namespace Newsletter\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity.
 *
 * @property int $id
 * @property int $campaign_id
 * @property \Newsletter\Model\Entity\Campaign $campaign
 * @property int $user_id
 * @property \Newsletter\Model\Entity\User $user
 * @property string $subject
 * @property string $body
 * @property string $reference
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Log extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
