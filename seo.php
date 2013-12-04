<?
require_once('db.php');

class SEO {
	private $data;
	
	function __construct() {
		$this->getPageData($_SERVER['REQUEST_URI']);
	} 
	
	private function getPageData($url) {
		global $db;

		$url = mysqli_escape_string($db, $url);
		$sql = "select url, title, description, keywords from pages where url = '$url'";
		
		$result = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			$this->data = mysqli_fetch_assoc($result);
		} else {
			$sql = "select url, title, description, keywords from pages where url = '/'";
			$result = mysqli_query($db, $sql);
			$this->data = mysqli_fetch_assoc($result);
		}
	}
	
	public function getTitle() {
		return $this->data['title'];
	}
	public function getDescription() {
		return $this->data['description'];
	}
	public function getKeywords() {
		return $this->data['keywords'];
	}
	public function getJSON() {
		return json_encode($this->data);
	}
}
?>