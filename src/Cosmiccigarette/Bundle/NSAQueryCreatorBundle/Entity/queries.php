<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * queries
 */
class queries
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $query;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set query
     *
     * @param string $query
     * @return queries
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get query
     *
     * @return string 
     */
    public function getQuery()
    {
        return $this->query;
    }
}
