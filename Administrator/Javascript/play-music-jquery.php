<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
<link type="text/css" href="skins/jplayer-blue-monday/jplayer.blue.monday.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>

<style>
div.jp-audio,
div.jp-video {
  /* Edit the font-size to counteract inherited font sizing.
   * Eg. 1.25em = 1 / 0.8em
   */
  font-size:0.85em;
  white-space:nowrap;
  width: 420px;
}

div.jp-type-playlist div.jp-playlist li.jp-playlist-current {
	background: url(images/current-play-bullet.gif) no-repeat center left;
}

div.jp-playlist li img {
	width: 22px;
	height: 22px;
	border: none;
	margin-right: 10px;
	vertical-align: middle;
}

ul.jp-controls li a.disabled {
	cursor: default;
    opacity: .5;
    -moz-opacity: .5;
    filter: alpha(opacity=50);
}

</style>

<script type="text/javascript">
var default_audio_poster_path = "images/default-audio-poster.png";
var poster_use = true;
var repeat = false;
var auto_play = false;

jQuery(document).ready(function() {
	var Playlist = function(instance, playlist, options) {
		var self = this;

		this.instance = instance; // String: To associate specific HTML with this playlist
		this.playlist = playlist; // Array of Objects: The playlist
		this.options = options; // Object: The jPlayer constructor options for this playlist

		this.current = 0;

		this.cssId = {
			jPlayer: "jquery_jplayer_",
			interface: "jp_interface_",
			playlist: "jp_playlist_"
		};
		this.cssSelector = {};

		$.each(this.cssId, function(entity, id) {
			self.cssSelector[entity] = "#" + id + self.instance;
		});

		if(!this.options.cssSelectorAncestor) {
			this.options.cssSelectorAncestor = this.cssSelector.interface;
		}

		$(this.cssSelector.jPlayer).jPlayer(this.options);
		
		$(this.cssSelector.interface + " .jp-previous").click(function() {
			if (self.playlist.length > 1)
				self.playlistPrev();
			$(this).blur();
			return false;
		});

		$(this.cssSelector.interface + " .jp-next").click(function() {
			if (self.playlist.length > 1)
				self.playlistNext(false);
			$(this).blur();
			return false;
		});
		
		if (this.playlist.length == 1) {
			$(this.cssSelector.interface + " .jp-previous").addClass("disabled").removeAttr('href');
			$(this.cssSelector.interface + " .jp-next").addClass("disabled").removeAttr('href');
		}
	};

	Playlist.prototype = {
		displayPlaylist: function() {
			var self = this;
			$(this.cssSelector.playlist + " ul").empty();
			for (i=0; i < this.playlist.length; i++) {
				var listItem = (i === this.playlist.length-1) ? "<li class='jp-playlist-last'>" : "<li>";
				
				if (poster_use) {
					if (this.playlist[i].poster != null)
						listItem += "<a href='#' id='" + this.cssId.playlist + this.instance + "_item_" + i +"' tabindex='1'>"+ "<img src='" +this.playlist[i].poster+"' />"+ this.playlist[i].name +"</a>";
					else
						listItem += "<a href='#' id='" + this.cssId.playlist + this.instance + "_item_" + i +"' tabindex='1'>"+ "<img src='" +default_audio_poster_path+"' />"+ this.playlist[i].name +"</a>";
				} else {
					listItem += "<a href='#' id='" + this.cssId.playlist + this.instance + "_item_" + i +"' tabindex='1'>"+ this.playlist[i].name +"</a>";
				}
				// Create links to free media
				if(this.playlist[i].free) {
					var first = true;
					listItem += "<div class='jp-free-media'>(";
					$.each(this.playlist[i], function(property,value) {
						if($.jPlayer.prototype.format[property]) { // Check property is a media format.
							if(first) {
								first = false;
							} else {
								listItem += " | ";
							}
							listItem += "<a id='" + self.cssId.playlist + self.instance + "_item_" + i + "_" + property + "' href='" + value + "' tabindex='1'>" + property + "</a>";
						}
					});
					listItem += ")</span>";
				}

				listItem += "</li>";

				// Associate playlist items with their media
				$(this.cssSelector.playlist + " ul").append(listItem);
				$(this.cssSelector.playlist + "_item_" + i).data("index", i).click(function() {
					var index = $(this).data("index");
					if(self.current !== index) {
						self.playlistChange(index);
					} else {
						$(self.cssSelector.jPlayer).jPlayer("play");
					}
					$(this).blur();
					return false;
				});

				// Disable free media links to force access via right click
				if(this.playlist[i].free) {
					$.each(this.playlist[i], function(property,value) {
						if($.jPlayer.prototype.format[property]) { // Check property is a media format.
							$(self.cssSelector.playlist + "_item_" + i + "_" + property).data("index", i).click(function() {
								var index = $(this).data("index");
								$(self.cssSelector.playlist + "_item_" + index).click();
								$(this).blur();
								return false;
							});
						}
					});
				}
			}
		},
		playlistInit: function(autoplay) {
			if(autoplay) {
				this.playlistChange(this.current);
			} else {
				this.playlistConfig(this.current);
			}
		},
		playlistConfig: function(index) {
			$(this.cssSelector.playlist + "_item_" + this.current).removeClass("jp-playlist-current").parent().removeClass("jp-playlist-current");
			$(this.cssSelector.playlist + "_item_" + index).addClass("jp-playlist-current").parent().addClass("jp-playlist-current");
			this.current = index;
			$(this.cssSelector.jPlayer).jPlayer("setMedia", this.playlist[this.current]);
		},
		playlistChange: function(index) {
			this.playlistConfig(index);
			$(this.cssSelector.jPlayer).jPlayer("play");
		},
		playlistNext: function(end) {
			var index = (this.current + 1 < this.playlist.length) ? this.current + 1 : 0;
			if (!end || repeat || this.playlist.length <= 1 || index != 0)
				this.playlistChange(index);
		},
		playlistPrev: function() {
			var index = (this.current - 1 >= 0) ? this.current - 1 : this.playlist.length - 1;
			this.playlistChange(index);
		}
	};

	var audioPlaylist = new Playlist("1", [
		{
			name:"Kids performed by Touch band (played by iPhone)",
			mp3:"music/kids-touchband.mp3",
			poster:"music/touch_band-logo.png"
		},
		{
			name:"A song by Garage band",
			m4a:"music/rock-garageband.m4a",
			poster:"music/rock-garageband.jpg"
		}

	], {
		ready: function() {
			audioPlaylist.displayPlaylist();
			audioPlaylist.playlistInit(auto_play); // Parameter is a boolean for autoplay.
		},
		ended: function() {
			if (repeat || audioPlaylist.playlist.length > 1){
				audioPlaylist.playlistNext(true);
			}
		},
		play: function() {
			$(this).jPlayer("pauseOthers");
			
		},
		swfPath: "js",
		supplied: "m4a,mp3"
	});


});

</script>
</head>
<body style="background: transparent; margin: 0pt;">
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div class="jp-audio">
    <div class="jp-type-playlist">
      <div id="jp_interface_1" class="jp-interface">
        <ul class="jp-controls">
          <li><a href="#" class="jp-play" tabindex="1">play</a></li>
          <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
          <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
          <li><a href="#" class="jp-previous" tabindex="1">previous</a></li>
		  <li><a href="#" class="jp-next" tabindex="1">next</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-current-time"></div>
        <div class="jp-duration"></div>
      </div>
      <div id="jp_playlist_1" class="jp-playlist">
        <ul>
        </ul>
      </div>
    </div>
  </div>

</body>
</html>