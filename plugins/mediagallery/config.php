<?php
// +--------------------------------------------------------------------------+
// | Media Gallery Plugin 1.6                                                 |
// +--------------------------------------------------------------------------+
// | $Id:: config.php 2147 2008-04-30 04:16:19Z mevans0263                   $|
// +--------------------------------------------------------------------------+
// | Copyright (C) 2005-2008 by the following authors:                        |
// |                                                                          |
// | Mark R. Evans              - mark@gllabs.org                             |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | This program is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU General Public License              |
// | as published by the Free Software Foundation; either version 2           |
// | of the License, or (at your option) any later version.                   |
// |                                                                          |
// | This program is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with this program; if not, write to the Free Software Foundation,  |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.          |
// |                                                                          |
// +--------------------------------------------------------------------------+
//

/* -------------------------------------------------------------------------
 * Media Gallery Global Configuration Options
 * ----------------------------------------------------------------------- */

/*
 * Media Gallery Path Configuration. If you want to move the directory where
 * the Media Gallery programs are stored and accessed, change the
 * $_MG_CONF['path_mg'] to the new directory name.
 *
 * You normally do not need to change any of the other paths.
 */

$_MG_CONF['path_mg']    = 'mediagallery';
$_MG_CONF['path_html']  = $_CONF['path_html'] . $_MG_CONF['path_mg'] . '/';
$_MG_CONF['site_url']   = $_CONF['site_url'] . '/' . $_MG_CONF['path_mg'];
$_MG_CONF['admin_url']  = $_CONF['site_admin_url'] . '/plugins/mediagallery/';
$_MG_CONF['path_admin'] = $_CONF['path_html'] . 'admin/plugins/mediagallery/';

$_MG_CONF['path_mediaobjects'] = $_CONF['path_html'] . $_MG_CONF['path_mg'] . '/mediaobjects/';
$_MG_CONF['mediaobjects_url']  = $_CONF['site_url']  . '/' . $_MG_CONF['path_mg'] . '/mediaobjects';

/*
 * Number of seconds to wait between ratings
 */
$_MG_CONF['rating_speedlimit'] = 45;

/*
 * By default, Media Gallery will always size thumbnails at 200x200
 * To use the specified size instead, set this to 1
 */

$_MG_CONF['thumbnail_actual_size'] = 0;

/*
 * By default, Media Gallery references its templates from the plugin
 * directory.  If you want to have separate templates for each of your
 * themes, set the path to the template directory here.
 */

$_MG_CONF['template_path'] = $_CONF['path'] . 'plugins/mediagallery/templates';
//$_MG_CONF['template_path'] = $_CONF['path_layout'] . 'mediagallery/';

/*
 * Disable Media Gallery's search integration with Geeklog.
 */

$_MG_CONF['disable_search_integration'] = 0;


/*
 * Disable version check - Media Gallery will check to see if a new version
 * is available for download each time you enter the administration screen.
 * To disable this check, set this variable to 1.
 */

$_MG_CONF['disable_version_check']   = 0;

/*
 * Set the maximum number of media items to display in the Media Manage Screen
 */

$_MG_CONF['mediamanage_items']       = 200;

/*
 * Media Gallery will convert all uploaded image media to JPG format,
 * including the original uploaded file. To keep Media Gallery from converting
 * the original file to JPG, set this variable to 1.
 */

$_MG_CONF['do_not_convert_original'] = 1;

/*
 * With ImageMagick, you can keep the JPEG profile data (EXIF) in the
 * display and thumbnail images.  Set this variable to 1 to keep this
 * data.  It will make these files a little bit larger.  On Solaris, setting
 * this option to 1 seems to break the convert command.
 */

$_MG_CONF['im_keep_profiles']        = 0;

/*
 * Media Gallery will attempt to automatically locate some of the external
 * utilities.  If your PHP installation has openbase_dir restrictions enabled
 * this can cause some issues.  Set this variable to 1 to skip the automatic
 * searching.
 */

$_MG_CONF['skip_file_find']          = 0;

/*
 * If set to 1, MG will not automatically populate the video playback
 *  resolution, instead it will use the default settings
 */

$_MG_CONF['use_default_resolution']  = 0;


/*
 * By default, Media Gallery will play MPEG videos with Apple's QuickTime
 * player. If you wish to use Microsoft's Windows Media Player instead,
 * set this variable to 1.
 */

$_MG_CONF['use_wmp_mpeg']			 = 0;

/*
 * By default, Media Gallery will attempt to extract the actual image capture
 * date from the meta data included by many digital cameras and graphics
 * packages.  If you prefer to always use the upload date (the date you added
 * the image to your Media Gallery album) as the displayed date, set this
 * variable to 1.
 */

$_MG_CONF['use_upload_time']		 = 0;

/**
 * FFMPEG Command line options
 *
 * There are lots of versions of ffmpeg out there, some work with one set of
 * switches and some don't.  You can easily modify the commands used to create
 * thumbnails from videos by modifying the arguments below.  The first %s is
 * the source video and the second %s is the destination thumbnail, both %s
 * need to be in the command.
 */

$_MG_CONF['ffmpeg_command_args'] = ' -i %s -f mjpeg -t 0.01 -y %s';

// $_MG_CONF['ffmpeg_command_args'] = ' -i %s -f mjpeg -an -r 1 -ss 00:00:03 -vframes 1 -y %s';
// $_MG_CONF['ffmpeg_command_args'] = ' -i %s -f singlejpeg -an -r 1 -ss 00:00:03 -vframes 1 -y %s';
// --- RIVA FLV Encoded / converter for Windows command line
// $_MG_CONF['ffmpeg_command_args'] = ' -an -y  -i "%s" -t 0.001 -s 640x480 -deinterlace   -hq -f image2 "%s"';

/*
 * SimpleViewer Theme Layout Options
 *
 * textColor - Color of title and caption text (hexidecimal color value e.g 0xff00ff).
 * frameColor - Color of image frame, navigation buttons and thumbnail frame (hexidecimal color value e.g 0xff00ff).
 * frameWidth - Width of image frame in pixels.
 * stagePadding - Distance between image and thumbnails and around gallery edge in pixels.
 * thumbnailColumns - number of thumbnail rows. (To disable thumbnails completely set this value to 0.)
 * thumbnailRows - number of thumbnail columns. (To disable thumbnails completely set this value to 0.)
 * navPosition - Position of thumbnails relative to image. Can be "top", "bottom","left" or "right".
 * enableRightClickOpen - Whether to display a 'Open In new Window...' dialog when right-clicking on an image. Can be "true" or "false"
 *
 */

$_MG_CONF['simpleviewer']['textcolor'] = '0x000000';
$_MG_CONF['simpleviewer']['framecolor'] = '0x000000';
$_MG_CONF['simpleviewer']['framewidth'] = 5;
$_MG_CONF['simpleviewer']['stagepadding'] = 50;
$_MG_CONF['simpleviewer']['thumbnailcolumns'] = 6;
$_MG_CONF['simpleviewer']['thumbnailrows'] = 1;
$_MG_CONF['simpleviewer']['navposition'] = 'top';
$_MG_CONF['simpleviewer']['enablerightclickopen'] = 'false';

/*
 * Default thumbnails for non-media type files
 *
 * This allows you to specify new default thumbnails for non-media file types.
 * Place the thumbnail image in the mediaobjects/ directory.
 *
 */

$_MG_CONF['dt']['pdf'] = 'pdf.png';
$_MG_CONF['dt']['zip'] = 'zip.png';
// $_MG_CONF['dt']['doc'] = 'doc.gif';
// $_MG_CONF['dt']['xls'] = 'xls.png';

/*
 * If you are using another plugin or theme that loads the mootools JavaScript
 * library, you can disable Media Gallery loading the library.
 */

$_MG_CONF['load_mootools'] = true;

/*
 * The JavaScript used by the lightbox slideshow can cause
 * conflicts with other JS libraries.  You can set this to true to disable
 * the lightbox slideshow feature.
 */

$_MG_CONF['disable_lightbox'] = false;

/*
 * If you want Media Gallery to update the 'last updated' time for all parent
 * albums, set this to true.
 */

$_MG_CONF['update_parent_lastupdated'] = true;

/* ------------------------------------------------------------------------
 * DO NOT CHANGE ANY SETTINGS BELOW THIS LINE.
 * ------------------------------------------------------------------------ */

$_MG_CONF['menulabel']           = $LANG_MG00['menulabel'];
$_MG_CONF['version']             = '1.6.1';
$_MG_CONF['pi_name']             = 'mediagallery';

$_MG_table_prefix = $_DB_table_prefix;

/*
 * Array of valid media types for watermarking
 */

$_MG_CONF['watermark_types'] = array('image/jpeg','image/jpg','image/png','image/bmp');

$_TABLES['mg_albums']           = $_MG_table_prefix . 'mg_albums';
$_TABLES['mg_media_albums']     = $_MG_table_prefix . 'mg_media_albums';
$_TABLES['mg_media']            = $_MG_table_prefix . 'mg_media';
$_TABLES['mg_usage_tracking']   = $_MG_table_prefix . 'mg_usage_tracking';
$_TABLES['mg_config']           = $_MG_table_prefix . 'mg_config';
$_TABLES['mg_mediaqueue']       = $_MG_table_prefix . 'mg_media_queue';
$_TABLES['mg_media_album_queue']= $_MG_table_prefix . 'mg_media_album_queue';
$_TABLES['mg_playback_options'] = $_MG_table_prefix . 'mg_playback_options';
$_TABLES['mg_userprefs']        = $_MG_table_prefix . 'mg_userprefs';
$_TABLES['mg_exif_tags']        = $_MG_table_prefix . 'mg_exif_tags';
$_TABLES['mg_watermarks']       = $_MG_table_prefix . 'mg_watermarks';
$_TABLES['mg_category']         = $_MG_table_prefix . 'mg_category';
$_TABLES['mg_sessions']         = $_MG_table_prefix . 'mg_batch_sessions';
$_TABLES['mg_session_items']    = $_MG_table_prefix . 'mg_batch_session_items';
$_TABLES['mg_session_items2']   = $_MG_table_prefix . 'mg_batch_session_items2';
$_TABLES['mg_session_log']      = $_MG_table_prefix . 'mg_batch_session_log';
$_TABLES['mg_sort']             = $_MG_table_prefix . 'mg_sort';
$_TABLES['mg_postcard']         = $_MG_table_prefix . 'mg_postcard';
$_TABLES['mg_rating']           = $_MG_table_prefix . 'mg_rating';
?>