<?php

/**
 * True if the date is today
 * @param  string  $post_date date of the post
 * @return boolean
 */
function is_today($post_date) 
{
    if($post_date < date('Y-m-d')) {
        return false;
    }

    return true;
}

/**
 * Give the class 'important' if date = today
 * @param  string  $post_date date of the post
 * @return boolean
 */
function is_today_class($post_date) 
{
    return is_today($post_date) ? 'important' : null ;
}

/**
 * Return a date at french format
 * @param  string $date date of the element
 * @return string       french date format (dd/MM)
 */
function nice_date($date) 
{
    return utf8_encode(strftime('%d %B', strtotime($date)));
}

/**
 * Return a relative date at french format
 * @param  string $date date of the element
 * @return string       french date format (dd/MM)
 */
function relative_date($date) 
{
    if(is_today($date)){
        return 'Aujourd\'hui';
    } else {
        return nice_date($date);
    }
}

/**
 * Return a date at french format
 * @param  string $date date of the element
 * @return string       french hour (HH/mm)
 */
function nice_hour($date) 
{
    return utf8_encode(strftime('%H:%M', strtotime($date)));
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
 * @param  int $id    Id or url of the post
 * @param  array  $name             List of thumbnail format
 * @param  array  $class            List of class for each resolution
 * @return void
 */
function responsive_thumbnail($id, $name = array(), $class = null)
{
    foreach($name as $key => $value) {
        $width  = (explode('x', $value)[0]);
        $height = (explode('x', $value)[1]);
        $url = wp_get_attachment_image_src($id, $value)[0];
        $size = getimagesize(str_replace('http://' . $_SERVER['HTTP_HOST'] . '/', '', $url));
        if($size[0] < $width) {
            if($class == null) {
                echo  '<img src="' . $url . '" height="' . $height / 2 . '"';
            } else {
                echo  '<img src="' . $url . '" class="' . $class[$key] . '" height="' . $height / 2 . '">';
            }
        } elseif($size[1] < $height) {
            if($class == null) {
                echo  '<img src="' . $url . '" width="' . $width / 2 . '"';
            } else {
                echo  '<img src="' . $url . '" class="' . $class[$key] . '" width="' . $width / 2 . '">';
            }
        } else {
            if($class == null) {
                echo  '<img src="' . $url . '" width="' . $width / 2 . '" height="' . $height / 2 . '">';
            } else {
                echo  '<img src="' . $url . '" class="' . $class[$key] . '" width="' . $width / 2 . '" height="' . $height / 2 . '">';
            }
        }
    }
}

/**
 * Return a random value
 * @param  array  $values array of two values we wan't to play
 * @return int            size
 */
function random_size($values = array())
{
    if(rand(0, 2) == 1) {
        return $values[0];
    } else {
        return $values[1];
    }
}
?>