<?php

/* 
 * Classes.php
 * Copyright (c) Leonid B
 *
 */

//***************************************************************

class Rate {
    public $rate;

    public function generate() {
        $this->rate = rand(0, 100);
    }
    
    public function show() {
        echo 'Rate of music: ' . (100 - $this->rate) . '%<br><br>';
    }
}

//***************************************************************

interface IAttitude {
    public function name();
    public function rate();
}

class LikeDance implements IAttitude {
    public function name() {
        echo '<em>I like to dance :) :) :)</em><br>';
    }
    
    public function rate() {
        return 90;
    }
}

class AbleDance implements IAttitude {
    public function name() {
        echo '<em>I am able to dance %)</em><br>';
    }
    
    public function rate() {
        return 50;
    }    
}

class CanDance implements IAttitude {
    public function name() {
        echo '<em>I can dance 8)</em><br>';
    }
    
    public function rate() {
        return 70;
    }    
}

class AttitudeFactory {
    public function randomCreateAttitude() {
        $i = rand(1, 3);
        switch ($i) {
            case 1: return new LikeDance();
            case 2: return new AbleDance();
            case 3: return new CanDance();
        }
        return false;
    }
}

//***************************************************************

interface IMovie {
    public function move();
}

// body

abstract class BodyMovie implements IMovie {
    
}

class ForwardBackwardBodyShake extends BodyMovie {
    public function move() {
        echo '<tt> - shake body forward and backward</tt><br>';
    }
}

class SmoothBodyMovie extends BodyMovie {
    public function move() {
        echo '<tt> - move body smooth</tt><br>';
    }    
}

// legs

abstract class LegsMovie implements IMovie {
    
}

class CrouchLegsMovie extends LegsMovie {
    public function move() {
        echo '<tt> - set legs to crouch</tt><br>';
    }
}

class RythmLegsMovie extends LegsMovie {
    public function move() {
        echo '<tt> - move legs in rythm</tt><br>';
    }
}

class SmoothLegsMovie extends LegsMovie {
    public function move() {
        echo '<tt> - move legs smooth</tt><br>';
    }
}

// head

abstract class HeadMovie implements IMovie {
    
}

class ForwardBackwardHeadShake extends HeadMovie {
    public function move() {
        echo '<tt> - shake head forward and backward</tt><br>';
    }
}

class NoHeadMovie extends HeadMovie {
    public function move() {
        echo '<tt> - there is not head movements almost</tt><br>';
    }
}

class SmoothHeadMovie extends HeadMovie {
    public function move() {
        echo '<tt> - move head smooth</tt><br>';
    }
}

// arms

abstract class ArmsMovie implements IMovie {
    
}

class BentArmsMovie extends ArmsMovie {
    public function move() {
        echo '<tt> - arms bent at the elbows</tt><br>';
    }
}

class RotatingArmsMovie extends ArmsMovie {
    public function move() {
        echo '<tt> - rotating arms - a circular motion</tt><br>';
    }
}

class SmoothArmsMovie extends ArmsMovie {
    public function move() {
        echo '<tt> - move arms smooth</tt><br>';
    }
}

//***************************************************************

abstract class Action {
    protected $action;

    protected $bodyMovie;
    protected $headMovie;
    protected $legsMovie;
    protected $armsMovie;
    
    protected function performMovies() {
        $this->bodyMovie->move();
        $this->headMovie->move();
        $this->legsMovie->move();
        $this->armsMovie->move();
    }

    public function performAction() {
        echo $this->action;
    }
}

class HipHopDance extends Action {
    public function __construct() {
        $this->action = 'I dance HipHop...<br>';
        
        $this->bodyMovie = new ForwardBackwardBodyShake();
        $this->headMovie = new ForwardBackwardHeadShake();
        $this->legsMovie = new CrouchLegsMovie();
        $this->armsMovie = new BentArmsMovie();
    }
    
    public function performAction() {
        parent::performAction();
        $this->performMovies();
    }
}

class RnbDance extends Action {
    public function __construct() {
        $this->action = 'I dance Rnb...<br>';
    }
}

class ElectodanceDance extends Action {
    public function __construct() {
        $this->action = 'I dance Electodance...<br>';
        
        $this->bodyMovie = new ForwardBackwardBodyShake();
        $this->headMovie = new NoHeadMovie();
        $this->legsMovie = new RythmLegsMovie();
        $this->armsMovie = new RotatingArmsMovie();
    }
    
    public function performAction() {
        parent::performAction();
        $this->performMovies();
    }
}

class HouseDance extends Action {
    public function __construct() {
        $this->action = 'I dance House...<br>';
    }
}

class PopDance extends Action {
    public function __construct() {
        $this->action = 'I dance Pop...<br>';
        
        $this->bodyMovie = new SmoothBodyMovie;
        $this->headMovie = new SmoothHeadMovie;
        $this->legsMovie = new SmoothLegsMovie;
        $this->armsMovie = new SmoothArmsMovie;
    }
    
    public function performAction() {
        parent::performAction();
        $this->performMovies();
    }
}

class DrinkVodka extends Action {
    public function __construct() {
        $this->action = 'I go to the bar and drink VODKA!!!<br>';
    }
}

class DanceFactory {
    public function randomCreateDance() {
        $i = rand(1, 5);
        switch ($i) {
            case 1: return new HipHopDance();
            case 2: return new RnbDance;
            case 3: return new ElectodanceDance;
            case 4: return new HouseDance;
            case 5: return new PopDance;
        }
        return false;
    }
}

//***************************************************************

interface IMusic {
    public function play();
    public function canDance($dance);
}

class Rnb implements IMusic {
    public function play() {
        echo '<b>Now playing Rnb music ;)</b><br><br>';
    }
    
    public function canDance($dance) {
        if (($dance instanceof HipHopDance) || ($dance instanceof RnbDance))
            return true;
        else
            return false;
    }
}

class Electrohouse implements IMusic {
    public function play() {
        echo '<b>Now playing Electrohouse music :O</b><br><br>';
    }
    
    public function canDance($dance) {
        if (($dance instanceof ElectodanceDance) || ($dance instanceof HouseDance))
            return true;
        else
            return false;
    }
}

class Pop implements IMusic {
    public function play() {
        echo '<b>Now playing Pop music :$</b><br><br>';
    }

    public function canDance($dance) {
        if ($dance instanceof PopDance)
            return true;
        else
            return false;
    }
}

class MusicFactory {
    public function randomCreateMusic() {
        $i = rand(1, 3);
        switch ($i) {
            case 1: return new Rnb();
            case 2: return new Electrohouse();
            case 3: return new Pop();
        }
    }
}

//***************************************************************

interface IVisitor {
    public function update($music, $rate);
}

abstract class Person implements IVisitor {
    protected $name;
    protected $sex;
    protected $dances = [];
    protected $action;
    protected $attitude;
    protected $club;

    public function __construct($name, $club) {
        $this->name = $name;
        $this->sex = '';
        $this->action = null;
        $this->attitude = null;
        $this->club = $club;
        $this->club->register($this);
    }
    
    private function getAptDances($music) {
        $flag = false; 
        $aptDances = [];
        
        for ($i = 0; $i < count($this->dances); $i++) {
            $flag = $music->canDance($this->dances[$i]);
            if ($flag)
                $aptDances[] = $this->dances[$i];
        }

        return $aptDances;
    }
    
    private function setAction($aptDances, $rate) {
        $c = count($aptDances);
        if ($c && $this->attitude->rate() > $rate->rate) {
            if ($c > 1)
                $i = rand(0, $c - 1);
            else
                $i = 0;
            $this->action = $aptDances[$i];
        } else {
            $this->action = new DrinkVodka();
        }
    }

    public function update($music, $rate) {
        $aptDances = $this->getAptDances($music);
        $this->setAction($aptDances, $rate);
        $this->whoAmI();
        $this->action->performAction();
        echo '<br>';
    }
    
    public function setDances(array $dances) {
        $this->dances = $dances;
    }
    
    public function setAttitude($attitude) {
        $this->attitude = $attitude;
    }

    public function whoAmI() {
        echo "I am a {$this->sex} ;) My name is {$this->name} :)<br>";
        $this->attitude->name();
//        var_dump($this->dances);
//        echo '<br>';
    }
}

class Boy extends Person {
    public function __construct($name, $club) {
        parent::__construct($name, $club);
        $this->sex  = 'boy';
    }
}

class Girl extends Person {
    public function __construct($name, $club) {
        parent::__construct($name, $club);
        $this->sex  = 'girl';
    }
}

class PersonFactory {
    public function createPerson($name, $sex, $club) {
        switch ($sex) {
            case 'm': return new Boy ($name, $club);
            case 'f': return new Girl($name, $club);
        }
        return false;
    }
    
    public function randomCreatePerson($club) {
        $sex        = ['m', 'f'];
        $nameMale   = ['John', 'Arnold', 'Bruce', 'Stanly', 'Silvester', 'VinDiesel', 'Jayson'];
        $nameFemale = ['Jessica', 'Alice', 'Mary', 'Vika', 'Kate', 'Milla', 'Angelina', 'Sandra', 'Amanda'];
        
        $i = rand(1, 100);
        $i = $i > 70 ? 0 : 1;
        
        switch ($i) {
            case 0: $j = rand(0, count($nameMale  ) - 1); $name = $nameMale  [$j]; break;
            case 1: $j = rand(0, count($nameFemale) - 1); $name = $nameFemale[$j]; break;
        }
        
        $df = new DanceFactory();
        $dances = [$df->randomCreateDance(), $df->randomCreateDance()];
        
        $af = new AttitudeFactory();
        $attitude = $af->randomCreateAttitude();
        
        $person = $this->createPerson($name, $sex[$i], $club);
        if ($person) {
            $person->setDances($dances);
            $person->setAttitude($attitude);
        }
        return $person;
    }
}

//***************************************************************

interface IClub {
    public function register($visitor);
    public function remove($visitor);
    public function notify();
}

class Club implements IClub {
    private $music;
    private $mf;
    private $visitors = array();
    private $rate;

    public function __construct($mf) {
        if ($mf instanceof MusicFactory)
            $this->mf = $mf;
        else
            throw new Exception('Party has been canceled today ;(');
        
        $this->rate = new Rate();
    }

    public function playMusic() {
        $this->music = $this->mf->randomCreateMusic();
        $this->music->play();
        $this->rate->generate();
        $this->rate->show();
        $this->notify();
    }
    
    public function register($visitor) {
        if ($visitor)
            $this->visitors[] = $visitor;
        else
            throw new Exception('Get out of here (((');
    }
    
    public function remove($visitor) {
        $i = array_search($visitor, $this->visitors);
        if ($i) {
            unset($this->visitors[$i]);
            sort($this->visitors);
        }
    }
    
    public function notify() {
        for ($i = 0; $i < count($this->visitors); $i++)
            $this->visitors[$i]->update($this->music, $this->rate);
    }
}

//***************************************************************


