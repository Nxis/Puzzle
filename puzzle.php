<?php

/* class Logger {

  private static $log_to = "js_console"; // jaký funkce pro logování se má použít
  private static $messges = array(); // zobrazované zprávy

  // Logger je statická třída
  private function __construct(){
  }

  public static function log(int $message_id){
  $self::{$self::$log_to}($message_id);
  }

  private static function log_to_js_console($message_id){

  }

  } */

class Grid_2d {

    /**
     * 	Plocha, kterou se budeme snažit naplnit částicemi
     * @var array
     */
    protected $grid = array();

    /**
     * 	Šířka 2D plochy 
     * @var int
     */
    protected $max_x = 0; // sirka plochy

    /**
     * 	Výška 2D plochy
     * @var int
     */
    protected $max_y = 0; // vyska plochy

    /**
     * 	Celkový počet míst pro umístění částic
     * @var int
     */
    protected $pieces = 0; // pocet poli pro umisteni

    /**
     * 	Index volného pole (nejmenší x, nejmenší y) po posledním vložení částice
     * @var array
     */
    protected $last_index = array(0, 0);

    /**

      /**
     * 	Zkusí vložit částici do plochy na index posledního volného pole ($this->last_index)
     * @param Piece $piece
     * @return boolean <b>false</b> pokud částice na index nevejde | true
     * @re
     */
    public function insert_piece($piece) {
        
    }

    /**
     * 	Zkusí vložit částici do plochy na index posledního volného pole ($this->last_index)
     * @param type $piece
     * @param type $x
     * @param type $y
     */
    public function insert_piece_at($piece, $x, $y) {
        
    }

    /**
     * 	Vyprázdní celou plochu
     */
    public function empty_grid() {
        $this->grid = array();
    }

    /**
     *  Konstruktor pro plochu
     */
    protected function __construct($x, $y) {
        $this->max_x = abs($x);
        $this->max_y = abs($y);
        $this->pieces = $x * $y;
    }

}

class Piece {

    /**
     * 	Možné orientace částice a postup jak je všechny vytvořit
     */
    protected static $possible_orientations = array(
        1,
        2 => array("operation" => "rotate_right", "prev_index" => 1),
        3 => array("operation" => "rotate_right", "prev_index" => 2),
        4 => array("operation" => "rotate_right", "prev_index" => 3),
        5 => array("operation" => "flip_horizontal", "prev_index" => 1),
        6 => array("operation" => "flip_horizontal", "prev_index" => 2),
        7 => array("operation" => "flip_horizontal", "prev_index" => 3),
        8 => array("operation" => "flip_horizontal", "prev_index" => 4)
    );

    /**
     * 	Počet unikatnich orientací částice
     */
    protected $orientations_count = 0;

    /**
     * 	Pole unikátních orientaci částice
     */
    protected $orientations = array();

    /**
     * Celková plocha částice
     */
    protected $points = 0;

    /**
     *  Vytvoří instanci částice, budou vytvořeny všechny její orientace, jejich počet a další informace
     */
    public function __construct(array $matrix) {
        $this->orientatons [] = $matrix;
        $this->orientations_count++;

        $this->create_unique_orientations();
    }

    /**
     *  Getter pro počet orientací částice
     */
    public function get_orientatitons_count() {
        return $this->orientations_count;
    }

    /**
     *  Getter pro všechny unikátní orientace částice
     */
    public function get_orientatitons() {
        return $this->orientations;
    }

    /**
     * Vytvoří všechny možné unikátní orientace pro částici do pole $this->orientations
     * Pro 2D plochu je to 4x rotace + 4x rotace převrácená horizontálně
     */
    private function create_unique_orientations() {
        $skiped_first = false;
        $max_keys = count(self::$possible_orientations);

        foreach (self::$possible_orientations as $key => $val) {
            if ($skiped_first) {
                //$this->orientations[$key] = Matrix_functions::{$this->possible_orientations[$key]["operation"]}([$this->possible_orientations[$key]["prev_index"]]);
            } else {
                $skiped_first = true;
            }
        }

        //array_intersect_key(array_unique(array_map("serialize", $this->orientations)));
    }

}

/**
 *
 */
class Matrix_functions {
    
    /**
     * Otočí matici doleva
     * @param array $matrix
     * @return array
     */
    public static function rotate_left($matrix) {
        return call_user_func_array("array_map", array(-1 => null) + array_map("array_reverse", $matrix));
    }
    
    /**
     * Otočí matici doprava
     * @param array $matrix
     * @return array
     */
    public static function rotate_right($matrix) {
        // does not work correctly yet
        return call_user_func_array("array_map", array(-1 => null) + $matrix);
    }

    /**
     *  Převrátí částici horizontálně
     */
    public static function flip_horizontal($matrix) {
        return array_map("array_reverse", $matrix);
    }
    
    /**
     *  Převrátí matici horizontálně 
     */
    public static function flip_vertical($matrix) {
        return array_reverse($matrix);
    }

}

class Solver {

    /**
     *  Vygeneruje všechny možné kombinace částic
     */
    private function generate_all_possible_combinations() {
        
    }

    /**
     *  Pokusí se najít všechny možná řešení
     *  array $combinations všechny kombinace, které chceme vyřešit
     * 	@return array pole všech řešení
     */
    private function solve($combinations) {
        
    }

    public function __run() {
        
    }

}

class Controller {
    
}

$matrix_arr = array();

$matrix_arr [] = new Piece(array(0 => array(1, 1), 1 => array(1, 0)));
$matrix_arr [] = new Piece(array(0 => array(1, 0), 1 => array(1, 1)));
$matrix_arr [] = new Piece(array(0 => array(1, 1)));
$matrix_arr [] = new Piece(array(0 => array(0, 1), 1 => array(1, 1), 2 => array(0, 1)));
$matrix_arr [] = new Piece(array(0 => array(1, 1, 1), 1 => array(1, 0, 0), 2 => array(1, 0, 0)));
$matrix_arr [] = new Piece(array(0 => array(1, 1), 1 => array(0, 1), 2 => array(0, 1)));

$matrix_arr [] = new Piece(array(0 => array(0, 1, 0), 1 => array(1, 1, 1), 2 => array(0, 1, 0)));
$matrix_arr [] = new Piece(array(0 => array(1, 1, 1), 1 => array(1, 0, 0), 2 => array(1, 0, 0)));

$matrix_arr [] = new Piece(array(0 => array(0, 1, 1), 1 => array(1, 1, 0)));
$matrix_arr [] = new Piece(array(0 => array(1, 1, 1), 1 => array(1, 0, 0), 2 => array(1, 0, 0)));
$matrix_arr [] = new Piece(array(0 => array(1, 1), 1 => array(1, 0)));

$matrix_arr [] = new Piece(array(0 => array(1, 0), 1 => array(1, 1)));
$matrix_arr [] = new Piece(array(0 => array(0, 0, 1), 1 => array(1, 1, 1)));
$matrix_arr [] = new Piece(array(0 => array(1, 1, 0), 1 => array(0, 1, 1)));
$matrix_arr [] = new Piece(array(0 => array(1, 1), 1 => array(0, 1), 2 => array(0, 1)));

$matrix_arr [] = new Piece(array(0 => array(0, 1, 0, 0), 1 => array(1, 1, 1, 1)));
$matrix_arr [] = new Piece(array(0 => array(1, 1), 1 => array(1, 1)));

$matrix_arr [] = new Piece(array(0 => array(1, 1, 1, 1)));


$test_arr = array(0 => array(1, 2, 3), 1 => array(4, 5, 6), 2 => array(7, 8, 9));

/*echo "Original:<br />";
print_r($test_arr);
echo "<br />Right:<br />";*/
print_r(Matrix_functions::rotate_right($test_arr));


print_r(array_map("array_reverse", array(1, 2, 3), array(4, 5, 6), array(7, 8, 9)));
//print_r(array(-1 => null) + array_map('array_reverse', $test_arr));
//print_r(call_user_func_array('array_map', (array(-1 => null) + array_map('array_reverse', $test_arr))));


