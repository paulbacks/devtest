<?php 

namespace Application;

class Main 
{
    /**
     * the data set
     *
     * @var array
     */
	protected $data;

    /**
     * set the data set to work with.
     *
     * @param array $data
     */
	public function __construct(array $data)
	{
		$this->data = $data;
	}

    /**
     * returns all males form the data set.
     *
     * @return string
     */
	public function allMales(){
        //define empty variables that will be used in this function
        $allMales = array();

	    //loop through all the people, and if their male add them to a array.
        foreach ($this->data['people'] as $person){
            if($person['gender'] == 'male'){
                array_push($allMales, $person);
            }
        }

        //get all array keys, this will be used to place it in an table.
        $keys = array_keys($this->data['people'][1]);

        //place the data in a array
        $allMalesInTable = $this->toTable($keys, $allMales);

        return $allMalesInTable;
    }

    /**
     * this wil return a table with all modals with the $filterValue in it
     *
     * @param $filterValue
     * @return string
     */
    public function allCarModalsWithFilter($filterValue){
        //define empty variables that will be used in this function
        $allCarModalsWithTheFilterValue = array();

        //loops trough all car brands and modals
        foreach ($this->data['cars']['brands'] as $brands){
            foreach ($brands['models'] as $modal){
                //if the modal has the filterValue in the string add it to the array.
                if(strstr($modal, $filterValue)){
                    array_push($allCarModalsWithTheFilterValue, $modal);
                }
            }
        }

        //set key, in this case the key is static and will not be based on the data source (their all modal numbers so it doesn't really matter. =D)
        $key = 'modals';

        //place the data in a array
        $allCarModalsWithTheFilterValueInTable = $this->toTable($key, $allCarModalsWithTheFilterValue);

        return $allCarModalsWithTheFilterValueInTable;
    }

    /**
     * returns all numbers greater than the $filterValue
     *
     * @param $filterValue
     * @return string
     */
    public function numberGreaterThan($filterValue){
        //define empty variables that will be used in this function
        $numbers = array();

        foreach ($this->data['numbers'] as $number){
            if($number > $filterValue){
                array_push($numbers, $number);
            }
        }

        //get all array keys, this will be used to place it in an table.
        $keys = 'numbers';

        //place the data in a array
        $numbersInTable = $this->toTable($keys, $numbers);

        return $numbersInTable;
    }

    /**
     * returns all phone numbers based on the $filterValue
     *
     * @param $filterValue
     * @return string
     */
    public function allPhoneNumbersEndingOn($filterValue){
        //define empty variables that will be used in this function
        $filteredPhoneNumbers = array();

        //checks the filter length
        $filterLength = strlen($filterValue);

        foreach ($this->data['phone-numbers'] as $phoneNumber){
            if(substr($phoneNumber, -1, $filterLength) == $filterValue){
                array_push($filteredPhoneNumbers, $phoneNumber);
            }
        }

        //get all array keys, this will be used to place it in an table.
        $keys = 'phone-number';

        //place the data in a array
        $filteredPhoneNumbersInTable = $this->toTable($keys, $filteredPhoneNumbers);

        return $filteredPhoneNumbersInTable;
    }

    /**
     * builds a table with the provided keys and data.
     * maybe should move this to a template class.
     *
     * @param $keys
     * @param $dataGroup
     * @return string
     */
    private function toTable($keys, $dataGroup){
        //checks if the $keys, is a string
        if(is_string($keys)){
            $keys = explode(" ", $keys);
        }

        //the start of the table
	    $tableWithData = '
            <div class="table">
            <table>
            <thead>
            <tr>
        ';
	    //table heads
        foreach ($keys as $key){
            $tableWithData .= '<th>' . $key . '</th>';
        }
        $tableWithData .= '
            </tr>
            </thead>
            <tbody>
        ';
        //table content
        foreach ($dataGroup as $data){
            $tableWithData .= '<tr>';
            //checks if the data is a string, true : display, else : loop through data set.
            if(is_string($data) || is_numeric($data)){
                $tableWithData .= '<th>' . $data . '</th>';
            }
            else{
                foreach($data as $key) {
                    $tableWithData .= '<th>' . $key . '</th>';
                }
            }
            $tableWithData .=  '</th>';
        }
        $tableWithData .= '
            </tbody>
            </table>
            </div>
        ';

        return $tableWithData;
	}
}