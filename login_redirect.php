function admin_default_page() {
  return '/redirect-to-here';
}

add_filter('login_redirect', 'admin_default_page');
