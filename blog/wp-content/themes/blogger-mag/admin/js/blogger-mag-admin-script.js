(function ($) {
  $(document).ready(function () {
    $('.blogger-mag-btn-get-started').on('click', function (e) {
      e.preventDefault();
      if (!blogger_mag_ajax_object.can_install) {
        alert('Sorry, you are not allowed to access this page.');
        return;
      }
      var $btn = $(this);
      $btn.html('Processing.. Please wait').addClass('updating-message');
      $.post(blogger_mag_ajax_object.ajax_url, {
        action: 'install_act_plugin',
        security: blogger_mag_ajax_object.install_nonce
      }, function (response) {
        if (response.success) {
          window.location.href = 'admin.php?page=ansar_elements_admin_menu&tab=starter-sites';
        } else {
          alert(response.data?.message || 'Installation failed.');
          $btn.html('Try Again').removeClass('updating-message');
        }
      }).fail(function () {
        alert('Something went wrong. Please try again.');
        $btn.html('Try Again').removeClass('updating-message');
      });
    });
  });
$(document).on('click', '.notice-get-started-class .notice-dismiss', function () {
  var type = $(this).closest('.notice-get-started-class').data('notice');
  $.post(ajaxurl, {
    action: 'blogger_mag_dismissed_notice_handler',
    type: type,
  });
});
})(jQuery);