<?php

namespace Framework\Models;

class Log extends DatabaseModel
{
    protected $_table = 'logs';
    protected $_primary = 'log_id';
    protected $_cols = array(
        'log_id',
        'user_id',
        'module',
        'controller',
        'action',
        'created_date',
        'params'
    );

    public function findByUser($userId, $limit = null)
    {
        return $this->fetchAll(array('user_id' => $userId), array('created_date' => 'desc'), $limit);
    }

    public function getLogsWithUser()
    {
        $qBuilder = $this->_conn()->createQueryBuilder();

        $qBuilder->select('l.*, u.name as user_name, u.profile_photo as profile_photo, u.email as user_email')
                 ->from($this->_table, 'l')
                 ->leftJoin('l', 'users', 'u', 'l.user_id = u.user_id');

        if ($this->getSearchVar('orderBy')) {
            foreach ($this->getSearchVar('orderBy') as $column => $order) {
                $qBuilder->orderBy($column, $order);
            }
        }

        if ($this->getSearchVar('max')) {
            $qBuilder->setMaxResults($this->getSearchVar('max'));
        }

        if ($this->getSearchVar('offset')) {
            $qBuilder->setFirstResult($this->getSearchVar('offset'));
        }

        $dateBetween = $this->getSearchVar('dateBetween');
        if ($dateBetween) {
            $qBuilder->add('where', 'l.created_date BETWEEN :date_from AND :date_to')
                     ->setParameter('date_from', $dateBetween['from'])
                     ->setParameter('date_to', $dateBetween['to']);
        }

        $like = User::getUserLikeFilter($this->getSearchVar('search'));

        $orX = $qBuilder->expr()->orX();
        foreach ($like as $field => $value) {
            $orX->add($qBuilder->expr()->like($field, ":like"));
            $qBuilder->setParameter('like', $value);
        }
        if ($orX->count()) {
            $qBuilder->andWhere($orX);
        }

        return $qBuilder->execute()->fetchAll();
    }
    
}
