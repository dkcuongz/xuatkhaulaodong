function getURLVar(key) {
	var value = [];
	var query = String(document.location).split('?');
	if (query[1]) {
		var part = query[1].split('&');
		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}
		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}
var WDS = {
	'search': function (class_name, url_nth_n) {
		if(url_nth_n !== null && typeof(url_nth_n) !== 'undefined' && url_nth_n !== ''){
            $('.'+ class_name).find('.wds-search-header-button').on('click', function() {
                search_value = $('.' + class_name + ' input[name=\'search\']').val();
                if (search_value) {
                    search_url = url_nth_n + '?&search=' + encodeURIComponent(search_value);
                    location = search_url;
                }
            });
            $('.'+ class_name + ' input[name=\'search\']').on('keydown', function(e) {
                if (e.keyCode === 13) {
                    $('.' + class_name).find('.wds-search-header-button').trigger('click');
                }
            });
		}else{
			return false;
		}
    },
	'language': function () {

    }
};

$(document).ready(function() {
	$('.form-select-language .language-select').on('click', function(e) {
		e.preventDefault();
		$('.form-select-language input[name=\'code\']').val($(this).attr('name'));
		$('.form-select-language').submit();
	});
});