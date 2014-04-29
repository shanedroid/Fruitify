<?php

/*Fruit Basket - object that will function as container for holding the fruits && exchange of fruits*/
require_once 'app/config/config.php';

class FruitBasket
{

    private $_fruitArray = array(),
            $_inputCode,
            $_db;

    public function __construct($input = null)
    {
        $this->_inputCode = $input;
        $this->_db = Db::getInstance();
    }

    /**
     * [create array of random fruits]
     * @param  [int]   $count [the number of unique fruits needed for the swap]
     * @return [array] $this->_fruitArray [returns the array of random fruits]
     * @link http://snippetsofcode.wordpress.com/2011/08/01/fast-php-mysql-random-rows/
     * @link http://akinas.com/pages/en/blog/mysql_random_row/
     */
    public function pickFruit($count)
    {
        $doubleCount = $count * 2;//double the count used in calculation with the random number
        $fruitIDs = ''; //the choosen fruits (id's)

        //#1 get total count of fruits table
        $sql = "SELECT COUNT(*) FROM `fruits`";

        if ($query = $this->_db->prepare($sql)) {

            if ($query->execute()) {

                $allFruits = $query->fetch(PDO::FETCH_NUM);

            } else {

                print_r("ERROR QUERY DID NOT EXECUTE #1");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
            }

        } else {

            print_r("ERROR CHECK SQL SYNTAX #1");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
        }

        //#2 calculate random number to pull from all of id's
        $sql = "SELECT id FROM `fruits` WHERE RAND()* ? <  ? ORDER BY RAND() LIMIT 0, ? ";

        if ($query = $this->_db->prepare($sql)) {

            $query->bindParam(1, $allFruits[0], PDO::PARAM_INT);
            $query->bindParam(2, $doubleCount, PDO::PARAM_INT);
            $query->bindParam(3, $count, PDO::PARAM_INT);

            if ($query->execute()) {

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                        $fruitIDs[] = $row['id'];
                }

            } else {

                print_r("ERROR QUERY DID NOT EXECUTE #2");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
            }

        } else {

            print_r("ERROR CHECK SQL SYNTAX #2");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
        }

        //#3 get the fruits
        $inQuery = implode(',', array_fill(0, count($fruitIDs), '?'));

        $sql="SELECT NAME FROM `fruits` WHERE `id` IN($inQuery)";

        if ($query = $this->_db->prepare($sql)) {

            if ($query->execute($fruitIDs)) {

                while ($row = $query->fetch(PDO::FETCH_NUM)) {

                     $this->_fruitArray[] = $row[0];
                }

            } else {

                print_r("ERROR QUERY DID NOT EXECUTE #3");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
            }

        } else {

            print_r("ERROR CHECK SQL SYNTAX #3");//NEED TO MAKE THIS CLEANER - MAKE USE OF LOGGING CLASS?!?!
        }

        return $this->_fruitArray;
    }
}
