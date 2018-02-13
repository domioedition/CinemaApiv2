<?php

namespace CinemaApi\Entity;


abstract class AbstractEntity
{

    public function __construct($parameters = null)
    {
        if (!$parameters) {
            return;
        }

        if ($parameters instanceof \stdClass) {
            $parameters = get_object_vars($parameters);
        }
        $this->build($parameters);
    }

    public function build(array $parameters)
    {
        foreach ($parameters as $property => $value) {
            $property = mb_strtolower($property);
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }


}