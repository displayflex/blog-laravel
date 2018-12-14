// Feedback Form
$(function () {
	$('.feedback-form').on('submit', function (e) {
		var name = $('[name="name"]').val();
		var email = $('[name="email"]').val();
		var message = $('[name="message"]').val();

		e.stopPropagation();
		e.preventDefault();

		var postPromise = $.post('/api/feedback', {
			name: name,
			email: email,
			message: message
		});

		postPromise.then(function (data) {
			// console.log(data);
			if (data) {
				$('.alert-danger--ajax').hide().find('ul').html('');
				$('.feedback-form').hide();
				$('.feedback-description').hide();
				$('.feedback-header').after(data);
			}
		}, function (errorData) {
			console.log(errorData);
			if (errorData.status === 500) {
				$('.alert-danger--ajax').show().find('ul').html('<li class="warning-msg">Error fetching data from server with code: ' + errorData.status + '</li>');
			} else {
				var errors = errorData.responseJSON.errors;
				var outErrors = [];

				for (var error in errors) {
					outErrors.push('<li class="warning-msg">' + errors[error][0] + '</li>');
				}

				$('.alert-danger--ajax').show().find('ul').html(outErrors.join(''));
			}
		});
	});
});
