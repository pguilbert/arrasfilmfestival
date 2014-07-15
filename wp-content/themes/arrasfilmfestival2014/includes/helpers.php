<?php
/**
 * Give the class 'important' if date = today
 * @param  string  $post_date date of the post
 * @return boolean
 */
function is_today_class($post_date) 
{
	if($post_date < date('Y-m-d')) {
		return null;
	}

	return 'important';
}

/**
 * Return a date at french format
 * @param  string $date date of the element
 * @return string       french date format (dd/MM)
 */
function nice_date($date) 
{
	return strftime('%d %B');
}

/**
 * Display the avatar of a single person
 * @param  string $email     Id of the author
 * @param  array  $size      size of picture
 * @param  array  $class     class for picture
 * @return voir            
 */
function display_author_avatar($email, $size = array(), $class = null)
{
    foreach($size as $key => $value) {
        preg_match("/src='(.*?)'/i", get_avatar($email, $value), $matches);
        if($class == null) {
            echo  '<img src="' . $matches[1] . '" width="' . $value / 2 . '">';            
        } else {
            echo  '<img src="' . $matches[1] . '" class="' . $class[$key] . '" width="' . $value / 2 . '">';            
        }
    }
}

/**
 * Display all picture for each resolutions
 * @param  int/string $id_or_url    Id or url of the post
 * @param  array  $name             List of thumbnail format
 * @param  array  $size             List of real width to give
 * @param  array  $class            List of class for each resolution
 * @return void
 */
function responsive_thumbnail($id_or_url, $name = array(), $class = null)
{
    foreach($name as $key => $value) {
        $size = (explode('x', $value)[0]) / 2;
        $url = (is_int($id_or_url)) ? wp_get_attachment_image_src(get_post_thumbnail_id($id_or_url), $value)[0] : $id_or_url;
        if($class == null) {
            echo  '<img src="' . $url . '" width="' . $size . '">';
        } else {
            echo  '<img src="' . $url . '" class="' . $class[$key] . '" width="' . $size . '">';
        }
    }
}
?>