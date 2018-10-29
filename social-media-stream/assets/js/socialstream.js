//'use strict';

var Shuffle = window.Shuffle;

var SM_FEED = function (element) {
  this.element = element;

  this.shuffle = new Shuffle(element, {
    itemSelector: '.picture-item',
    sizer: element.querySelector('.my-sizer-element'),
  });

  // Log events.
  this.addShuffleEventListeners();
  this.setupEvents();

  this._activeFilters = [];

  this.addFilterButtons();
  this.addSorting();
  this.addSearchFilter();

  this.mode = 'exclusive';
};

SM_FEED.prototype.toggleMode = function () {
  if (this.mode === 'additive') {
    this.mode = 'exclusive';
  } else {
    this.mode = 'additive';
  }
};



/**
 * Shuffle uses the CustomEvent constructor to dispatch events. You can listen
 * for them like you normally would (with jQuery for example).
 */
SM_FEED.prototype.addShuffleEventListeners = function () {
  this.shuffle.on(Shuffle.EventType.LAYOUT, function (data) {
    console.log('layout. data:', data);
  });

  this.shuffle.on(Shuffle.EventType.REMOVED, function (data) {
    console.log('removed. data:', data);
  });
  var allCount = jQuery('.ff-item.picture-item').length;
  var fbCount = jQuery('.ff-facebook').length;
  var twCount = jQuery('.ff-twitter').length;
  var gpCount = jQuery('.ff-google').length;
  var ytCount = jQuery('.ff-youtube').length;
  jQuery('.ff-type-all').attr('data-num',allCount);
  jQuery('*[data-group="twitter"]').attr('data-num',twCount);
  jQuery('*[data-group="facebook"]').attr('data-num',fbCount);
  jQuery('*[data-group="google"]').attr('data-num',gpCount);
  jQuery('*[data-group="youtube"]').attr('data-num',ytCount);
};

SM_FEED.prototype.addFilterButtons = function () {
  var options = document.querySelector('.filter-options');

  if (!options) {
    return;
  }

  var filterButtons = Array.from(options.children);

  filterButtons.forEach(function (button) {
	  console.log(button);
	button.addEventListener('click', this._handleFilterClick.bind(this), true);
  }, this);
};

SM_FEED.prototype._handleFilterClick = function (evt) {
	//console.log('----------------',evt);
  var btn = evt.currentTarget;
  var isActive = btn.classList.contains('ff-filter--active');
  var btnGroup = btn.getAttribute('data-group');

  // You don't need _both_ of these modes. This is only for the SM_FEED.

  // For this custom 'additive' mode in the SM_FEED, clicking on filter buttons
  // doesn't remove any other filters.
  if (this.mode === 'additive') {
    // If this button is already active, remove it from the list of filters.
    if (isActive) {
      this._activeFilters.splice(this._activeFilters.indexOf(btnGroup));
    } else {
      this._activeFilters.push(btnGroup);
    }

    btn.classList.toggle('ff-filter--active');

    // Filter elements
    this.shuffle.filter(this._activeFilters);

  // 'exclusive' mode lets only one filter button be active at a time.
  } else {
    this._removeActiveClassFromChildren(btn.parentNode);

    var filterGroup;
    if (isActive) {
      btn.classList.remove('ff-filter--active');
      filterGroup = Shuffle.ALL_ITEMS;
    } else {
      btn.classList.add('ff-filter--active');
      filterGroup = btnGroup;
    }

    this.shuffle.filter(filterGroup);
  } 
};

SM_FEED.prototype._removeActiveClassFromChildren = function (parent) {
  var children = parent.children;
  for (var i = children.length - 1; i >= 0; i--) {
    children[i].classList.remove('ff-filter--active');
  }
};

SM_FEED.prototype.addSorting = function () {
  var buttonGroup = document.querySelector('.sort-options');

  if (!buttonGroup) {
    return;
  }

  buttonGroup.addEventListener('change', this._handleSortChange.bind(this));
};

SM_FEED.prototype._handleSortChange = function (evt) {
  // Add and remove `active` class from buttons.
  var wrapper = evt.currentTarget;
  var buttons = Array.from(evt.currentTarget.children);
  buttons.forEach(function (button) {
    if (button.querySelector('input').value === evt.target.value) {
      button.classList.add('active');
    } else {
      button.classList.remove('active');
    }
  });

  // Create the sort options to give to Shuffle.
  var value = evt.target.value;
  var options = {};

  function sortByDate(element) {
    return element.getAttribute('data-created');
  }

  function sortByTitle(element) {
    return element.getAttribute('data-title').toLowerCase();
  }

  if (value === 'date-created') {
    options = {
      reverse: true,
      by: sortByDate,
    };
  } else if (value === 'title') {
    options = {
      by: sortByTitle,
    };
  }

  this.shuffle.sort(options);
};

// Advanced filtering
SM_FEED.prototype.addSearchFilter = function () {
  var searchInput = document.querySelector('.js-shuffle-search');

  if (!searchInput) {
    return;
  }

  searchInput.addEventListener('keyup', this._handleSearchKeyup.bind(this));
};

/**
 * Filter the shuffle instance by items with a title that matches the search input.
 * @param {Event} evt Event object.
 */
SM_FEED.prototype._handleSearchKeyup = function (evt) {
  var searchText = evt.target.value.toLowerCase();

  this.shuffle.filter(function (element, shuffle) {

    // If there is a current filter applied, ignore elements that don't match it.
    /*if (shuffle.group !== Shuffle.ALL_ITEMS) {
      // Get the item's groups.
      var groups = JSON.parse(element.getAttribute('data-groups'));
      var isElementInCurrentGroup = groups.indexOf(shuffle.group) !== -1;

      // Only search elements in the current group
      if (!isElementInCurrentGroup) {
        return false;
      }
    }*/

    var titleElement = element.querySelector('.picture-item__inner');
    var titleText = titleElement.textContent.toLowerCase().trim();
	
	var content = element.textContent;
	var text = searchText;
	var regex = new RegExp(text, "gi");
	var match = Boolean(content.match(regex));
	if (match) {
		var highlightRegex = /(<span class="ff-highlight">)([^<>]*)(<\/span>)/gi;
		element.innerHTML = element.innerHTML.replace(highlightRegex, "$2");
		
		if (!text) { return false; }
		
		var regex = new RegExp("(" + text + ")", "gi");
		var smHighlight = '<span class="ff-highlight">$1</span>';
		
		// Highlight matches
		var traverseElement = function (element) {
			var elementHTML = "";
			var nodes = element.childNodes;
			for (var i = 0; i < nodes.length; i++) {
				var node = nodes[i];
				if (node.nodeType === 3) {
					elementHTML += node.textContent.replace(regex, smHighlight);
				} else {
					if (node.childNodes.length) {
						traverseElement(node);
					}
					elementHTML += node.outerHTML;
				}
			}
			element.innerHTML = elementHTML;
		};
		
		traverseElement(element);
	}
	
	
		
		
	/*jQuery(".my-shuffle-container").smHighliter({
      text: searchText
	});*/
	
    return titleText.indexOf(searchText) !== -1;
  });
};

SM_FEED.prototype.setupEvents = function () {
	
  document.querySelector('#load-more-feed').addEventListener('click', this.onAppendBoxes.bind(this));
  var tablinks = document.querySelectorAll('.tablinks');
  
  for (var i = 0; i < tablinks.length; i++) {
    tablinks[i].addEventListener('click', this.getAnotherPage.bind(this));
	
  }
  //document.querySelectorAll('.tablinks').addEventListener('click', this.getAnotherPage.bind(this));
};



/**
 * Create some DOM elements, append them to the shuffle container, then notify
 * shuffle about the new items. You could also insert the HTML as a string.
 */
SM_FEED.prototype.onAppendBoxes = function (e) {
	jQuery("#load-more-feed").hide();
	jQuery(".sm-loader").show();
	var parentNode = this;	
	var page_id = e.target.getAttribute('data-page');
	var feed_id = e.target.getAttribute('data-feed');
	//console.log(parentNode.target);
	//this.shuffle.remove(this.shuffle.element);
	//jQuery("#grid").html('');

	//parentNode.shuffle.add();
	jQuery.ajax({
		url :  socialAjaxes.ajaxurl,
		type : 'post',
		data : {
			action : 'get_social_feed_ajax',
			feed_id: feed_id,
			pag_id : page_id
		},
		success : function( response ) {
			jQuery("#load-more-feed").show();
			jQuery(".sm-loader").hide();
			console.log(response);
			jQuery("#load-more-feed").attr("data-page",response.next_page_id);
			jQuery("#load-more-feed").attr("data-feed",response.feed_id);
			if(response.is_next_page){
				jQuery("#load-more-feed").show();
			}else{
				jQuery("#load-more-feed").hide();
			}
			appendShuffleBox(response.data,parentNode.shuffle);
			var allCount = jQuery('.ff-item.picture-item').length;
			var fbCount = jQuery('.ff-facebook').length;
			var twCount = jQuery('.ff-twitter').length;
			var gpCount = jQuery('.ff-google').length;
			var ytCount = jQuery('.ff-youtube').length;
			jQuery('.ff-type-all').attr('data-num',allCount);
			jQuery('*[data-group="twitter"]').attr('data-num',twCount);
			jQuery('*[data-group="facebook"]').attr('data-num',fbCount);
			jQuery('*[data-group="google"]').attr('data-num',gpCount);
			jQuery('*[data-group="youtube"]').attr('data-num',ytCount);
		}
	});
  
};


SM_FEED.prototype.getAnotherPage = function (e) {
	jQuery(".sm-top-loader").show();
	var parentNode = this;	
	var feedId = e.target.getAttribute('data-id');
	
	//this.shuffle.remove(this.shuffle.element);
	jQuery("#grid").html('');

	//parentNode.shuffle.add();
	jQuery.ajax({
		url : socialAjaxes.ajaxurl,
		type : 'post',
		data : {
			action : 'get_social_feed_ajax',
			feed_id: feedId,
			pag_id : 1
		},
		success : function( response ) {
			//jQuery('.filter-options').html(response.feedFilters);
			jQuery(".sm-top-loader").hide();
			jQuery("#load-more-feed").attr("data-page",response.next_page_id);
			jQuery("#load-more-feed").attr("data-feed",response.feed_id);
			if(response.is_next_page){
				jQuery("#load-more-feed").show();
			}else{
				jQuery("#load-more-feed").hide();
			}
			console.log(response);
			
			appendShuffleBox(response.data,parentNode.shuffle);
			var allCount = jQuery('.ff-item.picture-item').length;
			var fbCount = jQuery('.ff-facebook').length;
			var twCount = jQuery('.ff-twitter').length;
			var gpCount = jQuery('.ff-google').length;
			var ytCount = jQuery('.ff-youtube').length;
			jQuery('.ff-type-all').attr('data-num',allCount);
			jQuery('*[data-group="twitter"]').attr('data-num',twCount);
			jQuery('*[data-group="facebook"]').attr('data-num',fbCount);
			jQuery('*[data-group="google"]').attr('data-num',gpCount);
			jQuery('*[data-group="youtube"]').attr('data-num',ytCount);
		}
	});

  
};
function setSocialRowSize(){
	var wwd = jQuery(window).outerWidth();
	if(wwd >= 1e4 ){
		var devider = 5;
	}else if(wwd >= 1200){
		var devider = 5;
	}else if(wwd >= 1024){
		var devider = 4;
	}else if(wwd >= 768){
		var devider = 3;
	}else if(wwd >= 480){
		var devider = 2;
	}else if(wwd >= 380){
		var devider = 2;
	}
	
	var itemWd = wwd/devider;
	//console.log(itemWd);
	jQuery('.ff-item.picture-item').each(function() {
		jQuery(this).outerWidth(itemWd);
	});
}
function appendShuffleBox(data,shuffleBox){
	var items = [];
	data.forEach(function (element) {

	  var box = document.createElement('article');
	  box.className = 'ff-'+element.item.post_type+' ff-item picture-item';
	  box.setAttribute('data-groups', '["'+element.item.post_type+'"]');
	  box.innerHTML = element.data;  
 
	  items.push(box);
	 //console.log(parentNode.shuffle.element);
	 shuffleBox.element.appendChild(box);
	});
	setSocialRowSize();
	shuffleBox.add(items);
	
}

document.addEventListener('DOMContentLoaded', function () {
  window.SM_FEED = new SM_FEED(document.getElementById('grid'));
});
