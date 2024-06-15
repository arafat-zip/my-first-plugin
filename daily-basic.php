<?php
/**
 * Plugin name: daily-basic
 * Plugin URL: https://wordpress.org/plugins/daily-basic
 * Description: This is my first plugin
 * Version: 1.0.0
 * Author: Arafat
 * Author URL: https://wordpress.org/plugins/daily-basic
 */
class Arafat_daily_basic_wpp_one{
    public function __construct(){
        //constructed as an array of the function of initialize here  ..we can put more function in array
        add_action('init',array($this,'initialize'));
    }
    function initialize(){
        //init function dicluring other chiled function
        add_filter('the_title',array($this,'change_title'));
        add_filter('the_content',[$this,'change_content']);
    }
    function change_title($post_title){
        //return uppercase post title
        return strtoupper($post_title);
     }
     function change_content($post_content){
        //find word count
        $content = strip_tags($post_content);
        $word_count = str_word_count($content);

        //aproximate reading time
        $reading_time = ceil($word_count / 200);
        return $post_content."<p>{$word_count} words , approximate reading time {$reading_time} Minutes</p>";
     }
    

}
new Arafat_daily_basic_wpp_one();

//  add_filter('the_title','arafat_dl_bsc_chng_title');

//  function arafat_dl_bsc_chng_title($post_title){
//     return strtoupper($post_title);
//  }

//  add_filter('the_content','arafat_dl_bsc_chng_content');

//  function arafat_dl_bsc_chng_content($post_content){
//     //find word count
//     $content = strip_tags($post_content);
//     $word_count = str_word_count($content);

//     //aproximate reading time
//     $reading_time = ceil($word_count / 200);
//     return $post_content."<p>{$word_count} words , approximate reading time {$reading_time} Minutes</p>";
//  }

