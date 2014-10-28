<?php

namespace Framework\Models;

use Framework\Library\DBAL;

abstract class DatabaseModel
{
    const ONE_RESULT = 1;
    
    private $_conn = null;
    private $_connMaster = null;
    protected $_environment;
    protected $_table;
    protected $_primary;
    protected $_cols;
    protected $_database = 'default';
    protected $_searchVars = array();

    public function __construct($environment = null)
    {
        $this->_environment = $environment;
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    final protected function _conn($needToWrite = false)
    {
        if ((null !== $this->_environment) && $needToWrite) {
            if (null === $this->_connMaster) {
                $this->_connMaster = DBAL::getConnection($this->_database, $this->_environment, true);
            }
            
            return $this->_connMaster;
        } else {
            if (null === $this->_conn) {
                $this->_conn = DBAL::getConnection($this->_database, $this->_environment, false);
            }
            
            return $this->_conn;
        }
    }
    
    public function fetch(array $where, $order = null)
    {
        return array_shift($this->fetchAll($where, $order, 1));
    }

    public function findAll() 
    {
        return $this->fetchAll(array());
    }

    public function find($primaryKey)
    {
        return $this->fetch(array($this->_primary => $primaryKey));
    }

    public function delete($primaryKey)
    {
        return $this->deleteBy(array($this->_primary => $primaryKey));
    }

    public function fetchAll(array $where, $orderBy = null, $limit = null, $offset = null)
    {
        $qBuilder = $this->_conn()->createQueryBuilder();
        $qBuilder->select('*')
                 ->from($this->_table, 't');

        foreach ($where as $element => $value) {
            $qBuilder->andWhere("{$element} = :{$element}")
                     ->setParameter("{$element}", $value);
        }

        if (is_array($orderBy)) {
            foreach ($orderBy as $column => $order) {
                $qBuilder->orderBy($column, $order);
            }
        }

        if (!is_null($limit)) {
            $qBuilder->setMaxResults($limit);
        }

        if (!is_null($offset)) {
            $qBuilder->setFirstResult($offset);
        }

        return $qBuilder->execute()->fetchAll();
    }

    public function save($params, $primaryKey = null)
    {
        settype($primaryKey, 'integer');

        $bind = array();
        foreach ($params as $key => $val) {
            $key = strtolower($key);
            if (in_array($key, $this->_cols)) {
                $bind[$key] = $val;
            }
        }
        $params = $bind;

        if (empty($primaryKey)) {
            $this->_conn(true)->insert($this->_table, $params);
            return $this->_conn(true)->lastInsertId();
        }

        $this->_conn(true)->update(
                    $this->_table,
                    $params,
                    array($this->_primary => $primaryKey)
        );

        return $primaryKey;
    }

    public function countBy($where, $orderBy = null, $limit = null, $offset = null)
    {
        $qBuilder = $this->_conn()->createQueryBuilder();
        $qBuilder
            ->select('COUNT(t.' . $this->_primary . ') AS length')
            ->from($this->_table, 't');

        $paramNum = 0;
        foreach ($where as $field => $value) {
            $paramNum++;
            $qBuilder->add('where', 't.' . $field . ' = :' . $field . 'Param');
            $qBuilder->setParameter($field . 'Param', $value);
        }

        if (is_array($orderBy)) {
            foreach ($orderBy as $column => $order) {
                $qBuilder->orderBy($column, $order);
            }
        }

        if (!is_null($limit)) {
            $qBuilder->setMaxResults($limit);
        }

        if (!is_null($offset)) {
            $qBuilder->setFirstResult($offset);
        }

        $result = $qBuilder->execute()->fetch();

        return $result['length'];
    }

    public function deleteBy(array $where)
    {
        $qBuilder = $this->_conn(true)->createQueryBuilder();
        $qBuilder->delete($this->_table);

        foreach ($where as $element => $value) {
            $qBuilder->add('where', "{$element} = :value")
                     ->setParameter('value', $value);
        }

        return $qBuilder->execute();
    }

    public function ping()
    {
        if ($this->_conn()->ping() === false) {
            $this->_conn()->close();
            $this->_conn()->connect();
        }
    }

    public function setSearchVar($name, $value) 
    {
        $this->_searchVars[$name] = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSearchVar($name) 
    {
        $value = false;
        if (array_key_exists($name, $this->_searchVars)) {
             $value = $this->_searchVars[$name];
        } 
        return $value;
    }
}
