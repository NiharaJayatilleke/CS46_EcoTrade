<?php
class Search extends Controller {
    public function __construct() {
        $this->searchModel =$this->model('M_Search');
    }

    public function SearchAd() {
        // Get the search query from the form input
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';

        // Perform a search based on the category in your database
        $ads = $this->searchModel->searchItems($searchQuery, $category);

        // Pass the results to the view or perform further actions
        $data = [
            'ads' => $ads,
            'searchQuery' => $searchQuery,
        ];

        $this->view('item_ads/v_index',  $data);
    }
    
}
?>


