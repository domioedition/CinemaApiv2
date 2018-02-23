<?php

namespace CinemaApi\Api;

use CinemaApi\Entity\Film as FilmEntity;

class Film extends AbstractApi
{

    public $films = [];

    public function getFilmInformation($search)
    {
        $filmInfo = $this->adapter->get(sprintf('%s%s', $this->endpoint, $search));
        $filmInfoArr = json_decode($filmInfo);

        return new FilmEntity($filmInfoArr);
    }


    public function getFilmsToRent()
    {
        $countFilms = 2;
        while ($countFilms > 0) {

            $randomImdbId = $this->getRandomId();

            $filmInfo = $this->adapter->get(sprintf('%s%s', $this->endpoint, $randomImdbId));
            sleep(5);
            $filmInfoArr = json_decode($filmInfo);
            if ($filmInfoArr->Response === "True") {
                $this->films[] = new FilmEntity($filmInfoArr);
                $countFilms--;
            }
        }

//        var_dump($this->films);
//
//        die;
        return $this->films;
    }


    //нарушение принципа SingeResposobillity
    public function getRandomId()
    {
        $id = 'tt';
        for ($i = 0; $i < 7; $i++) {
            $id .= random_int(0, 9);
        }
        return $id;
    }


}
