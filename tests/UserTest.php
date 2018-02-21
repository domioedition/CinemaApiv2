<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    
    public function testAssertsTrue()
        {
            $this->assertTrue(true);
        }
    

    public function testFilm()
    {
       $adapter = new AdapterTest();
       $main = new \CinemaApi\MainApi($adapter);
       $film = $main->film();
       $objectFilm = $film->getFilmInformation($search=null);

       $this->assertEquals('Green mile',$objectFilm->title);
       $this->assertEquals('1993',$objectFilm->year);
       $this->assertEquals('someimage',$objectFilm->poster);
       $this->assertEquals('tt234234',$objectFilm->imdbid);
       $this->assertEquals('9,2',$objectFilm->imdbrating);
       $this->assertEquals('true',$objectFilm->response);

       $this->assertInstanceOf('AdapterTest',$adapter);
       $this->assertInstanceOf('CinemaApi\MainApi',$main);
       $this->assertInstanceOf('CinemaApi\Entity\Film',$objectFilm);
    }
}
