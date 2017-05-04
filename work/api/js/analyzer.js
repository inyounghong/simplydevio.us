// Global variables
var username = ""
var token = ""

// Store user totals
var watchers = [];
var watcher_types = {
	"regular": [],
	"premium": [],
	"beta": [],
	"banned": [],
	"hell": [],
	"hell-beta": [],
	"senior": [],
	"volunteer": [],
	"admin": [],
	"other": [],
}
var watcher_countries = {}
var is_watching_count = 0;

// Friends
var friend_count = 0
var friend_types = {}
var friend_watch_backs = 0

// Deviant object
var Deviant = function(username, user_type, is_watching){
	this.username = username;
	this.user_type = user_type;
	this.is_watching = is_watching;
}

// Main call: gets access token and runs analysis
$(document).ready(function(){

	$code = $("#code").val();
	if ($code != ""){
		$name = $("#name").val();
		$.ajax({
		  url: "https://www.deviantart.com/oauth2/token?grant_type=authorization_code&client_id=4082&client_secret=049014ae5d6c334d27ffd89a96f8e4fc&redirect_uri=http://www.simplydevio.us/api/test.php&code=" + $code,
		  method: "GET",
		  dataType: 'json',
		  success: function(data){
		  	token = data.access_token;
		  	$("#token").val(token);
		  	username = $("#username").val();
		  	getUserProfile(username, analyzeUserProfile);
		  	getUserWatchers(0);
		  	getUserFriends(0);
		  }
		});
	}
});

// Returns access token
function getToken(){
	return ($("#token").val());
}

// Makes a GET call and callbacks [fun]
function makeAjaxCall(fun, url){
	$.ajax({
		url: url,
		method: "GET",
		dataType: 'json',
		success: function(data){
			fun(data)
		}
	});
}

// Get profile of [username]
function getUserProfile(username, callback){
	makeAjaxCall(callback, "https://www.deviantart.com/api/v1/oauth2/user/profile/" + username + "?ext_collections=0&ext_galleries=0&access_token=" + token);
}

// Analyzes user's profile
function analyzeUserProfile(data){
	console.log("Analyzing user profile");
	console.log(data);
}

// Analyzes watcher's profile
function analyzeWatcherProfile(data){
	incrementDictionary(watcher_countries, data.country);
}

function incrementDictionary(dict, value){
	dict[value] = (dict[value] == null) ? 1 : dict[value] + 1;
}

function getUserWatchers(offset){
	makeAjaxCall(analyzeUserWatchers, "https://www.deviantart.com/api/v1/oauth2/user/watchers/" + username + "?limit=50&offset=" + offset + "&access_token=" + token);
}

function getUserFriends(offset){
	var url = "https://www.deviantart.com/api/v1/oauth2/user/friends/" + username + "?limit=50&offset=" + offset + "&access_token=" + token;
	console.log(url);
	makeAjaxCall(analyzeUserFriends, url);
}

// Creates Deviant obj and places in appropriate watcher lists
function addWatcher(obj){
	// Ajax call to get more info
	// getUserProfile(obj.user.username, analyzeWatcherProfile);

	// Create user
	user = new Deviant(obj.user.username, obj.user.type, obj.is_watching);
	if (obj.is_watching){
		is_watching_count++;
	}
	// Add to main watcher list
	watchers.push(user);
	typ = obj.user.type;

	addUserToDict(watcher_types, obj.user.type, user);
}

function addFriend(obj){
	user = new Deviant(obj.user.username, obj.user.type, obj.is_watching);
	console.log("adding" + user);
	friend_count++;
	if (obj.user.type != "group" && obj.watches_you){
		friend_watch_backs++;
	}
	addUserToDict(friend_types, obj.user.type, user);
}

// Adds given [key] and [value] to [dict]
// Appends [value] if [key] exits
function addUserToDict(dict, key, value){
	var val = dict[key];
	if (val == null){
		dict[key] = [value]
	}
	else {
		val.push(user);
		dict[key] = val;
	}
}

function analyzeUserFriends(data){
	// Loop through each user
	$.each(data.results, function(i, obj){
		addFriend(obj);
	});

	$("#friend_count").html(friend_count);

	// Check if there are more watchers to grab
	if (data.has_more && data.offset < 100){
		getUserFriends(data.next_offset);
	} else{
		showFriendResults();
	}
}

function analyzeUserWatchers(data){
	// Loop through each user
	$.each(data.results, function(i, obj){
		addWatcher(obj);
	});

	$("#watcher_count").html(watchers.length);

	// Check if there are more watchers to grab
	if (data.has_more && data.offset < 100){
		getUserWatchers(data.next_offset);
	} else{
		showResults();
	}
}


function showResults(){
	console.log(watchers);
	console.log(watcher_types);
	console.log("Watching: " + is_watching_count);
	console.log(watcher_countries);

	displayIsWatching("#is_watching", getWatchingList(), "Watchers you watch back");
	displayUserTypes("#chart", dictToList(watcher_types), "Deviants watching you");
}

function showFriendResults(){
	console.log("Friend results:");
	console.log(friend_types);
	console.log("Friends: " + friend_count);

	// Draw charts
	displayUserTypes("#friend_types", dictToList(friend_types), "Deviants you watch");
	displayUserTypes("#friend_watch_backs", getFriendsWatchBackList(), "Friends who watch back");
}

function dictToList(dict){
	lst = []
	for (var key in dict) {
		if (dict[key].length > 0){
			lst.push([key, dict[key].length])
		}
	}
	console.log(lst);
	return lst;
}

function getFriendsWatchBackList(){
	return [
      	["watching you", friend_watch_backs],
      	["not watching you", friend_count - friend_watch_backs]
    ];
}

function getWatchingList(){
	return [
      	["watching", is_watching_count],
      	["not watching", watchers.length - is_watching_count]
    ];
}

function displayIsWatching(id, cols, title){
	var chart = c3.generate({
	    bindto: id,
	    data: {
	      columns: cols,
	      type: 'donut'
	    },
	    donut:{
	    	title: title,
			label: {
			    format:function(x){
					return x;
				}
			}
		},
		tooltip: {
			format:
			{
				value:function(x){
					return x;
				}
			}
		},
		legend: {
	        position: 'right'
	    }
	});
}

// Displays user type data in [columns]
function displayUserTypes(id, cols, title){
	var chart = c3.generate({
	    bindto: id,
	    data: {
	      columns: cols,
	      type: 'donut'
	    },
	    donut:{
	    	title: title,
			label: {
			    format:function(x){
					return x;
				}
			}
		},
		tooltip: {
			format:
			{
				value:function(x){
					return x;
				}
			}
		},
		legend: {
	        position: 'right'
	    }
	});
}