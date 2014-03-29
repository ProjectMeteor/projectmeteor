<?php
/**
 * Home page controller
 */
class home {

	private $twitter_cache = 1200; // seconds
	private $numtweets = 3;
	private $cachename = 'twitter_cache';

	// -----------------------------------------------------------------

	function __construct() {
		$this->cachename = BASE_PATH.$this->cachename;
	}

	// -----------------------------------------------------------------

	public function index() {

		// EDIT QUOTES HERE
		$quotes = array(

			array(
				'name' => 'Elliot Jay Stocks',
				'text' => 'Hell yes: <a href="http://projectmeteor.org">projectmeteor.org</a>',
				'image' => 'https://twimg0-a.akamaihd.net/profile_images/1350329652/jt_profile_normal.jpg'
			),
			array(
				'name' => 'Jeffrey Zeldman',
				'text' => 'I\'m campaigning for the web design app we need <a href="http://projectmeteor.org">projectmeteor.org</a> via <a href="http://twitter.com/project_meteor">@project_meteor</a>',
				'image' => 'http://a2.twimg.com/profile_images/1347260149/jzgrn_normal.png'
			),
			array(
				'name' => '.Net Magazine',
				'text' => 'The perfect web design app... and why it doesn\'t exist. Will <a href="http://twitter.com/project_meteor">@project_meteor</a> bring the answer? <a href="http://projectmeteor.org">projectmeteor.org</a>',
				'image' => 'http://a0.twimg.com/profile_images/87548823/twitlogo_normal.jpg'
			),

		);

		// EDIT INSURGENTS HERE
		$insurgents = array(
			array('name' => 'Nathan Pitman', 'twitter' => 'nathanpitman', 'pic' => 'np.jpg'),
			array('name' => 'Elliot Lewis',  'twitter' => 'elliotlewis',  'pic' => 'el.jpg'),
			array('name' => 'Darren Miller', 'twitter' => 'darrenmiller', 'pic' => 'dm.jpg'),
			array('name' => 'David Dixon',   'twitter' => 'daviddixon',   'pic' => 'dd.jpg'),
		);
		shuffle($insurgents);

		$data = array(
			'insurgents' => $insurgents,
			'ourtweets' => $this->get_tweets(),
			'quotes' => $quotes
		);

		Meteor::set_output(
				Meteor::view('home', $data)
				);

	}

	// -----------------------------------------------------------------

	private function get_tweets() {

		$tweet_cache = $this->get_timeline_cache();

		if(!empty($tweet_cache)) {
			return $tweet_cache;
		}

		$url = 'http://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&screen_name='.Config::$twitter_account.'&count='.$this->numtweets;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

		$data = curl_exec($ch);

		curl_close($ch);

		$data = json_decode($data);

		if(isset($data->error)) {
			return $tweet_cache;
		}

		$out = array();

		foreach($data as $tweet) {
			$out[] = $this->parse_tweet($tweet);
		}

		if(empty($out)) {
			return $tweet_cache;
		}

		$this->save_timeline_cache($out);

		return $out;

	}

	// -----------------------------------------------------------------

	private function get_timeline_cache() {

		if(!file_exists($this->cachename)) {
			return '';
		}

		$file = file($this->cachename);

		$expires = time() - $this->twitter_cache;

		if($file[0] < $expires) {
			return '';
		}

		if(isset($file[1])) {
			$data = unserialize($file[1]);
			if(is_array($data)) {
				return $data;
			}
		}

		return '';
	}

	// -----------------------------------------------------------------

	private function save_timeline_cache($data) {

		$str = time()."\n".serialize($data);

		$fso = fopen($this->cachename,'w+');
		fputs($fso, $str);
		fclose($fso);
	}


	// -----------------------------------------------------------------

	/**
	 * parse_tweet
	 *
	 * Put links into a tweet text
	 *
	 * @param object $tweet
	 * @return string
	 */
	private function parse_tweet($tweet) {

		$out = array(
			'text' => $tweet->text,
			'created_at' => $this->parse_date( $tweet->created_at )
		);

		foreach($tweet->entities->user_mentions as $ment) {
			$out['text'] = str_replace('@'.$ment->name,'<a rel="external" href="http://twitter.com/'.$ment->name.'">@'.$ment->name.'</a>',$out['text']);
		}

		foreach($tweet->entities->hashtags as $tag) {
			$out['text'] = str_replace('#'.$tag->text,'<a rel="external" href="http://twitter.com/search?q=%23'.$tag->text.'">#'.$tag->text.'</a>',$out['text']);
		}

		foreach($tweet->entities->urls as $tag) {
			$out['text'] = str_replace($tag->url,'<a rel="external" href="'.$tag->url.'">'.$tag->url.'</a>',$out['text']);
		}

		return $out;
	}

	// -----------------------------------------------------------------

	/**
	 * thanks WordPress
	 */
	private function parse_date($str) {

		$to = time();
		$from = strtotime($str);;

		$diff = (int) abs($to - $from);
		if ($diff <= 3600) {
			$mins = round($diff / 60);
			if ($mins <= 1) {
				$mins = 1;
			}
			/* translators: min=minute */
			$since = sprintf($this->plural('%s min', '%s mins', $mins), $mins);
		} else if (($diff <= 86400) && ($diff > 3600)) {
			$hours = round($diff / 3600);
			if ($hours <= 1) {
				$hours = 1;
			}
			$since = sprintf($this->plural('%s hour', '%s hours', $hours), $hours);
		} elseif ($diff >= 86400) {
			$days = round($diff / 86400);
			if ($days <= 1) {
				$days = 1;
			}
			$since = sprintf($this->plural('%s day', '%s days', $days), $days);
		}
		return $since.' ago';
	}

	function plural($one,$lots,$val) {
		if($val == 1) {
			return $one;
		}
		return $lots;
	}

}
?>