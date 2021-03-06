<?php
class ProgressionCard {

	private $data;
	private $defs;
	private $lang;

	public function __construct($data, $defs, $lang) {
		$this->data = $data;
		$this->defs = $defs;
		$this->lang = $lang;
	}

	public function display() {
		if ($this->data->progressionHash == "594203991") {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&url=http://www.bungie.net".$this->defs['2161005788']['icon']);
			$percent = $this->data->level * 20;
			$count = $this->data->level;
			$max = 5;
		} elseif ($this->data->progressionHash == "692939593") {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/img/osiris.png");
			$percent = $this->data->level;
			$count = $this->data->level;
			$max = 9;
		} elseif ($this->data->progressionHash == "2760041825") {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/img/osiris.png");
			$percent = $this->data->level;
			$count = $this->data->level;
			$max = 3;
		} elseif ($this->data->progressionHash == "2033897742") {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&url=http://www.bungie.net".$this->defs['3233510749']['icon']);
			$percent = $this->data->level;
			$count = $this->data->level;
			$max = 100;
		} elseif ($this->data->progressionHash == "2033897755") {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&url=http://www.bungie.net".$this->defs['1357277120']['icon']);
			$percent = $this->data->level;
			$count = $this->data->level;
			$max = 100;
		} elseif ($this->data->progressionHash == "1774654531") {
			$url = "https://www.bungie.net/platform/destiny/manifest/Destination/3393213630/?lc=".$this->lang;
			$request = new ApiRequest($url);
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&crop=200&pos=100&url=http://www.bungie.net".$request->get_response()->data->destination->icon);
			$percent = @($this->data->level / 5) * 100;
			$count = $this->data->level;
			$max = 5;
		} elseif ($this->data->progressionHash == "2193513588") {
			$url = "https://www.bungie.net/platform/destiny/manifest/Destination/4072959335/?lc=".$this->lang;
			$request = new ApiRequest($url);
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&crop=200&pos=100&url=http://www.bungie.net".$request->get_response()->data->destination->icon);
			$percent = @($this->data->level / 5) * 100;
			$count = $this->data->level;
			$max = 5;
		} elseif ($this->data->progressionHash == "1707948164") {
			$url = "https://www.bungie.net/platform/destiny/manifest/Destination/4233735899/?lc=".$this->lang;
			$request = new ApiRequest($url);
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&crop=200&pos=100&url=http://www.bungie.net".$request->get_response()->data->destination->icon);
			$percent = @($this->data->level / 5) * 100;
			$count = $this->data->level;
			$max = 5;
		} elseif ($this->data->progressionHash == "2158037182") {
			$url = "https://www.bungie.net/platform/destiny/manifest/Destination/518553403/?lc=".$this->lang;
			$request = new ApiRequest($url);
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&crop=200&pos=100&url=http://www.bungie.net".$request->get_response()->data->destination->icon);
			$percent = @($this->data->level / 5) * 100;
			$count = $this->data->level;
			$max = 5;
		} else {
			$icon = Cache::base64Convert($GLOBALS['config']->site_root."/util/SimpleImage.php?size=50&url=http://www.bungie.net".$this->defs[(string)$this->data->progressionHash]['icon']);
			$percent = @($this->data->progressToNextLevel / $this->data->nextLevelAt) * 100;
			$count = $this->data->progressToNextLevel;
			$max = $this->data->nextLevelAt;
		} ?>
		<div class="card-bg progress-card" id="<?=(string)$this->data->progressionHash?>">
			<div class="progress-data">
				<img src="<?=$icon?>"/>
				<div class="progress-info">
					<div class="progress-bar">
						<div style="width:<?=$percent?>%"></div>
					</div>
					<div class="progress-name">
						<span><?=Language::get($this->lang, $this->defs[(string)$this->data->progressionHash]['name'])?></span>
					</div>
				</div>
				<small class="more" style="display: none;"><?=$count?> / <?=$max?></small>
			</div>
			<div class="level"><h3><?=$this->data->level?></h3></div>
		</div>
		<?php
	}

}