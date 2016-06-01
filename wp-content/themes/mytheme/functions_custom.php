<?php
define('GET_API_URL', 'https://api.iref.com/api/');
define('POST_API_URL', 'http://post.iref.com/api/');
define('GET_API_THREAD', constant('GET_API_URL').'discussion/');
define('GET_API_THREAD_TAGS', constant('GET_API_URL').'tags/discussion/');
define('POST_API_UPDATE_TAGS', constant('POST_API_URL').'tags/');
define('POST_API_UPDATE_THREAD', constant('POST_API_URL').'/discussion/');
define('FETCH_HOUSING_TAGS_URL', 'https://tags.housing.com/api/v1/fetch-query-tags');
define('NEWS_MODERATOR_ID', 'Yoast Coolness');
define('NEWS_MODERATOR_EMAIL', 'amdkma@kskkf.ocm');
define('IREF_API_SOURCE', 'housing');
define('IREF_NEWS_FORUMID', 'news');
add_action( 'wp_ajax_ajax-tag-search', 'adding_custom_tag',1,2);
function adding_custom_tag() {
	if ( ! isset( $_GET['tax'] ) ) {
		wp_die( 0 );
	}
	$s = wp_unslash( $_GET['q'] );

	$comma = _x( ',', 'tag delimiter' );
	if ( ',' !== $comma )
		$s = str_replace( $comma, ',', $s );
	if ( false !== strpos( $s, ',' ) ) {
		$s = explode( ',', $s );
		$s = $s[count( $s ) - 1];
	}
	$s = trim( $s );
	$tags_url = constant('FETCH_HOUSING_TAGS_URL').'?query='.$s;
	$results = file_get_contents($tags_url);
	echo $results;	
	wp_die();
}

function autocomplete_hook() {
	wp_register_script( 'tag-it',  get_template_directory_uri().'/js/tag-it.min.js', array(
		'jquery',
		'jquery-ui-autocomplete'
		));

	wp_enqueue_script( 'jquery-ui-autocomplete' );

	wp_enqueue_style( 'tagit', '/wp-content/themes/mytheme/css/tagit.css');
	wp_enqueue_style( 'tagit-zndesk', '/wp-content/themes/mytheme/css/tagit.ui-zendesk.css');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('custom', '/wp-content/themes/mytheme/js/custom.js', FILE , array( 'jquery','jquery-ui-autocomplete','tag-it' )); 
	wp_enqueue_script( 'tag-it', '/wp-content/themes/mytheme/js/tag-it.min.js',FILE , array( 'jquery','jquery-ui-autocomplete','tag-it' ) );
}
add_action('admin_enqueue_scripts', 'autocomplete_hook');


function add_custom_meta_box()
{
	add_meta_box("demo-meta-box", "Update Housing Tags", "custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");
add_action("save_post", "save_custom_meta_box", 10, 3);
function save_custom_meta_box($post_id, $post, $update) {	
	try {				
		if(!empty($_POST)){
			post_api_update_thread($_POST);				
			if( isset( $_POST['jsonObject'] ) && ! empty( $_POST['jsonObject'] ) ){			
				post_api_update_tags($_POST['jsonObject']);
			}	
		}
	} catch (Exception $e) {		
		echo 'Error Occurred in processing request.<br>';
		echo $e->getMessage();
	}
}

function post_api_update_thread($params){
	if(empty($params['post_content'])||empty($params['post_title'])) {
		throw new Exception('Missing Params', 404);
	}
	$args = [];
    $args['title'] = $params['post_title'];
    $args['content'] = $params['post_content'];
    $args['tagsjson'] = stripslashes($_POST['jsonObject']);
    $args['forumid'] = constant('IREF_NEWS_FORUMID');
    $args['userid'] = constant('NEWS_MODERATOR_ID');
    $args['email'] = constant('NEWS_MODERATOR_EMAIL');
    $args['source'] = constant('IREF_API_SOURCE');
    $args['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $args['clientip'] = $_SERVER['REMOTE_ADDR'];
    $args['parseurl'] = 1;
    $thread_id = get_post_meta($params['post_ID'], 'iref_thread_id', true);
    if(empty($thread_id)){
    	$url =  constant('IREF_POST_API_URL').'forum/25/discussion/new';
    }
    else{
    	$args['thread_id'] = $thread_id;
    	$api_url = constant('POST_API_UPDATE_THREAD').$thread_id.'/update';	
    }

    $response = wp_remote_post( $url, array('body' => $args));
	if ( is_wp_error( $response ) ) {
	   throw new Exception($response->get_error_message(), 1);
	} else {
		$res_body = json_decode($response['body']);	
		if($response['response']['code'] != 201){
			throw new Exception($res_body->message, 1);
		}else{
			if(empty($thread_id))
				$msg = $res_body->message;
				add_post_meta($params['post_ID'], 'iref_thread_id', $msg->thread_id, true);
		}
	}
}

function custom_meta_box_markup()
{	
	try{
		// global $wp;
		// $thread_id=74685;		
		$thread_id = get_post_meta(get_the_ID(), 'iref_thread_id')[0];
		$tags_json = get_housing_tags($thread_id);		
		if(!empty($tags_json))
			$tags_arr = json_decode($tags_json,1);
		$html='<input type="hidden" id="jsonObject" name="jsonObject" value="">';
		$html.='<input type="hidden" id="existing_tags" value='."'".$tags_json."'>";		
		$html.='<ul id="singleFieldTags">';	
		if(!empty($tags_json)){
			foreach ($tags_arr as $key => $value) {		
				$html.='<li>'.$value['tag_name'].'</li>';
			}
		}	
		$html.='</ul>';		
		echo $html;
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function get_housing_tags($thread_id){
	$api_url = constant('GET_API_THREAD_TAGS').$thread_id;		
	$response = wp_remote_get( $api_url, array(
		'method' => 'GET',	
		'headers' => array('Content-Type'=>'application/json')		
		)
	);
	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		echo "Something went wrong: $error_message";
	} else {
		if($response['response']['code']=="200"){
			return $response['body'];
		} else {
			return false;
			// throw new Exception ($response['response']['message']);
		}
	}	
}
function post_api_update_tags($jsonObject){
	$thread_id = get_post_meta(get_the_ID(), 'iref_thread_id');
	$api_url = constant('POST_API_UPDATE_TAGS').$thread_id.'/update';	
	$response = wp_remote_post( $api_url, array(
		'method' => 'POST',			
		'body' => array(
			'tagsjson' => stripslashes($jsonObject),
			'userid' => constant('NEWS_MODERATOR_ID'),
			'source'=> constant('IREF_API_SOURCE'),		
			'email' => constant('NEWS_MODERATOR_EMAIL')
			)
		)
	);
	if ( is_wp_error( $response ) ) {
		// $error_message = $response->get_error_message();
		// echo "Something went wrong: $error_message";
		throw new Exception('Post is updated. Error in updating Tags '.$response->get_error_message(), 1);
	}
	// exit;
}
?>