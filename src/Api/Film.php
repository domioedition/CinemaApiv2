<?php

namespace CinemaApi\Api;

use CinemaApi\Entity\Film as FilmEntity;

class Film extends AbstractApi{

    public function getFilmInformation($search) {
        $filmInfo = $this->adapter->get(sprintf('%s%s', $this->endpoint, $search));
        $filmInfoArr = json_decode($filmInfo);

        return new FilmEntity($filmInfoArr);
    }
}
